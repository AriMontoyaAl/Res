<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_de_entrada');
            $table->date('fecha_de_salida');

            $table->unsignedInteger('id_habitacion');
            $table->foreign('id_habitacion', 'fk_reserva_habitacion')
                ->references('id')->on('habitacions')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('id_huesped');
            $table->foreign('id_huesped', 'fk_reserva_huesped')
                ->references('id')->on('huespeds')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('numero_de_huespedes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
