<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitacion>
 */
class HabitacionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero_de_habitacion' => fake()->unique()->numberBetween(1, 350),
            'tipo_de_habitacion' => fake()->randomElement(['Personal', 'Familiar', 'Parejas']),
            'precio' => fake()->numberBetween(1000, 5000),
        ];
    }
}

