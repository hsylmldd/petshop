<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'produk'=>fake()->name(),
            'harga'=>rand(20000,50000),
            'image'=>'/img-produk/default.jpg',
            'image2'=>'/img-produk2/default.jpg',
            'description'=>fake()->paragraph(2),
        ];

    }
}
