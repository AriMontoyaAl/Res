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
                <div class="card-tools pull-right">
                    <a href="{{route('habitacion_index')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver
                    </a>
                </div>
            </div>
            <form action="{{route('habitacion_actualizar', ['id' => $datos->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf
                @method("put")
                <div class="card-body">
                    @include('habitacion.form')
                </div>
                <div class="card-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-info">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection