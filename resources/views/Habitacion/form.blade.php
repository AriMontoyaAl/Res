<div class="form-group">
  <label for="numero_de_habitacion" class="control-label">Numero de habitacion</label>
  <input type="number" name="numero_de_habitacion" id="numero_de_habitacion" placeholder="Escriba el numero de habitacion" class="form-control" value="{{old('numero_de_habitacion', $datos->numero_de_habitacion ?? '')}}" required/>
</div>

<div class="form-group">
  <label for="tipo_de_habitacion" class="control-label">Tipo de habitacion</label>
  <input type="text" name="tipo_de_habitacion" id="tipo_de_habitacion" placeholder="Escriba el tipo de habitacion" class="form-control" value="{{old('tipo_de_habitacion', $datos->tipo_de_habitacion ?? '')}}" required/>
</div>

<div class="form-group">
  <label for="precio" class="control-label">Precio</label>
  <input type="number" name="precio" id="precio" placeholder="Escriba el precio" class="form-control" value="{{old('precio', $datos->precio ?? '')}}" required/>
</div>