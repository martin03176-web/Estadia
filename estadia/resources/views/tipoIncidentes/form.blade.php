@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaM.css')}}">    
@endsection

@section('titulo','Registro de tipos de incidencias')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper">
        <div class="logo-text">
            <h1>Registro de Tipos de Incidentes</h1>
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

        <form method="POST" action="{{ $tipoIncidente->exists ? route('tipoIncidentes.update', $tipoIncidente) : route('tipoIncidentes.store') }}" class="login-form">
            @csrf
            @if($tipoIncidente->exists) @method('PUT') @endif
             <!-- Name/Nombre -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-person-falling-burst"></i> Nuevo Tipo de Incidente
                </label>
                <input type="text" id="tipo" name="tipo" value="{{ old('tipo', $tipoIncidente->tipo) }}"
                       placeholder="Ingrese el Nuevo Tipo " required autofocus autocomplete="tipo">
                       @error('tipo')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-login">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $tipoIncidente->exists ? 'Actualizar' : 'Registrar'}}
                </x-primary-button>
                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> --}}
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')

    
@endsection
 