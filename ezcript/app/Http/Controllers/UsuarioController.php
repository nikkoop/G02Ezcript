<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Redirect;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pef_id)
    {
        // Retornar la información de los perfiles
        $perfiles['datosUsuario'] = Usuario::where("pef_id", "=", $pef_id)->first();

        if($perfiles['datosUsuario']== null){
            return view('/welcome');
        }

        // Desencriptar contraseña
        // $contrasenaEncriptada = $perfiles['datosUsuario']->pef_contrasena;
        // try {
        //     $perfiles['datosUsuario']->pef_contrasena = Crypt::decrypt($contrasenaEncriptada);
        // } catch (Illuminate\Contracts\Encryption\DecryptException $e) {
            
        // }

        // Obtener información de los roles
        $idRol = $perfiles['datosUsuario']->rol_id;
        $roles['rol'] = Rol::where("rol_id", "=", $idRol)->first();

        return view('perfil.index', $perfiles, $roles);
    }

    /**
     * Show the form for creating a new resource.e
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $datosUsuario = request()->except('_token');
        // Curso::insert($datosUsuario);
        // return redirect('perfil.index')->with('mensaje', 'Perfil cambiado');

        // $datosUsuario = request()->except('_token');

        // // Obteniendo el nombre que el usuario ya tiene por defecto
        // $nombreUsuario = Usuario::select('select pef_nombre, pef_apellido_paterno, 
        //     pef_apellido_materno from usuario where pef_id = ?', [$datosUsuario['pef_id']]
        // );
        // $datosUsuario->pef_primer_nombre = $nombreUsuario['pef_nombre'];
        // $datosUsuario->pef_apellido_paterno =$nombreUsuario['pef_apellido_paterno'];
        // $datosUsuario->pef_apellido_materno =$nombreUsuario['pef_apellido_materno'];

        // // Obteniendo la foto que el usuario envia a traves del formulario
        // if($request->hasFile('pef_foto')){
        //     $datosUsuario['pef_foto'] = $request->file('pef_foto')->store('');
        // }
        // else{
            
        // }

        // Usuario::edit($datosUsuario);
        // return response()->json($datosUsuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($pef_id)
    {
        // Retornar la información de los perfiles
        $perfiles['datosUsuario'] = Usuario::where("pef_id", "=", $pef_id)->first();

        // Verificar si el perfil existe
        if($perfiles['datosUsuario']->isEmpty()){
            return view('/welcome');
        }

        // Obtener información de los roles
        $idRol = $perfiles['datosUsuario']->rol_id;
        $roles['rol'] = Rol::where("rol_id", "=", $idRol)->first();

        return view('perfil.show', $perfiles, $roles);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($pef_id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pef_id)
    {

        // Verificar que tipo de acción se está recibiendo
        $operacion = $request->operacion;
        if($operacion == "destroy"){
            Usuario::destroy($pef_id);
            Alert::success("Perfil Eliminado", "El perfil ha sido eliminado exitosamente");
            return view("/welcome");
        }
        else if($operacion == "cancel"){
            return view("/perfil". "/". $pef_id);
        }

        // Extraer los datos del usuario
        $datosUsuario = $request->except(['_token', '_method', 'operacion']);

        // Validar los datos del usuario
        $reglas = array(
            "pef_rut" => array("required", "regex:/^\d{1,2}\.\d{3}\.\d{3}[-][0-9K]{1}$/"),
            "pef_correo" => array("required", "regex:/(.+)@(.+)\.(.+)/i"),
            "pef_telefono" => array("nullable", "regex:/^(\+?56)?(\s?)(0?9)(\s?)[98765432]\d{7}$/")
        );
        $mensajes = array(
            "required" => "Este campo es obligatorio",
            "pef_rut.regex" => "El RUT proporcionado no posee un formato válido",
            "pef_correo.regex" => "El correo proporcionado no posee un fromato válido",
            "pef_telefono.regex" => "El teléfono proporcionado no posee un formato válido",
            "min" => "Este valor debe tener al menos 8 carácters",
            "max" => "Este valor no debe tener más de 255 caracteres"
        );
        $datosUsuarioParaValidar = array(
            "pef_rut" => $datosUsuario['pef_rut'], 
            "pef_correo" => $datosUsuario['pef_correo'],
            "pef_telefono" => $datosUsuario['pef_telefono']
        );

        $validar = Validator::make($datosUsuarioParaValidar, $reglas, $mensajes);

        // Cuando la validación falla..
        if(!$validar->passes()){
            $url = "/perfil". "/". $pef_id;
            // return Redirect::to($url)->with_input()->with_errors();
            return back()->withInputs($datosUsuarioParaValidar)->withErrors($validar->errors());
        }

        // Guardar la foto adjuntada
        if($request->hasFile('pef_foto')){

            $usuario = Usuario::findOrFail($pef_id);
            // Eliminar la foto antigua
            Storage::delete('public/'. $usuario->pef_foto);

            // Agarrar el nombre de ese campo (de la foto) y guardarla en la carpeta uploads
            $datosUsuario['pef_foto'] = $request->file('pef_foto')->store('uploads', 'public');
        }

        // Obteniendo el id del nombre del rol del usuario
        $datosUsuario['rol_id'] = Rol::where("rol_nombre", "=", $datosUsuario['rol_id'])->first()->rol_id;

        // Encriptar contraseña
        //$datosUsuario['pef_contrasena'] = Crypt::encrypt($datosUsuario['pef_contrasena']);

        // Corrigiendo los campos NO OBLIGATORIOS que esten vacios
        if(empty($datosUsuario['pef_telefono'])){
            $datosUsuario['pef_telefono'] = 'No tiene';
        }
        if(empty($datosUsuario['pef_rut'])){
            $datosUsuario['pef_rut'] = 'No tiene'; /* Este campo es obligatorio, pero por el momento no lo será*/
        }

        // Actualizar el registro
        if(Usuario::where('pef_id', '=', $pef_id)->update($datosUsuario)){
            Alert::success("Datos Actualizados", "Los datos han sido actualizados exitosamente");
        }
        else{
            Alert::error("Error", "Se produjo un error al guardar los datos");
        }

        // Obtener información del perfil
        $perfiles['datosUsuario'] = Usuario::where("pef_id", "=", $pef_id)->first();

        // Obtener información de los roles
        $idRol = $perfiles['datosUsuario']->rol_id;
        $roles['rol'] = Rol::where("rol_id", "=", $idRol)->first();

        return view('perfil.index', $perfiles, $roles);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario, $pef_id)
    {
        $datos = Usuario::where('pef_id', '=', $pef_id)->first();
        $datos['pef_descripcion'] = "Eliminado";
        Usuario::where('pef_id', '=', $pef_id)->update($datos);

        echo "<script> console.log('Eliminado') </script>";

        Alert::success("Perfil Eliminado", "El perfil ha sido eliminado exitosamente");
        return view("\welcome");
    }
}
