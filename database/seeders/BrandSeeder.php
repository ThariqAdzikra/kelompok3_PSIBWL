<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = ['ASUS', 'Acer', 'Lenovo', 'HP', 'Apple', 'MSI', 'Dell'];

        foreach ($brands as $name) {
            Brand::firstOrCreate(['name' => $name]);
        }
    }
}
