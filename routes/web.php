<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\Route;

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
//RUTA POR DEFECTO
Route::get('/', function () {
    return view('welcome');
});



//ARGUMENTOS DE LAS RUTAS
// Route::get('/test/{id?}', function($id = 10){
//    echo $id;
// });
// Route::get('/category/{id}', [CategoryController::class, 'new'] );



//AGRUPACIÓN  EN LAS RUTAS
// Route::controller(PostController::class)->group(function()
// {
//     Route::get('post', 'index')->name("post.index");
//     Route::get('post/{post}', 'show')->name("post.show");
//     Route::get('post/create', 'create')->name("post.create");
//     Route::get('post/{post}/edit', 'edit')->name("post.edit");

//     Route::post('post', 'store')->name("post.store");
//     Route::put('post/{post}', 'update')->name("post.update");
//     Route::delete('post/{post}', 'delete')->name("post.destroy");
// });

//MIDDLEWARE
// Route::middleware([TestMiddleware::class])->group(function(){
//     Route::get('/test/{id?}', function($id = 10){
//     echo $id;
//     });
// });


//PREFIJO
Route::group(['prefix'=> 'dashboard'], function() {
    //ONLY INDICA LAS RUTAS QUE UNICAMENTE SE VAN A MOSTRAR
    // Route::resource('post', PostController::class)->only(['show']);
    //EXCEPT INDICA LAS RUTAS QUE UNICAMENTE NO SE VAN A MOSTRAR
    // Route::resource('category', CategoryController::class)->except(['show']);

    Route::resource([
        'post'=> PostController::class,
        'category'=> CategoryController::class,
    ]);
});



//CREAMOS UNA RUTA DE TIPO RECURSO 
// Route::resource('post', PostController::class);
// Route::resource('category', CategoryController::class );

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