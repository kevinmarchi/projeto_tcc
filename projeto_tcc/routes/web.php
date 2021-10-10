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

    Route::get('/contato/{iTipo}/{iCodigo}', [\App\Http\Controllers\ContatoController::class, 'index'])->name('contato');
    Route::get('/contato/create/{iTipo}/{iCodigo}', [\App\Http\Controllers\ContatoController::class, 'create'])->name('contato/create');
    Route::post('/contato/store/{iTipo}/{iCodigo}', [\App\Http\Controllers\ContatoController::class, 'store'])->name('contato/store');
    Route::get('/contato/{iCodigoContato}/edit/{iTipo}/{iCodigo}', [\App\Http\Controllers\ContatoController::class, 'edit'])->name('contato/edit');
    Route::put('/contato/update/{iCodigoContato}/{iTipo}/{iCodigo}', [\App\Http\Controllers\ContatoController::class, 'update'])->name('contato/update');
    Route::delete('/contato/destroy/{iCodigoContato}/{iTipo}/{iCodigo}', [\App\Http\Controllers\ContatoController::class, 'destroy'])->name('contato/destroy');

    Route::get('/consultoriohorario/{iCodigo}', [\App\Http\Controllers\ConsultorioHorarioController::class, 'index'])->name('consultoriohorario');
    Route::get('/consultoriohorario/create/{iCodigo}', [\App\Http\Controllers\ConsultorioHorarioController::class, 'create'])->name('consultoriohorario/create');
    Route::post('/consultoriohorario/store/{iCodigo}', [\App\Http\Controllers\ConsultorioHorarioController::class, 'store'])->name('consultoriohorario/store');
    Route::get('/consultoriohorario/{iCodigoConsultorioHorario}/edit/{iCodigo}', [\App\Http\Controllers\ConsultorioHorarioController::class, 'edit'])->name('consultoriohorario/edit');
    Route::put('/consultoriohorario/update/{iCodigoConsultorioHorario}/{iCodigo}', [\App\Http\Controllers\ConsultorioHorarioController::class, 'update'])->name('consultoriohorario/update');
    Route::delete('/consultoriohorario/destroy/{iCodigoConsultorioHorario}/{iCodigo}', [\App\Http\Controllers\ConsultorioHorarioController::class, 'destroy'])->name('consultoriohorario/destroy');

    Route::resource('consultorio', \App\Http\Controllers\ConsultorioController::class);
    Route::resource('endereco', \App\Http\Controllers\EnderecoController::class);
    Route::resource('especialidade', \App\Http\Controllers\EspecialidadeController::class);
    Route::resource('medicoespecialidade', \App\Http\Controllers\MedicoEspecialidadeController::class);
});
