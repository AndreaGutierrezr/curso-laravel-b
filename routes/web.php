<?php

use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\TController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\TestController;

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
//CREAMOS UNA RUTA DE TIPO RECURSO 
Route::resource('post', PostController::class);

// //PARA AHORRARNOS TODO ESTO
// Route::get('post', [PostController::class,'index']);
// Route::get('post/{post}', [PostController::class,'show']);
// Route::get('post/create', [PostController::class,'create']);
// Route::get('post/{post}/edit', [PostController::class,'edit']);

// Route::post('post', [PostController::class,'store']);
// //PATCH ES PARA MODIFICAR PARTES CLAVES
// Route::put('post/{post}', [PostController::class,'update']);
// Route::delete('post/{post}', [PostController::class,'delete']);
//REFERENCIANDO AL CONTROLADOR
//opcion 1
//Route::get('/', [TestController::class, 'test']);
//opcion 2
//Route::get('/', [App\Http\Controllers\TestController::class, 'test']);

// Route::get('/', [TController::class, 'index']);