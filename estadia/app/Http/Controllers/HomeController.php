<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('app.front.index');
    }

    public function home(){
        return view('app.front.home');
    }
    public function dashboard(){
        return view('app.back.dashboard');
    }
    public function registro_pacientes(){
        return view('app.back.registro_pacientes');
    }
    public function registro_incidencias(){
        return view('app.back.registro_incidencias');
    }

    public function atencion_paciente(){
        return view('app.back.atencion_paciente');
    }
    public function registro_areas(){
        return view('app.back.registro_areas');
    }
    public function registro_responsables(){
        return view('app.back.registro_responsables');
    }  public function registro_tipo_incidentes(){
        return view('app.back.registro_tipo_incidentes');
    }  public function registro_tipo_riesgos(){
        return view('app.back.registro_tipo_riesgos');
    }  public function registro_nivel_riesgos(){
        return view('app.back.registro_nivel_riesgos');
    }  public function registro_material_equipo(){
        return view('app.back.registro_material_equipo');
    }public function programar_fumigacion(){
        return view('app.back.programar_fumigacion');
    }public function registro_extintores(){
        return view('app.back.registro_extintores');
    }public function tabla_fumigaciones(){
        return view('app.back.tabla_fumigaciones');
    }public function inventario_extintores(){
        return view('app.back.inventario_extintores');
    }public function historial_incidencias(){
        return view('app.back.historial_incidencias');
    }public function lista_atenciones(){
        return view('app.back.lista_atenciones');
    }public function lista_pacientes(){
        return view('app.back.lista_pacientes');
    }public function tabla_areas(){
        return view('app.back.tabla_areas');
    }public function tabla_incidentes(){
        return view('app.back.tabla_incidentes');
    }public function tabla_riesgos(){
        return view('app.back.tabla_riesgos');
    }public function tabla_niveles(){
        return view('app.back.tabla_niveles');
    }public function lista_responsables(){
        return view('app.back.lista_responsables');
    }public function tabla_equipos(){
        return view('app.back.tabla_equipos');
    }public function tabla_materiales(){
        return view('app.back.tabla_materiales');
    }public function tabla_mantenimientos(){
        return view('app.back.tabla_mantenimientos');
    }

}