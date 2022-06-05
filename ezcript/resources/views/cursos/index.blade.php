@extends('layouts.plantilla')

@section('content')

<div class="py-3">

    <div style="display: flex; justify-content: space-between">
        <h1 class="text-light">Cursos creados</h1>
        <a href="{{url('cursos/create')}}" class="btn btn-success" style="align-self: center; width: 200px"> Crear Un Nuevo Curso </a>
    </div>
    <br>
    @foreach($cursos as $curso )
    <div class="card shadow-lg">

        <h5 class="card-header">{{$curso->cur_nombre}}</h5>

        <div class="card-body">

            <div class="row">
                <div class="col-sm-5 col-md-6">
                    <span class="p-5">
                        <p class="card-text">{{$curso->cur_descripcion}}</p>
                    </span>
                </div>
                <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                    @foreach($periodos as $periodo)
                    @if($curso->per_id == $periodo->id)
                    <span class="p-3">
                        <p class="card-text "><strong>Periodo:</strong> {{$periodo->per_anio}}-{{$periodo->per_semestre}}</p>
                    </span>
                    @break
                    @endif
                    @endforeach

                    @foreach($asignaturas as $asignatura)
                    @if($curso->asg_id == $asignatura->id)
                    <span class="p-3">
                        <p class="card-text "><strong>Asignatura:</strong> {{$asignatura->asg_nombre}}</p>
                    </span>
                    @break
                    @endif
                    @endforeach
                </div>


            </div>
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

</div>
@endsection