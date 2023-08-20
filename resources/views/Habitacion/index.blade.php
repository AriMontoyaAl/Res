@extends("plantilla")

@section('titulo')
    Habitaciones
@endsection

@section('contenido')
<div class="content-header">
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="3000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i>El Formulario Contiene Errores</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session("mensaje"))
    <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Mensaje Del Sistema</h5>
        <ul>
            <li>{{session("mensaje")}}</li>
        </ul>
    </div>
    @endif
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Habitaciones</h3>    
            <div class="card-tools pull-right">    
                <a href="{{route('habitacion_crear')}}" class="btn btn-info btn-sm">    
                    <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro    
                </a>        
            </div>
            <br>
        </div>        
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped" id="tabla-data">
                <thead>
                    <tr class="text-center">
                        <th>Numero de Habitacion</th>
                        <th>Tipo de Habitacion</th>
                        <th>Precio</th>
                        <th class="width70">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $dato)
                        <tr class="text-center">
                            <td>{{$dato->numero_de_habitacion}}</td>
                            <td>{{$dato->tipo_de_habitacion}}</td>
                            <td>{{$dato->precio}}</td>
                            <td>
                                <a href="{{route('habitacion_editar', ['id' => $dato->id])}}" class="btn btn-success" title="Editar este registro">
                                    Editar
                                </a>
                                <a href="{{route('habitacion_ver', ['id' => $dato->id])}}" class="btn btn-primary" title="Ver este registro">
                                    Ver
                                </a>
                                <form action="{{route('habitacion_eliminar', ['id' => $dato->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf 
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger" title="Eliminar este registro">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    {{ $datos->links() }}
                </tfoot>
            </table>
        </div>   
    </div>   
</div>
@endsection