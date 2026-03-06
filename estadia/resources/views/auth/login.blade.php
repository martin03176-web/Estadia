@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/log.css')}}">    
@endsection

@section('titulo','Iniciar Sesión')

@section('contenido')
    <section class="hero">
        <div class="login-wrapper">
            <div class="logo-text">
                <h1>Inicio de Sesión</h1>
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
    
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <!-- Email Address/Correo Electronico -->
                <div class="form-group">
                    <label for="email" :value="__('Email')">
                        <i class="fas fa-user"></i> Correo Electrónico 
                    </label>
                    <input type="text" id="email" name="email" :value=" {{ old('email') }}"
                           placeholder="Ingrese su usuario" required autofocus autocomplete="username">
                           @error('email')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                          
                </div>
                <!-- Contrasea/Pass -->
                <div class="form-group">
                    <label for="password" :value="__('Password')">
                        <i class="fas fa-lock"></i> Contraseña
                    </label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password"
                               placeholder="Ingrese su contraseña" required autocomplete="current-password">

                               @error('password')
                               <div class="alert alert-damager mt-2">{{ $message}}</div>      
                               @enderror
                        {{-- <button type="button" id="togglePassword" class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </button> --}}
                    </div>
                </div>
                <!-- Servicios -->
                <div class="form-options">
                    <label class="checkbox" for="remember_me" name="remember">
                        <input type="checkbox" id="remember_me">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="forgot-link">¿Olvidó su contraseña?</a>
                </div>
                <!-- Boton de acceso -->
                <x-primary-button class="btn btn-solid-red">
                    <i class="fas fa-sign-in-alt"></i> {{ __('Log in') }}
                </x-primary-button>
                
            </form>
            
            <div id="message" class="message"></div>
        </div>
    </section>

        
    
@endsection
@section('scripts')

@endsection