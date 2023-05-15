<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Shop;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'  => fake()->randomElement(User::pluck('id')),
            'shop_id'  => fake()->randomElement(Shop::pluck('id')),
            'name' => fake()->name(),
            'image' => '1683626873.jpg',
            'description' => fake()->realText($maxNbChars = 20), 
            'price' =>fake()->randomDigit(2),
            'branch' => fake()->name(),
        ];
    }
}
