@extends('layouts.template')

@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaM.css')}}">    
@endsection

@section('titulo','Lista de Pacientes')



@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper">
        @if(session('message'))
            <div class="alert alert-secondary my-2">{{ session('message') }}</div>
        @endif
        
        <div class="logo-text">
            <h1>Lista de Pacientes</h1>
        </div>
        
        <div class="form-group">
            <!-- Botón para nuevo paciente (comentado) -->
            {{-- <a href="{{ route('pacientes.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Paciente</a> --}}
           
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th scope="col">Nombre</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Código</th>
                        <th scope="col">Carrera o Área</th>
                        <th scope="col">Semestre</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                        
                            <tr >
                                <td>{{$paciente->nombre}}</td>
                                <td>{{$paciente->edad}}</td>
                                <td>{{$paciente->sexo}}</td>
                                <td>{{$paciente->telefono}}</td>
                                <td>{{$paciente->codigo}}</td>
                                <td>{{$paciente->carrera_area}}</td>
                                <td>{{$paciente->semestre}}</td>
                                <td>
                                    <a href="{{ route('pacientes.edit', $paciente) }}" type="button" class="btn btn-outline-secondary btn-sm">
                                        <i class="fa-solid fa-circle-up"></i> Actualizar
                                    </a>
                                </td>
                            </tr>
                            
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 justify-content-center">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-login" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif
        </div>
    </div>

    <div id="message" class="message"></div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menú móvil
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');
        
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function() {
                mainNav.classList.toggle('active');
                mobileMenuBtn.innerHTML = mainNav.classList.contains('active') 
                    ? '<i class="fas fa-times"></i>' 
                    : '<i class="fas fa-bars"></i>';
            });
        }
        
        // Cerrar menú al hacer clic en un enlace
        const navLinks = document.querySelectorAll('.nav-link, .submenu-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 900) {
                    mainNav.classList.remove('active');
                    if (mobileMenuBtn) {
                        mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                    }
                }
            });
        });
    });
</script>
@endsection