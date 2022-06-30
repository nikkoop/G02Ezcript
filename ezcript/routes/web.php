<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('cursos',CursoController::class); //para acceder a todas las rutas de cursos

// Rutas del controlador de Perfiles "UsuarioController"

Route::get('/perfil/show/{pef_id}', [UsuarioController::class, "show"]);

Route::get('/perfil/{pef_id}', [UsuarioController::class, "index"]);

Route::patch('/perfil/{pef_id}', [UsuarioController::class, "update"]);

Route::delete('/perfil/{perf_id}', [UsuarioController::class, "destroy"]);

//Route::resource('perfil', UsuarioController::class);