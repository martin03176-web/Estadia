@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Registro de materiales o equipos')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Registro de Materiales o Equipos</h1>
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

        <form method="POST" action="{{ $materialEquipo->exists ? route('materialEquipos.update', $materialEquipo) : route('materialEquipos.store') }}" class="login-form">
            @csrf
            @if($materialEquipo->exists) @method('PUT') @endif
             <!-- Name/Nombre -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-toolbox"></i> Nombre del Material o Equipo
                </label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $materialEquipo->nombre) }}"
                       placeholder="Ingrese el Nuevo Material o Equipo " required autofocus autocomplete="nombre">
                       @error('nombre')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            <div class="form-group">
                <label >
                    <i class="fa-regular fa-message"></i> Nota 
                </label>
                <input type="text" id="nota" name="nota" value="{{ old('nota', $materialEquipo->nota) }}"
                       placeholder="Ingrese una Nota" required autofocus autocomplete="nota">
                       @error('nota')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $materialEquipo->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')
    
@endsection
 