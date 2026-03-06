@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Registro de niveles de riesgos')
 

 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Registro de Niveles de Riesgos</h1>
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

        <form method="POST" action="{{ $nivelRiesgo->exists ? route('nivelRiesgos.update', $nivelRiesgo) : route('nivelRiesgos.store') }}" class="login-form">
            @csrf
            @if($nivelRiesgo->exists) @method('PUT') @endif
             <!-- Name/Nombre -->
            <div class="form-group">
                <label>
                    <i class="fa-solid fa-skull-crossbones"></i> Nuevo Nivel de Riesgo
                </label>
                <input type="text" id="nivel" name="nivel" value="{{ old('nivel', $nivelRiesgo->nivel) }}"
                       placeholder="Ingrese el Nuevo Nivel " required autofocus autocomplete="nivel">
                       @error('nivel')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $nivelRiesgo->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')

@endsection
 