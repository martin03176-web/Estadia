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
                  @foreach($mantenimientos as $mant)
                  <tr>
                    <th scope="row">{{ $mant->extintor->clave->clave ?? 'N/A' }}/{{$mant->extintor->numeracion ?? 'N/A' }}</th>
                    <td>{{ $mant->tipo }}</td>
                    <td>{{ \Carbon\Carbon::parse($mant->fecha)->format('d/m/Y') }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('mantenimientos.show', $mant->id) }}" class="btn btn-sm btn-info text-white"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('mantenimientos.edit', $mant->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('mantenimientos.destroy', $mant->id) }}" method="POST" onsubmit="return confirm('¿Eliminar registro?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
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
 