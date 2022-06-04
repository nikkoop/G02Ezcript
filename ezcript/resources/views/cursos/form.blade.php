<br>
<h1  class="text-light">{{ $modo }} Curso</h1>
<br><br>

<body>
    <label for="Asignatura">Asignatura</label>
    <select class="form-select" name="asg_id" id="Asignatura">
        <option selected disabled value="">--Seleccione la Asignatura--</option>
        @foreach($asignaturas as $asignatura)
        <option value="{{ $asignatura->id }}" @if (isset($curso->asg_id) && $curso->asg_id == $asignatura->id) selected @endif>{{$asignatura->asg_nombre}}</option>
        @endforeach
    </select>
    <br>
    <label for="Carrera">Carrera</label>
    <select class="form-select" name="car_id" id="Carrera">
        <option selected disabled value="">--Seleccione la Carrera--</option>
        @foreach($carreras as $carrera)
        <option value="{{ $carrera->id }}" @if (isset($curso->car_id) && $curso->car_id == $carrera->id) selected @endif>{{$carrera->car_nombre}}</option>
        @endforeach
    </select>
    <br>
    <label for="Periodo">Periodo</label>
    <select class="form-select" name="per_id" id="Periodo">
        <option selected disabled value="">--Seleccione el Año--</option>
        @foreach($periodos as $periodo)
        <option value="{{ $periodo->id }}" @if (isset($curso->per_id) && $curso->per_id == $periodo->id) selected @endif>{{$periodo->per_anio}}</option>
        @endforeach
    </select>
    <select class="form-select" name="per_id" id="Periodo">
        <option selected disabled value="">--Seleccione el Semestre--</option>
        @foreach($periodos as $periodo)
        <option value="{{ $periodo->id }}" @if (isset($curso->per_id) && $curso->per_id == $periodo->id) selected @endif>{{$periodo->per_semestre}}</option>
        @endforeach
    </select>
    <br>
    <label for="Nombre">Nombre del Curso</label>
    <input type="text" class="form-control" name="cur_nombre" value="{{isset($curso->cur_nombre)?$curso->cur_nombre:''}}" id="Nombre">
    <br>
    <label for="Profesor">Nombre del Profesor</label>
    <input type="text" class="form-control" name="cur_profesor" value="{{isset($curso->cur_profesor)?$curso->cur_profesor:''}}" id="Profesor">
    <br>
    <label for="Descripcion">Descripción del Curso</label>
    <textarea class="form-control" name="cur_descripcion"  id="Descripcion">{{isset($curso->cur_descripcion)?$curso->cur_descripcion:''}}</textarea>
    <br>
    <input class="btn btn-success" type="submit" value=" {{ $modo }} Curso">
    <a href="{{url('cursos/')}}" class="btn btn-success" style="align-self: center; width: 200px"> Regresar </a>
    <br>
</body>