@extends("plantilla")

@section('titulo')
    Habitaciones
@endsection

@section('contenido')
<div class="content-header">
    
    <div class="form-control">
        <div class="card">
            <div class="card-header">
                <br>
                <div class="row">
                    <div class="col-lg-2">
                        <h3 class="card-title">Habitaciones</h3>
                    </div>
    
                    <div class="col-lg-2">
                        <div class="card-tools pull-right">    
                            <a href="{{route('huesped_index')}}" class="btn btn-info btn-sm">    
                                Huespedes   
                            </a>        
                        </div>
                    </div>
    
                    <div class="col-lg-2">
                        <div class="card-tools pull-right">    
                            <a href="{{route('reserva_index')}}" class="btn btn-warning btn-sm">    
                                Reservas   
                            </a>        
                        </div>
                    </div>
                </div>
                    
                    
                    <br>  
                <form class="{{route('habitacion_index')}}" method="get">
                    <div class="input-group input-group-sm">
                        <a href="{{route('habitacion_index')}}" class="btn btn-secondary btn-sm">x</a>
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
                    <a href="{{route('habitacion_crear')}}" class="btn btn-secondary btn-sm">    
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro    
                    </a>        
                </div>
                <br>
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
                    <thead>
                        {{$datos->render('pagination::bootstrap-4') }}
                    </thead>
                </table>
            </div>   
        </div> 
    </div>  
</div>
@endsection