<div class="form-group">
  <label for="nombre_del_huesped" class="control-label">Nombre del huesped</label>
  <input type="text" name="nombre_del_huesped" id="nombre_del_huesped" placeholder="Escriba el nombre del huesped." class="form-control" value="{{old('nombre_del_huesped', $datas->nombre_del_huesped ?? '')}}" required/>
</div>

<div class="form-group">
  <label for="apellido_del_huesped" class="control-label">Apellido del huesped</label>
  <input type="text" name="apellido_del_huesped" id="apellido_del_huesped" placeholder="Escriba el apellido del huesped" class="form-control" value="{{old('apellido_del_huesped', $datas->apellido_del_huesped ?? '')}}" required/>
</div>

<div class="form-group">
  <label for="correo_electronico" class="control-label">Correo electronico</label>
  <input type="email" name="correo_electronico" id="correo_electronico" placeholder="Escriba el Correo electronico" class="form-control" value="{{old('correo_electronico', $datas->correo_electronico ?? '')}}" required/>
</div>

<div class="form-group">
  <label for="telefono" class="control-label">Telefono</label>
  <input type="text" name="telefono" id="telefono" placeholder="Escriba el numero Telefono" class="form-control" value="{{old('telefono', $datas->telefono ?? '')}}" required/>
</div>