<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShopsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                // 'user_id'  => $this->fake()->randomElement(User::pluck('id')),
                'name'  => $this->fake()->name(),
                'branch' => $this->fake()->name(),
                'service' => $this->fake()->realText($maxNbChars = 20),
                'about' => $this->fake()->sentence(),
    
        ];
    }
}
