<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;
    protected $fillable = ['id','numero_de_habitacion', 'tipo_de_habitacion', 'precio'];
    protected $table = 'habitacions';

}
