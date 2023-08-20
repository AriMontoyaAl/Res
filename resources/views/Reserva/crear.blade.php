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
                <div class="card-tools pull-right">
                    <a href="{{route('reserva_index')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver
                    </a>
                </div>
            </div>
            <form action="{{route('reserva_guardar')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    @include('reserva.form')
                </div>
                <div class="card-footer">
                    <div class="col-lg-11">
                        <button type="submit" class="btn btn-app bg-info float-right">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection