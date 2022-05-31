<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Periodo;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cursos']=Curso::paginate(5); //se guarda en la variable cursos
        return view('cursos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $asignaturas = Asignatura::all();
        $carreras = Carrera::all();
        $periodos = Periodo::all();

        return view('cursos.create', compact('asignaturas','carreras','periodos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datoscurso = request()->except('_token'); //va a recibir la informacion excepto el token
        Curso::insert($datoscurso);
        return response()->json($datoscurso);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //A travez del id se pasa la información a $curso y se retorna la vista con la información
        $curso=Curso::findOrFail($id);

        $asignaturas = Asignatura::all();
        $carreras = Carrera::all();
        $periodos = Periodo::all();

        return view('cursos.edit', compact('curso','asignaturas','carreras','periodos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datoscurso = request()->except(['_token','_method' ]);//va a recibir la informacion excepto el token y el metodo PATCH
        Curso::where('id','=',$id)->update($datoscurso);
        $curso=Curso::findOrFail($id);
        $asignaturas = Asignatura::all();
        $carreras = Carrera::all();
        $periodos = Periodo::all();
        return view('cursos.edit', compact('curso','asignaturas','carreras','periodos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Para eliminar un curso
        Curso::destroy($id);
        return redirect('cursos');
    }
}
