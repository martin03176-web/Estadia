<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AtencionController;
use App\Http\Controllers\ClaveController;
use App\Http\Controllers\EquipoFumigacionController;
use App\Http\Controllers\ExtintorController;
use App\Http\Controllers\FumigacionController;
use App\Http\Controllers\FumigacionPeriodoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncidenteController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\MaterialEquipoController;
use App\Http\Controllers\MotivoController;
use App\Http\Controllers\NivelRiesgoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\TipoIncidenteController;
use App\Http\Controllers\TipoRiesgoController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', [HomeController::class,'index'])->name('home');
//Route::view('/','welcome');

// Route::get('/home', [HomeController::class,'home']); 

Route::get('/dashboard',[HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('incidentes', IncidenteController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('responsables', ResponsableController::class);
    Route::resource('tipoIncidentes', TipoIncidenteController::class);
    Route::resource('tipoRiesgos', TipoRiesgoController::class);
    Route::resource('nivelRiesgos', NivelRiesgoController::class);
    Route::resource('materialEquipos', MaterialEquipoController::class);
    Route::resource('pacientes', PacienteController::class);
    Route::resource('atenciones', AtencionController::class);
    Route::resource('equipoFumigaciones', EquipoFumigacionController::class);
    Route::resource('fumigaciones', FumigacionController::class);
    Route::resource('claves', ClaveController::class);
    Route::resource('tipos', TipoController::class);
    Route::resource('extintores', ExtintorController::class);
    Route::resource('mantenimientos', MantenimientoController::class);
    Route::resource('motivos', MotivoController::class);

    
    Route::resource('periodos', FumigacionPeriodoController::class)->names([
      'index' => 'fumigaciones.periodos.index',
      'create' => 'fumigaciones.periodos.create',
      'store' => 'fumigaciones.periodos.store',
      'show' => 'fumigaciones.periodos.show',
      'edit' => 'fumigaciones.periodos.edit',
      'update' => 'fumigaciones.periodos.update',
      'destroy' => 'fumigaciones.periodos.destroy',
    ]);
    Route::get('periodos/{periodo}/generar', [FumigacionPeriodoController::class, 'generarFumigaciones'])->name('fumigaciones.periodos.generar');

});

require __DIR__.'/auth.php';
