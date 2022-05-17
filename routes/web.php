<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
//REFERENCIANDO AL CONTROLADOR
//opcion 1
//Route::get('/', [TestController::class, 'test']);
//opcion 2
//Route::get('/', [App\Http\Controllers\TestController::class, 'test']);

Route::get('/', [TController::class, 'index']);