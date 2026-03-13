@extends('layouts.template')

@section('estilos')
    
@endsection

@section('titulo','Lista de pacientes')



@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        @if(session('message'))
            <div class="alert alert-secondary my-2">{{ session('message') }}</div>
        @endif
        
        <div class="logo-text">
            <h1>Lista de Pacientes</h1>
            <a href="{{ route('pacientes.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Paciente</a>
        </div>
        
        <div class="form-group">
            <!-- Botón para nuevo paciente (comentado) -->
            {{-- <a href="{{ route('pacientes.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Paciente</a> --}}
           
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th scope="col">Nombre</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Código</th>
                        <th scope="col">Carrera o Área</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                        
                            <tr >
                                <td>{{$paciente->nombre}}</td>
                                <td>{{$paciente->sexo}}</td>
                                <td>{{$paciente->telefono}}</td>
                                <td>{{$paciente->codigo}}</td>
                                <td>{{$paciente->carrera_area}}</td>
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

@endsection