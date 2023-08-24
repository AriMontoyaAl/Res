@extends("plantilla")

@section('titulo')
    Huespedes
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
                    <a href="{{route('huesped_index')}}" class="btn btn-block btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver
                    </a>
                </div>
            </div>
            <form action="{{route('huesped_actualizar', ['id' => $datas->id])}}" id="form-general" method="POST" autocomplete="off">
                @csrf
                @method("put")
                <div class="card-body">
                    @include('huesped.form')
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
    </div>
@endsection