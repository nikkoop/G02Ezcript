

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>

    <!-- IMPORTANDO SCRIPT DE SWEET ALERT 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- IMPORTANDO SCRIPT DE JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- IMPORTANDO SCRIPTS DE DATATABLE -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></link>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"></script>
    
    <!-- IMPORTAND BOOTSTRAP 5 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->

    <!-- IMPORTANDO JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/ezcript/resources/js/perfil/perfil-jquery.js"></script>

    <!-- IMPORTANDO SCRIPT PARA ENVIAR PETICIONES DELETE DESDE JAVASCRIPT -->
    <script src="/ezcript/resources/js/perfil/laravel.js"></script>

    <!-- IMORTANDO ICONOS DE FONT-AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- IMPORTANDO SWEET ALERT 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<form action="{{ url('/perfil/'.$datosUsuario->pef_id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <!-- {{ method_field('GET') }} -->
    <input class="btn btn-small btn-primary d-none" name = "operacion" type="text" value="update">
    <div class="container" style="padding-top: 30px">
        <div class="row">
            <div class="col-12 border">
                <h1>
                    {{ 
                        $datosUsuario->pef_nombre. " ". 
                        $datosUsuario->pef_apellido_paterno. " ". 
                        $datosUsuario->pef_apellido_materno 
                    }}
                </h1>
            </div>
        </div>
        <div class="row">
            <!-- Columna Izquierda -->
            <div class="col-12 col-lg-4 border pt-3">
                <!-- Foto de perfil del usuario -->
                    <div class="form-group">

                        <!-- Foto de Perfil -->
                        <img 
                            class="img-fluid border border-3 position-relative w-100 mw-100 rounded-circle"
                            id="foto-perfil"
                            src="{{ '/ezcript/storage/app/public/'. $datosUsuario->pef_foto }}" 
                            alt="Foto de perfil"
                        >
                        <!-- Botón para cambiar la foto de perfil -->
                        <label 
                            class="cursor-pointer 
                                btn btn-sm btn-primary 
                                position-absolute z-100"
                            style="right: 13px;"
                            alt="Cambiar foto de perfil"
                            id="cambiar-foto"
                        >
                            <i class="fa fa-camera"></i>
                            <input class="d-none" type="file" name="pef_foto" accept=".png,.jpg" value="{{ $datosUsuario->pef_foto }}"> 
                        </label>

                        <!-- Botón para subir la foto de perfil -->
                        <!-- <button
                            type="submit" 
                            id="guardar-foto"
                            class="btn btn-sm btn-success 
                                position-absolute d-none z-100"
                            style="right: 13px"
                            
                        >
                            <i class="fa fa-save"></i>
                        </button> -->
                    </div>
                
                    <?php 
                        // echo $infoUsuario->PEF_FOTO;
                    ?>
            </div>
            <!-- --Columna Derecha -->
            <div class="col-12 col-lg-8 border pt-3">

                    <!-- <div class="row">
                        <div class="col-12">
                            <h3>
                                ID del Usuario:
                                <?php 
                                    //echo $infoUsuario->PEF_ID;
                                ?> 
                            </h3>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <h5 class="d-flex justify-content-between">
                                    <b>Rol:</b>
                                    <div class="">
                                        <!-- Eliminar usuario -->
                                        <button
                                            type="submit" 
                                            id="eliminar-perfil"
                                            class="btn btn-sm btn-danger z-100"
                                            alt="Eliminar perfil"
                                            onclick = "return eliminarUsuario()";
                                        >
                                            <i class="fa fa-trash"></i>    
                                        </button>

                                        <!-- <button 
                                            type="button" 
                                            id="editar-perfil"
                                            class="btn btn-sm btn-primary z-100"
                                            alt="Editar perfil"
                                            input=""
                                        >
                                            <i class="fa fa-pencil"></i>    
                                        </button> -->

                                        <button
                                            type="button" 
                                            id="cancelar-editar-perfil"
                                            class="btn btn-sm btn-danger d-none z-100"
                                            
                                        >
                                            <i class="fa fa-ban"></i>    
                                        </button>

                                        <button
                                            type="submit" 
                                            id="guardar-datos"
                                            class="btn btn-sm btn-success d-none z-100"
                                        >
                                            <i class="fa fa-save"></i>    
                                        </button>
                                    </div>
                                </h5>
                                <h3>
                                    <input 
                                        class="w-100 border-0"
                                        style="outline:none;"
                                        type="text" 
                                        name="rol_id"
                                        value="{{ $rol->rol_nombre}}"
                                        readonly
                                    >
                                </h3>
                            </div>
                            <h3>
                                <?php 
                                    // echo $infoRolUsuario->ROL_NOMBRE;
                                ?> 
                            </h3>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-12">
                            <h5>
                                <b>ID:</b> 
                            </h5>
                            <h3>
                                <input 
                                    class="w-100 border-0"
                                    style="outline:none;"
                                    type="text" 
                                    name="pef_id"
                                    value="{{ $datosUsuario->pef_id}}"
                                    readonly
                                >
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>RUT:</b>
                                <button 
                                    type="button" 
                                    id="editar-campo"
                                    class="btn btn-sm btn-primary z-100"
                                    alt="Editar perfil"
                                    input="pef_rut"
                                >
                                    <i class="fa fa-pencil"></i>    
                                </button>
                            </h5>
                            <h3>
                                <input 
                                    class="w-50 border-0"
                                    style="outline:none;"
                                    type="text" 
                                    name="pef_rut"
                                    value="{{ $datosUsuario->pef_rut }}"
                                    readonly
                                >
                            </h3>
                            @if($errors->has("pef_rut"))
                                <li style="color: red;">{{$errors->first("pef_rut")}}</li>
                                <br>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Correo:</b>
                                <button 
                                    type="button" 
                                    id="editar-campo"
                                    class="btn btn-sm btn-primary z-100"
                                    alt="Editar perfil"
                                    input="pef_correo"
                                >
                                    <i class="fa fa-pencil"></i>    
                                </button>
                            </h5>
                            <h3>
                                <input 
                                    class="w-100 border-0"
                                    style="outline:none;"
                                    type="text" 
                                    name="pef_correo"
                                    value="{{ $datosUsuario->pef_correo }}"
                                    readonly
                                >
                            </h3>
                            @if($errors->has("pef_correo"))
                                <li style="color: red;">{{$errors->first("pef_correo")}}</li>
                                <br>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Teléfono:</b>
                                <button 
                                    type="button" 
                                    id="editar-campo"
                                    class="btn btn-sm btn-primary z-100"
                                    alt="Editar perfil"
                                    input="pef_telefono"
                                >
                                    <i class="fa fa-pencil"></i>    
                                </button>
                            </h5>
                            <h3>
                                <input 
                                    class="w-50 border-0"
                                    style="outline:none;"
                                    type="text" 
                                    name="pef_telefono"
                                    value="{{ $datosUsuario->pef_telefono }}"
                                    readonly
                                >
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Página Web:</b>
                                <button 
                                    type="button" 
                                    id="editar-campo"
                                    class="btn btn-sm btn-primary z-100"
                                    alt="Editar perfil"
                                    input="pef_pagina_web"
                                >
                                    <i class="fa fa-pencil"></i>    
                                </button>
                            </h5>
                            <h3> 
                                <input 
                                    class="w-100 border-0"
                                    style="outline:none;"
                                    type="text" 
                                    name="pef_pagina_web"
                                    value="{{ $datosUsuario->pef_pagina_web }}"
                                    readonly
                                >
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Contraseña:</b>
                                <button 
                                    type="button" 
                                    id="editar-campo"
                                    class="btn btn-sm btn-primary z-100"
                                    alt="Editar perfil"
                                    input="pef_contrasena"
                                >
                                    <i class="fa fa-pencil"></i>    
                                </button>
                            </h5>
                            <h3 class="d-flex">
                                <input 
                                    class="w-50 border-0"
                                    style="outline:none;"
                                    type="password" 
                                    name="pef_contrasena"
                                    value="{{ $datosUsuario->pef_contrasena }}"
                                    readonly
                                >
                                
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Descripción:</b>
                                <button 
                                    type="button" 
                                    id="editar-campo"
                                    class="btn btn-sm btn-primary z-100"
                                    alt="Editar perfil"
                                    input="pef_descripcion"
                                >
                                    <i class="fa fa-pencil"></i>    
                                </button>
                            </h5>
                            <h3>
                                <input 
                                    class="w-100 border-0"
                                    style="outline:none;"
                                    type="text" 
                                    name="pef_descripcion"
                                    value="{{$datosUsuario->pef_descripcion}}"
                                    readonly
                                > 
                            </h3>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- <div class="container"></div> -->
    </form>
    @include('sweetalert::alert')
</body>
</html>