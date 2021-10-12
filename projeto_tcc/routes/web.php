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
    Route::resource('medicoconsultorio', \App\Http\Controllers\MedicoConsultorioController::class);
    Route::resource('calendario', \App\Http\Controllers\CalendarioController::class);

    Route::get('/usuariomedicoconsultorio/{iCodigo}', [\App\Http\Controllers\UsuarioMedicoConsultorioController::class, 'index'])->name('usuariomedicoconsultorio');
    Route::get('/usuariomedicoconsultorio/create/{iCodigo}', [\App\Http\Controllers\UsuarioMedicoConsultorioController::class, 'create'])->name('usuariomedicoconsultorio/create');
    Route::post('/usuariomedicoconsultorio/store/{iCodigo}', [\App\Http\Controllers\UsuarioMedicoConsultorioController::class, 'store'])->name('usuariomedicoconsultorio/store');
    Route::delete('/usuariomedicoconsultorio/destroy/{iCodigoUsuarioMedicoConsultorio}/{iCodigo}', [\App\Http\Controllers\UsuarioMedicoConsultorioController::class, 'destroy'])->name('usuariomedicoconsultorio/destroy');

    Route::get('/agenda/{iCodigo}', [\App\Http\Controllers\AgendaController::class, 'index'])->name('agenda');
    Route::get('/agenda/create/{iCodigo}', [\App\Http\Controllers\AgendaController::class, 'create'])->name('agenda/create');
    Route::post('/agenda/store/{iCodigo}', [\App\Http\Controllers\AgendaController::class, 'store'])->name('agenda/store');
    Route::get('/agenda/{iCodigoAgenda}/edit/{iCodigo}', [\App\Http\Controllers\AgendaController::class, 'edit'])->name('agenda/edit');
    Route::put('/agenda/update/{iCodigoAgenda}/{iCodigo}', [\App\Http\Controllers\AgendaController::class, 'update'])->name('agenda/update');
    Route::delete('/agenda/destroy/{iCodigoAgenda}/{iCodigo}', [\App\Http\Controllers\AgendaController::class, 'destroy'])->name('agenda/destroy');

    Route::get('/agendahorario/{iCodigo}', [\App\Http\Controllers\AgendaHorarioController::class, 'index'])->name('agendahorario');
    Route::get('/agendahorario/create/{iCodigo}', [\App\Http\Controllers\AgendaHorarioController::class, 'create'])->name('agendahorario/create');
    Route::post('/agendahorario/store/{iCodigo}', [\App\Http\Controllers\AgendaHorarioController::class, 'store'])->name('agendahorario/store');
    Route::get('/agendahorario/{iCodigoAgendaHorario}/edit/{iCodigo}', [\App\Http\Controllers\AgendaHorarioController::class, 'edit'])->name('agendahorario/edit');
    Route::put('/agendahorario/update/{iCodigoAgendaHorario}/{iCodigo}', [\App\Http\Controllers\AgendaHorarioController::class, 'update'])->name('agendahorario/update');
    Route::delete('/agendahorario/destroy/{iCodigoAgendaHorario}/{iCodigo}', [\App\Http\Controllers\AgendaHorarioController::class, 'destroy'])->name('agendahorario/destroy');

    Route::get('/calendarioitem/{iCodigo}', [\App\Http\Controllers\CalendarioItemController::class, 'index'])->name('calendarioitem');
    Route::get('/calendarioitem/create/{iCodigo}', [\App\Http\Controllers\CalendarioItemController::class, 'create'])->name('calendarioitem/create');
    Route::post('/calendarioitem/store/{iCodigo}', [\App\Http\Controllers\CalendarioItemController::class, 'store'])->name('calendarioitem/store');
    Route::delete('/calendarioitem/destroy/{iCodigoCalendarioItem}/{iCodigo}', [\App\Http\Controllers\CalendarioItemController::class, 'destroy'])->name('calendarioitem/destroy');
});
