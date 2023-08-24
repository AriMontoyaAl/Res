@extends("plantilla")

@section('titulo')
    Habitaciones
@endsection
@section('contenido')
    <div class="content-header">
        <div class="form-control">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools pull-right">
                        <a href="{{route('reserva_index')}}" class="btn btn-block btn-sm">
                            <i class="fa fa-fw fa-reply-all"></i> Volver
                        </a>
                    </div>
                </div>
                <form id="form-general" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fecha_de_entrada" class="control-label">Fecha de entrada</label>
                            <input type="text" name="fecha_de_entrada" id="fecha_de_entrada"  class="form-control" value="{{old('fecha_de_entrada', $reservas->fecha_de_entrada ?? '')}}" disabled/>
                          </div>
                          
                          <div class="form-group">
                            <label for="fecha_de_salida" class="control-label">Fecha de salida</label>
                            <input type="text" name="fecha_de_salida" id="fecha_de_salida"  class="form-control" value="{{old('fecha_de_salida', $reservas->fecha_de_salida ?? '')}}" disabled/>
                          </div>

                          <div class="form-group">
                            <label for="numero_de_habitacion" class="control-label">Numero de habitacion</label>
                            <input type="number" name="numero_de_habitacion" id="numero_de_habitacion"  class="form-control" value="{{old('numero_de_habitacion', $reservas->habitacions->numero_de_habitacion ?? '')}}" disabled/>
                          </div>
                          
                          <div class="form-group">
                            <label for="nombre_del_huesped" class="control-label">Nombre del huesped</label>
                            <input type="text" name="nombre_del_huesped" id="nombre_del_huesped"  class="form-control" value="{{old('nombre_del_huesped', $reservas->Huespeds->nombre_del_huesped ?? '')}}" disabled/>
                          </div> 
                          
                          <div class="form-group">
                            <label for="numero_de_huespedes" class="control-label">Numero de huespedes</label>
                            <input type="number" name="numero_de_huespedes" id="numero_de_huespedes"  class="form-control" value="{{old('numero_de_huespedes', $reservas->numero_de_huespedes ?? '')}}" disabled/>
                          </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection