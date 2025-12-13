<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'AC Split 1 PK Inverter',
                'description' => 'AC Split inverter hemat energi dengan teknologi terbaru. Cocok untuk ruangan berukuran 12-15 m². Dilengkapi dengan fitur auto clean dan remote control.',
                'price' => 3500000,
                'original_price' => 4000000,
                'discount_percentage' => 12,
                'label' => 'Best Seller',
            ],
            [
                'name' => 'AC Split 1.5 PK Inverter',
                'description' => 'AC Split inverter untuk ruangan yang lebih besar 18-25 m². Hemat listrik hingga 60% dengan teknologi inverter terdepan.',
                'price' => 4200000,
                'original_price' => 4800000,
                'discount_percentage' => 12,
                'label' => 'Promo',
            ],
            [
                'name' => 'AC Central 2 PK',
                'description' => 'AC Central untuk kantor dan ruangan besar 30-40 m². Sistem pendinginan merata dengan kontrol suhu digital presisi.',
                'price' => 8500000,
                'label' => 'New Arrival',
            ],
            [
                'name' => 'AC Portable 1 PK',
                'description' => 'AC Portable yang mudah dipindahkan. Ideal untuk ruangan sementara atau area yang tidak memungkinkan instalasi permanen.',
                'price' => 2800000,
                'original_price' => 3200000,
                'discount_percentage' => 12,
                'label' => 'Flash Sale',
            ],
            [
                'name' => 'AC Cassette 2.5 PK',
                'description' => 'AC Cassette untuk plafon dengan distribusi udara 4 arah. Cocok untuk ruang komersial dan kantor besar.',
                'price' => 12500000,
            ],
            [
                'name' => 'AC Window 0.75 PK',
                'description' => 'AC Window ekonomis dengan performa handal. Cocok untuk kamar tidur atau ruang kecil dengan budget terbatas.',
                'price' => 2200000,
                'label' => 'Best Seller',
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}