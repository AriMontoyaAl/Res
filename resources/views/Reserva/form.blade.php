<div class="form-group row">
    <label for="fecha_de_entrada" class="col-lg-2 control-label offset-md-1 requerido">Fecha de entrada</label>
    <div class="col-sm-8">
      <input type="date" name="fecha_de_entrada" id="fecha_de_entrada" placeholder="Escriba el fecha de entrada." class="form-control" value="{{old('fecha_de_entrada', $datos->fecha_de_entrada ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="fecha_de_salida" class="col-lg-2 control-label offset-md-1 requerido">Fecha de salida</label>
    <div class="col-sm-8">
      <input type="date" name="fecha_de_salida" id="fecha_de_salida" placeholder="Escriba el fecha de salida" class="form-control" value="{{old('fecha_de_salida', $datos->fecha_de_salida ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="id_habitacion" class="col-lg-2 control-label offset-md-1 requerido">Numero de habitacion</label>
    <div class="col-sm-8">
      <select name="id_habitacion" id="id_habitacion" class="form-control" required>
          <option selected="" disabled>Seleccione la habitacion</option>
          @foreach ($habitacion as $id => $numero_de_habitacion)
            <option value="{{$id}}" {{old('id_habitacion', $habitacions->id ?? '') == $id ? "selected" : ''}}>{{$numero_de_habitacion}}</option>
          @endforeach
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="id_huesped" class="col-lg-2 control-label offset-md-1 requerido">Huesped</label>
    <div class="col-sm-8">
      <select name="id_huesped" id="id_huesped" class="form-control" required>
          <option selected="" disabled>Seleccione el huesped</option>
          @foreach ($huesped as $id => $nombre_del_huesped)
            <option value="{{$id}}" {{old('id_huesped', $huespeds->id ?? '') == $id ? "selected" : ''}}>{{$nombre_del_huesped}}</option>
          @endforeach
      </select>
    </div>
  </div>

<div class="form-group row">
    <label for="numero_de_huespedes" class="col-lg-2 control-label offset-md-1 requerido">Numero de huespedes</label>
    <div class="col-sm-8">
      <input type="number" name="numero_de_huespedes" id="numero_de_huespedes" placeholder="Escriba el numero de huespedes" class="form-control" value="{{old('numero_de_huespedes', $datos->numero_de_huespedes ?? '')}}" required/>
    </div>
</div>''