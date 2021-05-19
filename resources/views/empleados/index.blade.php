@extends('layouts.plantilla')
@section('content')
@if(Session::has('Message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ Session::get('Message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif
<table class="table table-striped">
    <thead>
        <tr class="table-dark">
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        @foreach ( $empleados as $empleado )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="" width="70" height="80" class="img-thumbnail img-fluid"></td>
            <td>{{ $empleado->Nombre }}</td>
            <td>{{ $empleado->ApellidoPaterno }}</td>
            <td>{{ $empleado->ApellidoMaterno }}</td>
            <td>{{ $empleado->Correo }}</td>
            <td>
                <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}" class="btn btn-warning">Editar</a>
                <form action="{{ url('/empleados/'.$empleado->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Eliminar ?')" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $empleados->links() }}
@endsection