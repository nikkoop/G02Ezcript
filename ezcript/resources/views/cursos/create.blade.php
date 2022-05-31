@extends('layouts.plantilla')

@section('content')


<form action="{{ url('/cursos') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('cursos.form',['modo'=>'Crear'])

</form>

@endsection