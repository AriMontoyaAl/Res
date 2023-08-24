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
    public function index(Request $request)
    {
        $reservas = Reserva::orderby('id')->get();

        $texto = trim($request->get('texto'));

        $reservas = Reserva::join('habitacions', 'habitacions.id', '=','reservas.id_habitacion')
                            ->join('huespeds', 'huespeds.id', '=', 'reservas.id_huesped')
                            ->select('reservas.id', 'reservas.fecha_de_entrada', 'reservas.fecha_de_salida', 'reservas.numero_de_huespedes', 'habitacions.numero_de_habitacion', 'huespeds.nombre_del_huesped')
                            ->where(function ($query) use($texto){
                                $query
                                ->orwhere('habitacions.numero_de_habitacion', 'LIKE', '%'.$texto.'%')
                                ->orwhere('huespeds.nombre_del_huesped', 'LIKE', '%'.$texto.'%')
                                ->orwhere('reservas.fecha_de_entrada', 'LIKE', '%'.$texto.'%');
                            })->orderby('id')->paginate(10);

        return view('reserva.index', compact('reservas', 'texto'));
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
        /*$reservas = DB::table('reservas')
                    ->select('reservas.id', 'reservas.fecha_de_entrada', 'reservas.fecha_de_salida', 
                    'reservas.numero_de_huespedes', 'habitacions.numero_de_habitacion', 'huespeds.nombre_del_huesped')
                    ->join('huespeds', 'reservas.id_huesped', '=', 'huespeds.id')
                    ->join('habitacions', 'reservas.id_habitacion', '=', 'habitacions.id')
                    ->where('id', $id);
                    

        return view('reserva.ver', compact('reservas'));*/

        $habitacion = Habitacion::orderBy('id')->pluck('numero_de_habitacion', 'id')->toArray();
        $huesped = Huesped::orderBy('id')->pluck('nombre_del_huesped', 'id')->toArray();

        $reservas = Reserva::with('habitacions')->findOrFail($id);
        $reservas = Reserva::with('Huespeds')->findOrFail($id);

        return view('reserva.ver', [
            'habitacion'=>$habitacion,
            'huesped'=>$huesped,
            'reservas'=>$reservas
        ]);
    }
    
    public function editar($id)
    {
        $habitacion = Habitacion::orderBy('id')->pluck('numero_de_habitacion', 'id')->toArray();
        $huesped = Huesped::orderBy('id')->pluck('nombre_del_huesped', 'id')->toArray();

        $reservas = Reserva::with(['habitacions', 'Huespeds'])->find($id);

        $habitacion_id = $reservas->habitacions->id;
        $huesped_id = $reservas->Huespeds->id;

        return view('reserva.crear', [
            'habitacion'=>$habitacion,
            'huesped'=>$huesped,
            'reservas'=>$reservas,
            'habitacion_id'=>$habitacion_id,
            'huesped_id'=>$huesped_id
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