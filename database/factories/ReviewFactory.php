<?php

namespace Database\Factories;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    protected $model = Rating::class;

    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::inRandomOrder()->first()?->id ?? 1,
            'user_id' => \App\Models\User::inRandomOrder()->first()?->id ?? 1,
            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->sentence(10),
            'comment' => $this->faker->optional()->sentence(15),
        ];
    }
}
