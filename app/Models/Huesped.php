<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huesped extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_del_huesped', 'apellido_del_huesped', 'correo_electronico', 'telefono'];
    protected $table = 'huespeds';

    
}
