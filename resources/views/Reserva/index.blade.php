@extends("plantilla")

@section('titulo')
    Reservaciones
@endsection

@section('contenido')
<div class="content-header">
    
    <div class="form-control">
        <div class="card">
            <div class="card-header">
                <br>
            <div class="row">
                <div class="col-lg-2">
                    <h3 class="card-title">Reservaciones</h3>
                </div>

                <div class="col-lg-2">
                    <div class="card-tools pull-right">    
                        <a href="{{route('habitacion_index')}}" class="btn btn-info btn-sm">    
                            Habitaciones   
                        </a>        
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="card-tools pull-right">    
                        <a href="{{route('huesped_index')}}" class="btn btn-warning btn-sm">    
                            Huespedes   
                        </a>        
                    </div>
                </div>
            </div>
                
                
                <br>
                
                <form class="{{route('reserva_index')}}" method="get">
                    <div class="input-group input-group-sm">
                        <a href="{{route('reserva_index')}}" class="btn btn-secondary btn-sm">x</a>
                        <input class="form-control" name="texto" autocomplete="off" value="{{$texto}}" type="search" placeholder="Ingrese el numero de habitacion o nombre del huesped" aria-label="Search">
        
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>     
            </div>        
            <div class="card-body">
                @if (session("mensaje"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Mensaje Del Sistema:</strong> {{session("mensaje")}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-tools pull-right">    
                    <a href="{{route('reserva_crear')}}" class="btn btn-secondary btn-sm">    
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro    
                    </a>        
                </div>
                <br>
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
                    <thead>
                        {{$reservas->render('pagination::bootstrap-4') }}
                    </thead>
                </table>
            </div>   
        </div>
    </div>   
</div>
@endsection