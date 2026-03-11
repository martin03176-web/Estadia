@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Registro de equipos de fumigación')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Registro de Materiales o Equipos de Fumigación </h1>
        </div>
        <div class="row ">
            <div class="col-md-6 justify-content-center" >
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-login" date-bs-dismiss="alert" ariel-label="Cerrar"></button>
                    
                @endif
            </div>
        </div>

        <form method="POST" action="{{ $equipoFumigacion->exists ? route('equipoFumigaciones.update', $equipoFumigacion) : route('equipoFumigaciones.store') }}" class="login-form">
            @csrf
            @if($equipoFumigacion->exists) @method('PUT') @endif
             <!-- Name/Nombre -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-toolbox"></i> Nombre
                </label>
                <input type="text" id="nombre" name="nombre" value="{{ old('equipoFumigacion', $equipoFumigacion->nombre) }}"
                       placeholder="Ingrese el Nuevo Equipo " required autofocus autocomplete="nombre">
                       @error('nombre')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $equipoFumigacion->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')

    
@endsection
 