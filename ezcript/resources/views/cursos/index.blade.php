@extends('layouts.plantilla')

@section('content')

<br>
<div style="display: flex; justify-content: space-between">
    <h1>Cursos creados</h1>
    <a href="{{url('cursos/create')}}" class="btn btn-success" style="align-self: center; width: 200px"> Crear Un Nuevo Curso </a>
</div>
<br>
@foreach($cursos as $curso )
<div class="card">

    
        <div class="card-body">
            <h5 class="card-title">{{$curso->cur_nombre}}</h5>
            <p class="card-text">{{$curso->cur_descripcion}}</p>
            <div class="container">

                <div class="col-sm-6 col-xs-12">

                    <div class="row row-cols-auto">
                        <div class="col">
                            <a href="#" class="btn btn-primary">Entrar al Curso</a>
                        </div>

                        <div class="col">
                            <a href="{{url('/cursos/'.$curso->id.'/edit')}}" class="btn btn-warning">Editar Curso</a>
                        </div>

                        <div class="col">
                            <form action="{{url('/cursos/'.$curso->id)}}" method="post">
                                @csrf
                                {{method_field('DELETE')}}

                                <input type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro/a que deseas eliminar este curso?')" value="Eliminar curso">

                            </form>
                        </div>


                    </div>


                </div>

            </div>
        </div>
    



</div>
<br>
@endforeach

@endsection