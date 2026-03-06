@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Registro de tipos de riesgos')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Registro de Tipos de Riesgos</h1>
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

        <form method="POST" action="{{ $tipoRiesgo->exists ? route('tipoRiesgos.update', $tipoRiesgo) : route('tipoRiesgos.store') }}" class="login-form">
            @csrf
            @if($tipoRiesgo->exists) @method('PUT') @endif
             <!-- Name/Nombre -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-explosion"></i> Nuevo Tipo de Riesgo
                </label>
                <input type="text" id="tipo" name="tipo" value="{{ old('tipoRiesgo', $tipoRiesgo->tipo) }}"
                       placeholder="Ingrese el Nuevo Riesgo " required autofocus autocomplete="tipo">
                       @error('tipo')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $tipoRiesgo->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')

    
@endsection
 