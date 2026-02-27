@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/registros.css')}}">    
@endsection

@section('titulo','Tabla de Fumigaciones')
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
            <h1>Tablas de Fumigación</h1>
        </div>

        <div class="form-group">
            <!-- On tables -->
            <table class="table">
                <thead>
                    
                  <tr class="table-active">
                    <th scope="col">Reaponsable de quien recibe el servicio</th>
                    <th scope="col">Área</th>
                    <th scope="col">Titular de la dependencia</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Equipo de fumigación</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-danger">
                    <th scope="row">Edificio F</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr>
                    <th scope="row">Dra.Elizabeth Margarita Hernández López</th>
                    <td>Edificio F Planta Baja</td>
                    <td>Dra.Elizabeth Margarita Hernández López</td>
                    <td>J</td>
                    <td>x</td>
                    <td>Fumigacion con mochila</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Dra.Elizabeth Margarita Hernández López</th>
                    <td>Edificio F Planta Baja</td>
                    <td>Dra.Elizabeth Margarita Hernández López</td>
                    <td>J</td>
                    <td>x</td>
                    <td>Fumigacion con mochila</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                    
                  </tr>
                  <tr class="table-success">
                    <th scope="row">Edificio A</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr>
                    <th scope="row">Dra.Elizabeth Margarita Hernández López</th>
                    <td>Edificio F Planta Baja</td>
                    <td>Dra.Elizabeth Margarita Hernández López</td>
                    <td>J</td>
                    <td>x</td>
                    <td>Fumigacion con mochila</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                  </tr>
                  <tr class="table-warning">
                    <th scope="row">Edificio F1</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr>
                    <th scope="row">Dra.Elizabeth Margarita Hernández López</th>
                    <td>Edificio F Planta Baja</td>
                    <td>Dra.Elizabeth Margarita Hernández López</td>
                    <td>J</td>
                    <td>x</td>
                    <td>Fumigacion con mochila</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                  </tr>
                  <tr>
                    <th scope="row">Dra.Elizabeth Margarita Hernández López</th>
                    <td>Edificio F Planta Baja</td>
                    <td>Dra.Elizabeth Margarita Hernández López</td>
                    <td>J</td>
                    <td>x</td>
                    <td>Fumigacion con mochila</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
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
 