<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionHabitaciones extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'numero_de_habitacion' => 'required|numeric|unique:habitacions,numero_de_habitacion,'. $this->route('id'),
            'tipo_de_habitacion' => 'required|alpha',
            'precio' => 'required|numeric'
        ];
    }
}
