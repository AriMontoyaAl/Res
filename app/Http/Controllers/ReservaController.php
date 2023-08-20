<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionReserva;
use App\Models\Habitacion;
use App\Models\Huesped;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::orderby('id')->get();

        $reservas = Reserva::join('habitacions', 'habitacions.id', '=','reservas.id_habitacion')
                            ->join('huespeds', 'huespeds.id', '=', 'reservas.id_huesped')
                            ->select('reservas.id', 'reservas.fecha_de_entrada', 'reservas.fecha_de_salida', 'reservas.numero_de_huespedes', 'habitacions.numero_de_habitacion', 'huespeds.nombre_del_huesped')
                            ->orderBy('id', 'asc')
                            ->paginate(10);

        return view('reserva.index', compact('reservas'));
    }

    public function crear()
    {
        $habitacion = Habitacion::orderBy('id')->pluck('numero_de_habitacion', 'id')->toArray();
        $huesped = Huesped::orderBy('id')->pluck('nombre_del_huesped', 'id')->toArray();
        return view('reserva.crear', compact('habitacion', 'huesped'));
    }
    
    public function guardar(ValidacionReserva $request)
    {
        $reservas = new Reserva();
            $reservas->fecha_de_entrada = $request->input("fecha_de_entrada");
            $reservas->fecha_de_salida = $request->input("fecha_de_salida");
            $reservas->numero_de_huespedes = $request->input("numero_de_huespedes");

            $reservas->id_habitacion = $request->input("id_habitacion");
            $reservas->id_huesped = $request->input("id_huesped");

            $reservas->id_habitacion = $request->id_habitacion;
            $reservas->id_huesped = $request->id_huesped;
        $reservas->save();
        return redirect('reserva')->with('mensaje', 'Reserva creada con exito');
    }
    
    public function ver($id)
    {
        $habitacion = Habitacion::orderBy('id')->pluck('numero_de_habitacion', 'id')->toArray();
        $reservas = Reserva::with('habitacion')->findOrFail($id);

        $huesped = Huesped::orderBy('id')->pluck('nombre_del_huesped', 'id')->toArray();
        $reservas = Reserva::with('Huesped')->findOrFail($id);
        return view('reserva.crear', compact('habitacion', 'huesped', 'reservas'));
    }
    
    public function editar($id)
    {
        $habitacion = Habitacion::orderBy('id')->pluck('numero_de_habitacion', 'id')->toArray();
        $huesped = Huesped::orderBy('id')->pluck('nombre_del_huesped', 'id')->toArray();

        $reservas = Reserva::with('habitacions')->findOrFail($id);
        $reservas = Reserva::with('Huespeds')->findOrFail($id);

        return view('reserva.crear', [
            'habitacion'=>$habitacion,
            'huesped'=>$huesped,
            'reservas'=>$reservas
        ]);
    }
    
    public function actualizar(ValidacionReserva $request, $id)
    {
        $reservas = Reserva::find($request->id);
            $reservas->fecha_de_entrada = $request->input("fecha_de_entrada");
            $reservas->fecha_de_salida = $request->input("fecha_de_salida");
            $reservas->numero_de_huespedes = $request->input("numero_de_huespedes");

            $reservas->id_habitacion = $request->input("id_habitacion");
            $reservas->id_huesped = $request->input("id_huesped");

            $reservas->id_habitacion = $request->id_habitacion;
            $reservas->id_huesped = $request->id_huesped;
        $reservas->save();
        return redirect('reserva')->with('mensaje', 'Reserva actualizar con exito');
    }
    
    public function eliminar($id)
    {
        $reservas = Reserva::findOrFail($id);
        $reservas->delete();
        return redirect('reserva')->with('mensaje', 'Reserva eliminada con exito');
    }
}
