<div class="py-5">

    
    <h1 class="text-light">{{ $modo }} Curso</h1>
    <br>

    
    <p class="text-danger"><strong>* Obligatorio</strong></p>

    <label class="text-light" for="Asignatura"><strong>Asignatura</strong></label>
    <lavel for="Asignatura" class="text-danger"> *</lavel>
    <select class="form-select" name="asg_id" id="Asignatura">
        <option selected disabled value="">--Seleccione la Asignatura--</option>
        @foreach($asignaturas as $asignatura)
        <option value="{{ $asignatura->id }}" @if (isset($curso->asg_id) && $curso->asg_id == $asignatura->id) selected @endif>{{$asignatura->asg_nombre}}</option>
        @endforeach
    </select>
    <br>
    <label class="text-light" for="Carrera"><strong>Carrera</strong></label>
    <lavel for="Carrera" class="text-danger"> *</lavel>
    <select class="form-select" name="car_id" id="Carrera">
        <option selected disabled value="">--Seleccione la Carrera--</option>
        @foreach($carreras as $carrera)
        <option value="{{ $carrera->id }}" @if (isset($curso->car_id) && $curso->car_id == $carrera->id) selected @endif>{{$carrera->car_nombre}}</option>
        @endforeach
    </select>
    <br>
    <label class="text-light" for="Periodo"><strong>Periodo</strong></label>
    <lavel for="Periodo" class="text-danger"> *</lavel>
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
    <label class="text-light" for="Nombre"><strong>Nombre del Curso</strong></label>
    <lavel for="Nombre" class="text-danger"> *</lavel>
    <input type="text" class="form-control" name="cur_nombre" value="{{isset($curso->cur_nombre)?$curso->cur_nombre:''}}" id="Nombre">
    <br>
    <label class="text-light" for="Profesor"><strong>Nombre del Profesor</strong></label>
    <input type="text" class="form-control" name="cur_profesor" value="{{isset($curso->cur_profesor)?$curso->cur_profesor:''}}" id="Profesor">
    <br>
    <label class="text-light" for="Descripcion"><strong>Descripción del Curso</strong></label>
    <textarea class="form-control" name="cur_descripcion" id="Descripcion">{{isset($curso->cur_descripcion)?$curso->cur_descripcion:''}}</textarea>
    <br>
    <input class="btn btn-success" type="submit" value=" {{ $modo }} Curso">
    <a href="{{url('cursos/')}}" class="btn btn-success" style="align-self: center; width: 200px"> Regresar </a>

</div>