@extends('layouts.plantilla')
@section('content')
<form action="{{ url('/empleados') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('empleados.form',['Modo'=>'crear']) 
</form>
@endsection