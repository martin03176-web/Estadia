@extends('layouts.template')

@section('titulo', 'Gestión de Periodos de Fumigación')

@section('contenido')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fa-solid fa-calendar-alt"></i> Periodos de Fumigación</h1>
        <a href="{{ route('fumigaciones.periodos.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Nuevo Periodo
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Año</th>
                            <th>Temporada</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Estado</th>
                            <th>Fumigaciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($periodos as $periodo)
                        <tr>
                            <td>{{ $periodo->id }}</td>
                            <td>{{ $periodo->anio }}</td>
                            <td>
                                <span class="badge bg-{{ $periodo->temporada == 'primavera' ? 'success' : ($periodo->temporada == 'verano' ? 'danger' : ($periodo->temporada == 'otoño' ? 'warning' : 'info')) }}">
                                    {{ $periodo->temporada_nombre }}
                                </span>
                            </td>
                            <td>{{ $periodo->fecha_inicio ? date('d/m/Y', strtotime($periodo->fecha_inicio)) : 'No definida' }}</td>
                            <td>{{ $periodo->fecha_fin ? date('d/m/Y', strtotime($periodo->fecha_fin)) : 'No definida' }}</td>
                            <td>
                                @if($periodo->activo)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ $periodo->fumigaciones->count() }}</span>
                            </td>
                            <td>
                                <a href="{{ route('fumigaciones.periodos.show', $periodo) }}" class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('fumigaciones.periodos.edit', $periodo) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                @if($periodo->fumigaciones->count() == 0)
                                    <form action="{{ route('fumigaciones.periodos.destroy', $periodo) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este periodo?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                                @if($periodo->fumigaciones->count() == 0)
                                    <a href="{{ route('fumigaciones.periodos.generar', $periodo) }}" class="btn btn-primary btn-sm" onclick="return confirm('¿Generar fumigaciones para este periodo?')">
                                        <i class="fa-solid fa-cogs"></i> Generar
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay periodos registrados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                {{ $periodos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection