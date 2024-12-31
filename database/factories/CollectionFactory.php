<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'gender'=>"male"??'female',
            'neutered'=>'yes'??'no',
            'age'=>rand(1,5),
            'description'=>fake()->paragraph(4),
            'image'=>'/img-collection/default.png'
        ];

    }
}
