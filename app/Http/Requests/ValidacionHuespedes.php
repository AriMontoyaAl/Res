<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionHuespedes extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'nombre_del_huesped' => 'required|alpha',
            'apellido_del_huesped' => 'required|alpha',
            'correo_electronico' => 'required|email|max:100|unique:huespeds,correo_electronico,'. $this->route('id'),
            'telefono' => 'required|min:8|max:8|unique:huespeds,telefono,'. $this->route('id')
        ];
    }
}
