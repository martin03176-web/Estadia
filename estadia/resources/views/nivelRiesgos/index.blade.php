@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Tabla niveles de riesgos')
 

 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-S">
        <div class="logo-text">
            <h1>Tabla Niveles de Riesgos</h1>
            <a href="{{ route('nivelRiesgos.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Nivel de Riesgo</a>
        </div>

        <div class="form-group">
            <!-- On tables -->
            <table class="table">
                <thead>
                  <tr class="table-active">
                    <th scope="col">Nivel de riesgo</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                @foreach ($nivelRiesgos as $nivelRiesgo)
                <tbody>
                  <tr>
                    <td>{{ $nivelRiesgo->nivel }}</td>
                    <td><a href="{{ route('nivelRiesgos.edit', $nivelRiesgo) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
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
 