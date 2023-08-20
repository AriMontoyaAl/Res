@extends("plantilla")

@section('titulo')
    Reservaciones
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
            <h3 class="card-title">Reservaciones</h3>    
            <div class="card-tools pull-right">    
                <a href="{{route('reserva_crear')}}" class="btn btn-info btn-sm">    
                    <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro    
                </a>        
            </div>
            <br>
        </div>        
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped" id="tabla-data">
                <thead>
                    <tr class="text-center">
                        <th>Fecha de entrada</th>
                        <th>Fecha de salida</th>
                        <th>Habitacion</th>
                        <th>Huesped</th>
                        <th>Numero de huespedes</th>
                        <th class="width70">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservas as $reserva)
                        <tr class="text-center">
                            <td>{{$reserva->fecha_de_entrada}}</td>
                            <td>{{$reserva->fecha_de_salida}}</td>
                            <td>{{$reserva->numero_de_habitacion}}</td>
                            <td>{{$reserva->nombre_del_huesped}}</td>
                            <td>{{$reserva->numero_de_huespedes}}</td>
                            <td>
                                <a href="{{route('reserva_editar', ['id' => $reserva->id])}}" class="btn btn-success" title="Editar este registro">
                                    Editar
                                </a>
                                <a href="{{route('reserva_ver', ['id' => $reserva->id])}}" class="btn btn-primary" title="Ver este registro">
                                    Ver
                                </a>
                                <form action="{{route('reserva_eliminar', ['id' => $reserva->id])}}" class="d-inline form-eliminar" method="POST">
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
            </table>
        </div>   
    </div>   
</div>
@endsection