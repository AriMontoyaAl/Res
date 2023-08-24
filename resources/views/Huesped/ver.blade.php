@extends("plantilla")

@section('titulo')
    Huespedes
@endsection
@section('contenido')
    <div class="content-header">
        <div class="form-control">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools pull-right">
                        <a href="{{route('huesped_index')}}" class="btn btn-block btn-sm">
                            <i class="fa fa-fw fa-reply-all"></i> Volver
                        </a>
                    </div>
                </div>
                <form id="form-general" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre_del_huesped" class="control-label">Nombre del huesped</label>
                            <input type="text" name="nombre_del_huesped" id="nombre_del_huesped" placeholder="Escriba el nombre del huesped." class="form-control" value="{{old('nombre_del_huesped', $datas->nombre_del_huesped ?? '')}}" disabled/>
                        </div>
                        
                        <div class="form-group">
                            <label for="apellido_del_huesped" class="control-label">Apellido del huesped</label>
                            <input type="text" name="apellido_del_huesped" id="apellido_del_huesped" placeholder="Escriba el apellido del huesped" class="form-control" value="{{old('apellido_del_huesped', $datas->apellido_del_huesped ?? '')}}" disabled/>
                        </div>
                        
                        <div class="form-group">
                            <label for="correo_electronico" class="control-label">Correo electronico</label>
                            <input type="email" name="correo_electronico" id="correo_electronico" placeholder="Escriba el Correo electronico" class="form-control" value="{{old('correo_electronico', $datas->correo_electronico ?? '')}}" disabled/>
                        </div>
                        
                        <div class="form-group">
                          <label for="telefono" class="control-label">Telefono</label>
                          <input type="text" name="telefono" id="telefono" placeholder="Escriba el telefono" class="form-control" value="{{old('telefono', $datas->telefono ?? '')}}" disabled/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection