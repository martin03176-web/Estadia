@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Tabla de mantenimientos')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Tabla de Mantenimientos</h1>
            <a href="{{ route('mantenimientos.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Mantenimiento</a>
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

    
@endsection
 