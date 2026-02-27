@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/registros.css')}}">    
@endsection

@section('titulo','Tabla de Mantenimientos')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper">
        <div class="logo-text">
            <h1>Tabla de Mantenimientos</h1>
        </div>

        <div class="form-group">
            <!-- On tables -->
            <table class="table">
                <thead>
                  <tr class="table-active">
                    <th scope="col">Clave y numeracion del extintor</th>
                    <th scope="col">Tipo de mantenimiento</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">A-1</th>
                    <td>Interno</td>
                    <td>01/07/2022</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nuevo</a></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">F-1</th>
                    <td>Relleno</td>
                    <td>01/07/2022</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nuevo</a></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">C-1</th>
                    <td>Interno</td>
                    <td>01/07/2022</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nuevo</a></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">D-1</th>
                    <td>Interno</td>
                    <td>01/07/2022</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nuevo</a></td>
                    
                  </tr>
                </tbody>
              </table>
    </div>
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

        
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menú móvil
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');
        
        mobileMenuBtn.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            mobileMenuBtn.innerHTML = mainNav.classList.contains('active') 
                ? '<i class="fas fa-times"></i>' 
                : '<i class="fas fa-bars"></i>';
        });
        
        // Cerrar menú al hacer clic en un enlace
        const navLinks = document.querySelectorAll('.nav-link, .submenu-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 900) {
                    mainNav.classList.remove('active');
                    mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                }
            });
        });
    });
</script>
    
@endsection
 