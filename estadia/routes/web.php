<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AtencionController;


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
    Route::get('/registro_incidencias', [HomeController::class, 'registro_incidencias'])->name('registro_incidencias');
    Route::get('/registro_areas', [HomeController::class,'registro_areas'])->name('registro_areas');
    Route::get('/registro_responsables', [HomeController::class,'registro_responsables'])->name('registro_responsables');
    Route::get('/registro_tipo_incidentes', [HomeController::class,'registro_tipo_incidentes'])->name('registro_tipo_incidentes');
    Route::get('/registro_tipo_riesgos', [HomeController::class,'registro_tipo_riesgos'])->name('registro_tipo_riesgos');
    Route::get('registro_nivel_riesgos', [HomeController::class,'registro_nivel_riesgos'])->name('registro_nivel_riesgos');
    Route::get('/registro_material_equipo', [HomeController::class,'registro_material_equipo'])->name('registro_material_equipo');
    Route::get('/registro_extintores', [HomeController::class,'registro_extintores'])->name('registro_extintores');
    Route::get('/programar_fumigacion', [HomeController::class,'programar_fumigacion'])->name('programar_fumigacion');
    Route::get('/tabla_fumigaciones', [HomeController::class,'tabla_fumigaciones'])->name('tabla_fumigaciones');
    Route::get('/inventario_extintores', [HomeController::class,'inventario_extintores'])->name('inventario_extintores');
    Route::get('/historial_incidencias', [HomeController::class,'historial_incidencias'])->name('historial_incidencias');
    Route::get('/lista_atenciones', [HomeController::class,'lista_atenciones'])->name('lista_atenciones');
    Route::get('/lista_pacientes', [HomeController::class,'lista_pacientes'])->name('lista_pacientes');
    Route::get('/tabla_areas', [HomeController::class,'tabla_areas'])->name('tabla_areas');
    Route::get('/lista_responsables', [HomeController::class,'lista_responsables'])->name('lista_responsables');
    Route::get('/tabla_incidentes', [HomeController::class,'tabla_incidentes'])->name('tabla_incidentes');
    Route::get('/tabla_riesgos', [HomeController::class,'tabla_riesgos'])->name('tabla_riesgos');
    Route::get('/tabla_niveles', [HomeController::class,'tabla_niveles'])->name('tabla_niveles');
    Route::get('/tabla_equipos', [HomeController::class,'tabla_equipos'])->name('tabla_equipos');
    Route::get('/tabla_materiales', [HomeController::class,'tabla_materiales'])->name('tabla_materiales');
    Route::get('/tabla_mantenimientos', [HomeController::class,'tabla_mantenimientos'])->name('tabla_mantenimientos');
    Route::resource('pacientes', PacienteController::class);
    Route::resource('atencions', AtencionController::class);
});

require __DIR__.'/auth.php';
