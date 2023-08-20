<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionHabitaciones;
use App\Models\Habitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HabitacionController extends Controller
{
    public function index()
    {
        $datos = Habitacion::paginate(10);
        return view('habitacion.index', compact('datos'));
    }
    
    public function crear()
    {
        return view('habitacion.crear');
    }
    
    public function guardar(ValidacionHabitaciones $request)
    {
        Habitacion::create($request->all());
        return redirect('habitacion')->with('mensaje', 'Habitacion creado con exito');
    }
    
    public function ver($id)
    {
        $datos = Habitacion::findOrFail($id);
        return view('habitacion.ver', compact('datos'));
    }
    
    public function editar($id)
    {
        $datos = Habitacion::findOrFail($id);
        return view('habitacion.editar', compact('datos'));
    }
    
    public function actualizar(ValidacionHabitaciones $request, $id)
    {
        Habitacion::findOrFail($id)->update($request->all());
        return redirect('habitacion')->with('mensaje', 'Habitacion actualizado con exito');
    }
    
    public function eliminar(Request $request, $id)
    {
        $datos = Habitacion::find($id);
        $datos->delete();
        return redirect('habitacion')->with('mensaje', 'Habitacion eliminado con exito');
    }
}
