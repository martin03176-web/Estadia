@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Registros de motivos')
 

 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Registro de Motivos</h1>
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

        <form method="POST" action="{{ $motivo->exists ? route('motivos.update', $motivo) : route('motivos.store') }}" class="login-form">
            @csrf
            @if($motivo->exists) @method('PUT') @endif
             <!-- Name/Nombre -->
            <div class="form-group">
                <label>
                    <i class="fa-solid fa-pen-clip"></i> Nuevo Motivo
                </label>
                <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion', $motivo->descripcion) }}"
                       placeholder="Ingrese el Motivo... " required autofocus autocomplete="descripcion">
                       @error('descripcion')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $motivo->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')
@endsection
 