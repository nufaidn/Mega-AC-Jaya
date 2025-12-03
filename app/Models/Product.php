<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'original_price',
        'discount_percentage',
        'label',
        'image',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'discount_percentage' => 'integer',
    ];

    /**
     * Check if the product has a discount.
     *
     * @return bool
     */
    public function hasDiscount(): bool
    {
        return !is_null($this->original_price) && !is_null($this->discount_percentage);
    }

    /**
     * Check if the product has a label.
     *
     * @return bool
     */
    public function hasLabel(): bool
    {
        return !is_null($this->label);
    }

    /**
     * Get the formatted price attribute.
     *
     * @return string
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->price, 2, ',', '.');
    }

    /**
     * Get the formatted original price attribute.
     *
     * @return string
     */
    public function getFormattedOriginalPriceAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->original_price, 2, ',', '.');
    }

    /**
     * Get the CSS class for the label color.
     *
     * @return string
     */
    public function getLabelColorClass(): string
    {
        return match($this->label) {
            'Promo' => 'bg-red-500',
            'Best Seller' => 'bg-yellow-500',
            'Flash Sale' => 'bg-orange-500',
            'New Arrival' => 'bg-green-500',
            default => 'bg-gray-500',
        };
    }
}
