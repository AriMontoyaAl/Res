<?php

use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\HuespedController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;





    Route::get('habitacion', [HabitacionController::class, 'index'])->name('habitacion_index');
    Route::get('habitacion/crear', [HabitacionController::class, 'crear'])->name('habitacion_crear');
    Route::post('habitacion', [HabitacionController::class, 'guardar'])->name('habitacion_guardar');
    Route::get('habitacion/{id}/editar', [HabitacionController::class, 'editar'])->name('habitacion_editar');
    Route::get('habitacion/{id}/ver', [HabitacionController::class, 'ver'])->name('habitacion_ver');
    Route::put('habitacion/{id}', [HabitacionController::class, 'actualizar'])->name('habitacion_actualizar');
    Route::delete('habitacion/{id}', [HabitacionController::class, 'eliminar'])->name('habitacion_eliminar');

    Route::get('huesped', [HuespedController::class, 'index'])->name('huesped_index');
    Route::get('huesped/crear', [HuespedController::class, 'crear'])->name('huesped_crear');
    Route::post('huesped', [HuespedController::class, 'guardar'])->name('huesped_guardar');
    Route::get('huesped/{id}/editar', [HuespedController::class, 'editar'])->name('huesped_editar');
    Route::get('huesped/{id}/ver', [HuespedController::class, 'ver'])->name('huesped_ver');
    Route::put('huesped/{id}', [HuespedController::class, 'actualizar'])->name('huesped_actualizar');
    Route::delete('huesped/{id}', [HuespedController::class, 'eliminar'])->name('huesped_eliminar');

    Route::get('reserva', [ReservaController::class, 'index'])->name('reserva_index');
    Route::get('reserva/crear', [ReservaController::class, 'crear'])->name('reserva_crear');
    Route::post('reserva', [ReservaController::class, 'guardar'])->name('reserva_guardar');
    Route::get('reserva/{id}/editar', [ReservaController::class, 'editar'])->name('reserva_editar');
    Route::get('reserva/{id}/ver', [ReservaController::class, 'ver'])->name('reserva_ver');
    Route::put('reserva/{id}', [ReservaController::class, 'actualizar'])->name('reserva_actualizar');
    Route::delete('reserva/{id}', [ReservaController::class, 'eliminar'])->name('reserva_eliminar');
