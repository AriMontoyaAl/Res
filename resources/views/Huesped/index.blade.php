@extends("plantilla")

@section('titulo')
    Huespedes
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
            <h3 class="card-title">Huespedes</h3>    
            <div class="card-tools pull-right">    
                <a href="{{route('huesped_crear')}}" class="btn btn-info btn-sm">    
                    <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro    
                </a>        
            </div>
            <br>
        </div>        
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped" id="tabla-data">
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
            </table>
        </div>   
    </div>   
</div>
@endsection