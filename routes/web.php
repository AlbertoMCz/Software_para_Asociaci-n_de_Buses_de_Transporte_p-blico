<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SancionController;
use App\Http\Controllers\Tipo_asignacionController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\MicroController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'sancion'],function(){
    Route::get('/',[SancionController::class,'index'])->name('sancion.index');
    Route::get('/create',[SancionController::class,'create'])->name('sancion.create');
    Route::post('/',[SancionController::class,'store'])->name('sancion.store');
    Route::get('/edit/{id}',[SancionController::class,'edit'])->name('sancion.edit');
    Route::put('/{id}', [SancionController::class, 'update'])->name('sancion.update');
    Route::get('/{id}',[SancionController::class, 'destroy'])->name('sancion.destroy');
});
Route::group(['prefix'=>'tipoAsignacion'],function(){
    Route::get('/',[Tipo_asignacionController::class,'index'])->name('tipoAsignacion.index');
    Route::get('/create',[Tipo_asignacionController::class,'create'])->name('tipoAsignacion.create');
    Route::post('/',[Tipo_asignacionController::class,'store'])->name('tipoAsignacion.store');
    Route::get('/edit/{id}',[Tipo_asignacionController::class,'edit'])->name('tipoAsignacion.edit');
    Route::put('/{id}', [Tipo_asignacionController::class, 'update'])->name('tipoAsignacion.update');
    Route::get('/{id}',[Tipo_asignacionController::class, 'destroy'])->name('tipoAsignacion.destroy');
});

Route::resource('persona', PersonaController::class);
Route::resource('micro', MicroController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
