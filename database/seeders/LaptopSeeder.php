<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laptop;
use App\Models\Brand;
use App\Models\Category;

class LaptopSeeder extends Seeder
{
    public function run(): void
    {
        $asus = Brand::where('name', 'ASUS')->first();
        $apple = Brand::where('name', 'Apple')->first();

        $gaming = Category::where('name', 'Gaming')->first();
        $ultrabook = Category::where('name', 'Ultrabook')->first();

        Laptop::create([
            'brand_id' => $asus->id,
            'category_id' => $gaming->id,
            'model' => 'ASUS TUF Gaming A15',
            'cpu' => 'Ryzen 7 6800H',
            'gpu' => 'RTX 3060',
            'ram_gb' => 16,
            'storage_gb' => 512,
            'storage_type' => 'SSD',
            'screen_size' => 15.6,
            'resolution' => '1920x1080',
            'price' => 17200000,
            'os' => 'Windows 11',
            'stock' => 5,
        ]);

        Laptop::create([
            'brand_id' => $apple->id,
            'category_id' => $ultrabook->id,
            'model' => 'MacBook Air M2',
            'cpu' => 'Apple M2',
            'gpu' => 'Integrated',
            'ram_gb' => 8,
            'storage_gb' => 256,
            'storage_type' => 'SSD',
            'screen_size' => 13.6,
            'resolution' => '2560x1664',
            'price' => 17999000,
            'os' => 'macOS',
            'stock' => 8,
        ]);
    }
}
