<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryManager extends Component
{
    use WithFileUploads;

    public $title;
    public $photo;
    public $confirmingGalleryDeletion = false;
    public $galleryIdToDelete;

    protected $rules = [
        'photo' => 'required|image|max:2048', // 2MB Max
        'title' => 'nullable|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        $path = $this->photo->store('gallery-photos', 'public');

        Gallery::create([
            'title' => $this->title,
            'image_path' => $path,
        ]);

        $this->reset(['title', 'photo']);

        session()->flash('message', 'Photo added successfully.');
    }

    public function confirmGalleryDeletion($id)
    {
        $this->confirmingGalleryDeletion = true;
        $this->galleryIdToDelete = $id;
    }

    public function deleteGallery()
    {
        $gallery = Gallery::find($this->galleryIdToDelete);

        if ($gallery) {
            Storage::disk('public')->delete($gallery->image_path);
            $gallery->delete();
            session()->flash('message', 'Photo deleted successfully.');
        }

        $this->confirmingGalleryDeletion = false;
        $this->galleryIdToDelete = null;
    }

    public function render()
    {
        return view('livewire.admin.gallery-manager', [
            'galleries' => Gallery::latest()->get(),
        ]);
    }
}
