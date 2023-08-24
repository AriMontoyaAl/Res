<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Huesped>
 */
class HuespedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_del_huesped' => fake()->name(),
            'apellido_del_huesped' => fake()->name(),
            'correo_electronico' => fake()->email(),
            'telefono' => fake()->numerify('####-####'),
        ];
    }
}
