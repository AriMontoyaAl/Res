<div class="form-group row">
    <label for="nombre_del_huesped" class="col-lg-2 control-label offset-md-1 requerido">Nombre del huesped</label>
    <div class="col-sm-8">
      <input type="text" name="nombre_del_huesped" id="nombre_del_huesped" placeholder="Escriba el nombre del huesped." class="form-control" value="{{old('nombre_del_huesped', $datas->nombre_del_huesped ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="apellido_del_huesped" class="col-lg-2 control-label offset-md-1 requerido">Apellido del huesped</label>
    <div class="col-sm-8">
      <input type="text" name="apellido_del_huesped" id="apellido_del_huesped" placeholder="Escriba el apellido del huesped" class="form-control" value="{{old('apellido_del_huesped', $datas->apellido_del_huesped ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="correo_electronico" class="col-lg-2 control-label offset-md-1 requerido">Correo electronico</label>
    <div class="col-sm-8">
      <input type="email" name="correo_electronico" id="correo_electronico" placeholder="Escriba el Correo electronico" class="form-control" value="{{old('correo_electronico', $datas->correo_electronico ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
  <label for="telefono" class="col-lg-2 control-label offset-md-1 requerido">Telefono</label>
  <div class="col-sm-8">
    <input type="number" name="telefono" id="telefono" placeholder="Escriba el telefono" class="form-control" value="{{old('telefono', $datas->telefono ?? '')}}" required/>
  </div>
</div>