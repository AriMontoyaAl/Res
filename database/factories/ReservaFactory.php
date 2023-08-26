<?php

namespace Database\Factories;

use App\Models\Habitacion;
use App\Models\Huesped;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_de_entrada'=>$this->faker->date(),
            'fecha_de_salida'=>$this->faker->date(),
            'id_habitacion'=>Habitacion::factory(),
            'id_huesped'=>Huesped::factory(),
            'numero_de_huespedes'=>$this->faker->numberBetween(1,15),
        ];
    }
}
