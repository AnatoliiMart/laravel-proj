<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'description' => fake()->paragraph(rand(2, 5)),
            'image' => 'https://p0.pxfuel.com/preview/549/762/421/cosmos-flower-cosmos-plant-pink-flowers-pictures-of-flowers-royalty-free-thumbnail.jpg',

        ];
    }
}
