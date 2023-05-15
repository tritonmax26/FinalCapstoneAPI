<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShopFactory extends Factory
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
                'name'  => fake()->name(),
                'branch' => fake()->name(),
                'service' => fake()->realText($maxNbChars = 20),
                'about' => fake()->sentence(),
                'image' => '1683626873.jpg',  
             ];
    }
}
