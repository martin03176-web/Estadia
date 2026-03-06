@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Tabla materiales o equipos')
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
            <h1>Tabla Materiales o Equipos</h1>
            <a href="{{ route('materialEquipos.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Material o Equipo</a>
        </div>

        <div class="form-group">
            <!-- On tables -->
            <table class="table">
                <thead>
                  <tr class="table-active">
                    <th scope="col">Nombre del equipo de fumigación</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                @foreach ($materialEquipos as $materialEquipo)
                <tbody>
                  
                  <tr>
                    <th scope="row">{{ $materialEquipo->nombre }}</th>
                    <td>{{ $materialEquipo->nota }}</td>
                    <td><a href="{{ route('materialEquipos.edit', $materialEquipo) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                  </tr>
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
 