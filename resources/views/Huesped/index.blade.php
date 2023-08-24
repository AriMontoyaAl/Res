<h3 class="card-title">Huespedes</h3>
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
        <a href="{{route('reserva_index')}}" class="btn btn-warning btn-sm">    
            Reservas   
        </a>        
    </div>
</div>
</div>


<br> 
<form class="{{route('huesped_index')}}" method="get">
<div class="input-group input-group-sm">
    <a href="{{route('huesped_index')}}" class="btn btn-secondary btn-sm">x</a>
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
<a href="{{route('huesped_crear')}}" class="btn btn-sm btn-secondary">    
    <i class="fa fa-plus-circle"></i> Nuevo registro    
</a>        
</div>
<br>
<table class="table table-bordered table-striped" id="tabla-data">
<thead>
    <tr class="text-center">
        <th>Nombre del huesped</th>
        <th>Apellido del huesped</th>
        <th>Correo electronico</th>
        <th>Telefono</th>
        <th class="width70">Acciones</th>
    </tr>
</thead>
<tbody>
    @foreach($datas as $data)
        <tr class="text-center">
            <td>{{$data->nombre_del_huesped}}</td>
            <td>{{$data->apellido_del_huesped}}</td>
            <td>{{$data->correo_electronico}}</td>
            <td>{{$data->telefono}}</td>
            <td>
                <a href="{{route('huesped_editar', ['id' => $data->id])}}" class="btn btn-success" title="Editar este registro">
                    Editar
                </a>
                <a href="{{route('huesped_ver', ['id' => $data->id])}}" class="btn btn-primary" title="Ver este registro">
                    Ver
                </a>
                <form action="{{route('huesped_eliminar', ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
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
    {{$datas->render('pagination::bootstrap-4') }}
</thead>
</table>
</div>   
</div> 
</div>
</div>
@endsection