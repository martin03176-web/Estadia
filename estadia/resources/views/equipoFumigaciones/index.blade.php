@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Tabla equipos de fumigación')
 

 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-S">
        <div class="logo-text">
            <h1>Tabla Equipos de Fumigación</h1>
            <a href="{{ route('equipoFumigaciones.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Equipo de Fumigación</a>
        </div>

        <div class="form-group">
            <!-- On tables -->
            <table class="table">
                <thead>
                  <tr class="table-active">
                    <th scope="col">Nombre del equipo de fumigación</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                @forEach($equipoFumigaciones as $equipoFumigacion)
                <tbody>
                  <tr>
                    <th scope="row">{{$equipoFumigacion->nombre}}</th>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                    @endforeach
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
 