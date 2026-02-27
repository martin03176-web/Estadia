@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaL.css')}}">    
@endsection

@section('titulo','Historial de Incidencias')
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
            <h1>Historial de Incidencias</h1>
        </div>

        <div class="form-group">
            <!-- On tables -->
            <table class="table">
                <thead>
                  <tr class="table-active">
                    <th scope="col">Asunto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Lugar del incidente</th>
                    <th scope="col">Tipo de incidente</th>
                    <th scope="col">Tipo de riesgo</th>
                    <th scope="col">Nivel de riesgo</th>
                    <th scope="col">Descripción del incidente</th>
                    <th></th>
                  </tr>
                </thead>
                @foreach ($incidentes as $incidente)
                <tbody>
                  <tr>
                    <th scope="row">{{$incidente->asunto}}</th>
                    <td>{{ $incidente->fecha }}</td>
                    <td>{{$incidente->area->edificio}}{{$incidente->area->piso}}{{$incidente->area->lugar}}</td>
                    <td>{{$incidente->tipoIncidente->tipo}}</td>
                    <td>{{$incidente->tipoRiesgo->tipo}}</td>
                    <td>{{$incidente->nivelRiesgo->nivel}}</td>
                    <td>{{$incidente->descripcion}}</td>
                    <td><a href="{{ route('incidentes.edit', $incidente) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
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
 