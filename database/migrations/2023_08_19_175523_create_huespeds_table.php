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
        Schema::create('huespeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_del_huesped');
            $table->string('apellido_del_huesped');
            $table->string('correo_electronico')->uniqued();
            $table->integer('telefono')->uniqued();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huespeds');
    }
};
