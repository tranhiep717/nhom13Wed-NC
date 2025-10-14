<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $categoryIds = Category::pluck('id')->toArray();
        $brandIds = Brand::pluck('id')->toArray();
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->numberBetween(1000000, 50000000),
            'old_price' => $this->faker->numberBetween(1000000, 60000000),
            'stock' => $this->faker->numberBetween(0, 100),
            'image_path' => 'img/product0' . $this->faker->numberBetween(1, 9) . '.png',
            'is_new' => $this->faker->boolean(30),
            'discount_percentage' => $this->faker->numberBetween(0, 30),
            'rating' => $this->faker->numberBetween(1, 5),
            'long_description' => $this->faker->paragraph(3),
            'details' => $this->faker->sentence(8),
            'category_id' => $this->faker->randomElement($categoryIds),
            'brand_id' => $this->faker->randomElement($brandIds),
            'slug' => $this->faker->unique()->slug,
            'sold_count' => $this->faker->numberBetween(0, 100),
            'views_count' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
