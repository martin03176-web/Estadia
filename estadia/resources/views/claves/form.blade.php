@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Registro de claves')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Registro de Claves</h1>
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

        <form method="POST" action="{{ $clave->exists ? route('claves.update', $clave) : route('claves.store') }}" class="login-form">
            @csrf
            @if($clave->exists) @method('PUT') @endif
             <!-- Name/Nombre -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-explosion"></i> Nueva Clave
                </label>
                <input type="text" id="clave" name="clave" value="{{ old('clave', $clave->clave) }}"
                       placeholder="Ingrese el Nuevo Riesgo " required autofocus autocomplete="clave">
                       @error('clave')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $clave->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')

    
@endsection
 