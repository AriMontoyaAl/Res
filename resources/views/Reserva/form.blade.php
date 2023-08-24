<div class="form-group">
  <label for="fecha_de_entrada" class="control-label">Fecha de entrada</label>
  <input type="date" name="fecha_de_entrada" id="fecha_de_entrada" placeholder="Escriba el fecha de entrada" class="form-control" value="{{old('fecha_de_entrada', $reservas->fecha_de_entrada ?? '')}}" required/>
</div>

<div class="form-group">
  <label for="fecha_de_salida" class="control-label">Fecha de salida</label>
  <input type="date" name="fecha_de_salida" id="fecha_de_salida" placeholder="Escriba el fecha de salida" class="form-control" value="{{old('fecha_de_salida', $reservas->fecha_de_salida ?? '')}}" required/>
</div>


  <div class="form-group">
    <label for="id_habitacion" class="control-label">Habitaciones</label> 
    {!! Form::select('id_habitacion', $habitacion, old('id_habitacion', $habitacion_id ?? ''), ['class' => 'form-control', 'placeholder' => 'Seleccione la habitacion']) !!}     
  </div> 


<div class="form-group">
  <label for="id_huesped" class="control-label">Huesped</label>
  {!! Form::select('id_huesped', $huesped, old('id_huesped', $huesped_id ?? ''), ['class' => 'form-control', 'placeholder' => 'Seleccione el huesped']) !!}                    
</div> 

<div class="form-group">
  <label for="numero_de_huespedes" class="control-label">Numero de huespedes</label>
  <input type="number" name="numero_de_huespedes" id="numero_de_huespedes" placeholder="Escriba el numero de huespedes" class="form-control" value="{{old('numero_de_huespedes', $reservas->numero_de_huespedes ?? '')}}" required/>
</div>