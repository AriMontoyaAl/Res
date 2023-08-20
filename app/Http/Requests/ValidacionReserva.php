<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionReserva extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fecha_de_entrada' => 'required',
            'fecha_de_salida' => 'required',
            'numero_de_huespedes' => 'required|numeric'
        ];
    }
}
