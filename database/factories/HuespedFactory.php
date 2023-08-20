<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


 
class HuespedFactory extends Factory
{
  
     
    public function definition(): array
    {
        return [
            'nombre_del_huesped'=> $this->fake() -> name(),
            'apellido_del_huesped'=> $this->fake() -> apellido(),
            'correo_electronico'=> $this->fake() -> email(),
            'telefono'=>$this->fake() -> phoneNumber()
        ];
    }
}
