<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AtencionController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\MaterialEquipoController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\TipoIncidenteController;
use App\Http\Controllers\TipoRiesgoController;
use App\Http\Controllers\NivelRiesgoController;
use App\Http\Controllers\IncidenteController;


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
    Route::resource('atencions', AtencionController::class);
});

require __DIR__.'/auth.php';
