<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionHuespedes;
use App\Models\Huesped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HuespedController extends Controller
{
    public function index(Request $request)
    {
        $datas = Huesped::orderby('id')->get();
        $texto = trim($request->get('texto'));

        $datas = DB::table('huespeds')
                    ->select('id', 'nombre_del_huesped', 'apellido_del_huesped', 'correo_electronico', 'telefono')
                    ->where(function ($query) use($texto){
                        $query
                        ->orwhere('nombre_del_huesped', 'LIKE', '%'.$texto.'%')
                        ->orwhere('telefono', 'LIKE', '%'.$texto.'%')
                        ->orwhere('apellido_del_huesped', 'LIKE', '%'.$texto.'%');
                    })
                    ->orderBy('id', 'asc')
                    ->paginate(10);
                    
        return view('huesped.index', compact('datas', 'texto'));
    }
    
    public function crear()
    {
        return view('huesped.crear');
    }
    
    public function guardar(ValidacionHuespedes $request)
    {
        Huesped::create($request->all());
        return redirect('huesped')->with('mensaje', 'Huesped creado con exito');
    }
    
    public function ver($id)
    {
        $datas = Huesped::findOrFail($id);
        return view('huesped.ver', compact('datas'));
    }
    
    public function editar($id)
    {
        $datas = Huesped::findOrFail($id);
        return view('huesped.editar', compact('datas'));
    }
    
    public function actualizar(ValidacionHuespedes $request, $id)
    {
        Huesped::findOrFail($id)->update($request->all());
        return redirect('huesped')->with('mensaje', 'Huesped actualizado con exito');
    }
    
    public function eliminar($id)
    {
        $datas = Huesped::find($id);
        $datas->delete();
        return redirect('huesped')->with('mensaje', 'Huesped eliminado con exito');
    }
}
