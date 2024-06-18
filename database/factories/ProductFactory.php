<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'title' => fake()->word(rand(3, 5), true),
            'description' => fake()->paragraph,
            'image' => fake()->imageUrl($width = 640, $height = 480), // Menghasilkan URL gambar
            'price' => fake()->randomFloat(2, 10, 1000), // Menghasilkan harga antara 10 dan 1000 dengan 2 digit desimal
            'isActive' => fake()->numberBetween(0, 1), // Menghasilkan 0 atau 1
            'stok' => fake()->numberBetween(0, 100), // Menghasilkan stok antara 0 dan 100
        ];
    }
}
