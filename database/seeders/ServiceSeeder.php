<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Cuci AC Berkala',
                'description' => 'Pembersihan menyeluruh indoor & outdoor unit AC. Termasuk pembersihan filter, evaporator, dan kondensor untuk performa optimal.',
                'price' => 75000,
            ],
            [
                'name' => 'Isi Freon AC',
                'description' => 'Pengisian freon dengan takaran digital presisi. Menggunakan freon berkualitas tinggi untuk pendinginan maksimal.',
                'price' => 150000,
            ],
            [
                'name' => 'Bongkar Pasang AC',
                'description' => 'Instalasi AC baru atau pindah lokasi. Termasuk pemasangan bracket, pipa, dan kabel dengan garansi kerja.',
                'price' => 200000,
            ],
            [
                'name' => 'Service AC Rusak',
                'description' => 'Perbaikan AC yang mengalami kerusakan. Diagnosa lengkap dan penggantian spare part jika diperlukan.',
                'price' => 100000,
            ],
            [
                'name' => 'Maintenance AC Rutin',
                'description' => 'Perawatan rutin bulanan untuk menjaga performa AC. Termasuk pengecekan tekanan freon dan pembersihan ringan.',
                'price' => 50000,
            ],
            [
                'name' => 'Instalasi AC Central',
                'description' => 'Pemasangan sistem AC Central untuk gedung atau area luas. Termasuk desain ducting dan sistem kontrol.',
                'price' => 500000,
            ],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(
                ['name' => $service['name']],
                $service
            );
        }
    }
}