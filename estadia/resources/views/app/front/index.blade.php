@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/portalS.css')}}">
@endsection

@section('titulo','Inicio')

@section('contenido')


 <!-- Hero Section -->
 <section class="hero">
    <div class="container">
        <p>
            <br>
            <br>
        </p>
        <div class="hero-buttons" ></div>
        <div class="hero-buttons">
            <a href="{{ route('login') }}" class="btn btn-login">
                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
            </a>
            
            <a href="{{ route('register') }}"  class="btn btn-register">
                <i class="fas fa-user-plus"></i> Registrarse
                </a>
        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection
 