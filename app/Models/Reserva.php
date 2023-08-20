<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reservas';
    protected $fillable = ['fecha_de_entrada', 'fecha_de_salida', 'id_habitacion', 'id_huesped', 'numero_de_huespedes'];

    public function habitacions(){
        return $this->belongsTo(Habitacion::class, 'id_habitacion');
    }

    public function huespeds(){
        return $this->belongsTo(Huesped::class, 'id_huesped');
    }
}
