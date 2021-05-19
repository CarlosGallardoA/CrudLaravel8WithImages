<div class="mb-3">
    <label for="Nombre" class="form-label">{{ 'Nombre' }}</label>
    <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ isset($empleado->Nombre) ? $empleado->Nombre : '' }}">
</div>
<div class="mb-3">
    <label for="ApellidoPaterno" class="form-label">{{ 'Apellido Paterno' }}</label>
    <input type="text" name="ApellidoPaterno" class="form-control" id="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno) ? $empleado->ApellidoPaterno : '' }}">
</div>
<div class="mb-3">
    <label for="ApellidoMaterno" class="form-label">{{ 'Apellido Materno' }}</label>
    <input type="text" name="ApellidoMaterno" class="form-control" id="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno) ? $empleado->ApellidoMaterno : '' }}">
</div>
<div class="mb-3">
    <label for="Correo" class="form-label">{{ 'Correo' }}</label>
    <input type="email" name="Correo" class="form-control" id="Correo" value="{{ isset($empleado->Correo) ? $empleado->Correo : '' }}">
</div>
<div class="mb-3">
    <label for="Foto" class="form-label">{{ 'Foto' }}</label>
    @if (isset($empleado->Foto))
        <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="" width="200">
    @endif
    <input type="file" name="Foto" class="form-control" id="Foto" value="">
</div>
<input type="submit" class="btn btn-primary" name="" id="" value="{{ $Modo=='crear' ? 'Agregar':'Actualizar' }}">