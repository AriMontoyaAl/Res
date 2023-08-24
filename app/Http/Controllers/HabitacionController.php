<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionHabitaciones;
use App\Models\Habitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HabitacionController extends Controller
{
    public function index(Request $request)
    {
        $datos = Habitacion::paginate(10);
        $texto = trim($request->get('texto'));

        $datos = DB::table('habitacions')
                    ->select('id', 'numero_de_habitacion', 'tipo_de_habitacion', 'precio')
                    ->where(function ($query) use($texto){
                        $query
                        ->orwhere('numero_de_habitacion', 'LIKE', '%'.$texto.'%')
                        ->orwhere('tipo_de_habitacion', 'LIKE', '%'.$texto.'%')
                        ->orwhere('precio', 'LIKE', '%'.$texto.'%');
                    })
                    ->orderBy('id', 'asc')
                    ->paginate(10);
                    
        return view('habitacion.index', compact('datos', 'texto'));
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
