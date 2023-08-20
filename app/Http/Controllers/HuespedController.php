<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionHuespedes;
use App\Models\Huesped;
use Illuminate\Http\Request;

class HuespedController extends Controller
{
    public function index()
    {
        $datas = Huesped::orderby('id')->get();
        return view('huesped.index', compact('datas'));
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
