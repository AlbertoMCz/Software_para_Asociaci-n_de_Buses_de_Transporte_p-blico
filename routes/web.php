<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SancionController;

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
});