@extends("plantilla")

@section('titulo')
Reservaciones
@endsection
@section('contenido')
    <div class="content-header">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" data-auto-dismiss="3000">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
                <h5><i class="icon fas fa-ban"></i>El Formulario Contiene Errores</h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-control">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools pull-right">
                        <a href="{{route('reserva_index')}}" class="btn btn-block btn-sm">
                            <i class="fa fa-fw fa-reply-all"></i> Volver
                        </a>
                    </div>
                </div>
                <form action="{{route('reserva_guardar')}}" id="form-general" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        @include('reserva.form')
                    </div>
                    <div class="card-footer">
                        <div class="col-lg-11">
                            <button type="submit" class="btn btn-app float-right">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection