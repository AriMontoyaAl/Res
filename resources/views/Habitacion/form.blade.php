<div class="form-group row">
    <label for="numero_de_habitacion" class="col-lg-2 control-label offset-md-1 requerido">Numero de habitacion</label>
    <div class="col-sm-8">
      <input type="number" name="numero_de_habitacion" id="numero_de_habitacion" placeholder="Escriba el numero de la habitacion." class="form-control" value="{{old('numero_de_habitacion', $datos->numero_de_habitacion ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="tipo_de_habitacion" class="col-lg-2 control-label offset-md-1 requerido">Tipo de habitacion</label>
    <div class="col-sm-8">
      <input type="text" name="tipo_de_habitacion" id="tipo_de_habitacion" placeholder="Escriba el tipo de habitacion" class="form-control" value="{{old('tipo_de_habitacion', $datos->tipo_de_habitacion ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="precio" class="col-lg-2 control-label offset-md-1 requerido">Precio</label>
    <div class="col-sm-8">
      <input type="number" name="precio" id="precio" placeholder="Escriba el precio" class="form-control" value="{{old('precio', $datos->precio ?? '')}}" required/>
    </div>
</div>