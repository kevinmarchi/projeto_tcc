<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(array('middleware' => 'auth'), function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/estado',[\App\Http\Controllers\EstadoController::class, 'index'])->name('estado');
    Route::get('/cidade',[\App\Http\Controllers\CidadeController::class, 'index'])->name('cidade');
    Route::resource('contato', \App\Http\Controllers\ContatoController::class);
    Route::resource('consultorio', \App\Http\Controllers\ConsultorioController::class);
});
