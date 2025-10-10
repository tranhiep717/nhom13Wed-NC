<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'SAMSUNG',
            'LG',
            'SONY',
            'APPLE',
            'HTC',
            'Xiaomi',
        ];
        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['slug' => Str::slug($brand)],
                ['name' => $brand, 'slug' => Str::slug($brand)]
            );
        }
    }
}
