@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Tabla de áreas')

@section('contenido')
 <!-- Hero Section -->
    <section class="hero">
        <div class="login-wrapper-M">
            <div class="logo-text">
                <h1>Tabla de Áreas</h1>
                  
             <a href="{{ route('areas.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nueva Área</a>
          
            </div>

            <div class="form-group">
                <!-- On tables -->
                <table class="table">
                    <thead>
                    <tr class="table-active">
                        <th scope="col">Tipo de establecimiento</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Lugar especifico</th>
                        <th scope="col">Nota</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($areas as $area)
                            <tr>
                                <th scope="row">{{$area->tipo_establecimiento}}</th>
                                <td>{{$area->nivel}}</td>
                                <td>{{$area->lugar_especifico}}</td>
                                <td>{{$area->nota}}</td>
                                <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
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
 