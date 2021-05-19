@extends('layouts.plantilla')
@section('content')
<form action="{{ url('/empleados/'.$empleado->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('empleados.form',['Modo'=>'editar']) 
</form>
@endsection