@extends('layouts.template')

@section('estilos')
<style>
    .table-extintores th {
        background-color: #343a40;
        color: white;
        text-align: center;
        vertical-align: middle;
    }
    .table-extintores td {
        vertical-align: middle;
    }
    .badge-condicion {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
    }
    .badge-nuevo { background-color: #28a745; color: white; }
    .badge-usado { background-color: #17a2b8; color: white; }
    .badge-mantenimiento { background-color: #ffc107; color: black; }
    .badge-danado { background-color: #dc3545; color: white; }
    .btn-accion {
        padding: 5px 10px;
        margin: 0 2px;
    }
</style>
@endsection

@section('titulo','Inventario de Extintores')

@section('contenido')
<section class="hero">
    <div class="login-wrapper-L">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-dark">
                <i class="fa-solid fa-fire-extinguisher text-danger"></i> 
                Inventario de Extintores
            </h1>
            <a href="{{ route('extintores.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Nuevo Extintor
            </a>
        </div>

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-check-circle"></i> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-exclamation-triangle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-extintores mb-0">
                        <thead>
                            <tr class="table-active">
                                <th width="5%">#</th>
                                <th width="10%">Clave</th>
                                <th width="8%">No.</th>
                                <th width="20%">Área / Lugar</th>
                                <th width="12%">Tipo</th>
                                <th width="10%">Peso (kg)</th>
                                <th width="15%">Ubicación</th>
                                <th width="12%">Condición</th>
                                <th width="8%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($extintores as $index => $extintor)
                            <tr>
                                <td class="text-center">{{ $extintores->firstItem() + $index }}</td>
                                <td class="text-center">
                                    <span class="badge bg-dark">{{ $extintor->clave->clave ?? 'N/A' }}</span>
                                </td>
                                <td class="text-center">{{ $extintor->numeracion ?? $extintor->no ?? 'N/A' }}</td>
                                <td>
                                    <strong>{{ $extintor->area->tipo_establecimiento ?? 'N/A' }}</strong><br>
                                    <small class="text-muted">
                                        {{ $extintor->area->nivel ?? '' }} - {{ $extintor->area->lugar_especifico ?? '' }}
                                    </small>
                                </td>
                                <td>{{ $extintor->tipo->tipo ?? 'N/A' }}</td>
                                <td class="text-center">{{ $extintor->peso ?? 'N/A' }} kg</td>
                                <td>
                                    {{ $extintor->ubicacion ?? 'N/A' }}<br>
                                    <small class="text-muted">Ref: {{ $extintor->lugar_referencia ?? 'N/A' }}</small>
                                </td>
                                <td class="text-center">
                                    @php
                                        $condicionClass = '';
                                        switch($extintor->condicion_extintor) {
                                            case 'Nuevo':
                                                $condicionClass = 'badge-nuevo';
                                                break;
                                            case 'Usado':
                                                $condicionClass = 'badge-usado';
                                                break;
                                            case 'Mantenimiento':
                                                $condicionClass = 'badge-mantenimiento';
                                                break;
                                            case 'Dañado':
                                                $condicionClass = 'badge-danado';
                                                break;
                                            default:
                                                $condicionClass = 'badge-secondary';
                                        }
                                    @endphp
                                    <span class="badge-condicion {{ $condicionClass }}">
                                        {{ $extintor->condicion_extintor ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('extintores.show', $extintor->id) }}" class="btn btn-info btn-sm btn-accion" title="Ver">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('extintores.edit', $extintor->id) }}" class="btn btn-warning btn-sm btn-accion" title="Editar">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <form action="{{ route('extintores.destroy', $extintor->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-accion" onclick="return confirm('¿Eliminar este extintor?')" title="Eliminar">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <i class="fa-solid fa-fire-extinguisher fa-3x text-muted mb-3 d-block"></i>
                                    <h5 class="text-muted">No hay extintores registrados</h5>
                                    <a href="{{ route('extintores.create') }}" class="btn btn-primary mt-3">
                                        <i class="fa-solid fa-plus"></i> Registrar primer extintor
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Paginación -->
        @if($extintores->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $extintores->appends(request()->query())->links() }}
        </div>
        @endif

        <!-- Resumen Estadístico -->
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-fire-extinguisher fa-3x mb-2"></i>
                        <h3>{{ $extintores->total() }}</h3>
                        <p class="mb-0">Total Extintores</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-check-circle fa-3x mb-2"></i>
                        <h3>{{ $extintores->where('condicion', 'Nuevo')->count() }}</h3>
                        <p class="mb-0">Nuevos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-dark">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-tools fa-3x mb-2"></i>
                        <h3>{{ $extintores->where('condicion', 'Mantenimiento')->count() }}</h3>
                        <p class="mb-0">En Mantenimiento</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-triangle-exclamation fa-3x mb-2"></i>
                        <h3>{{ $extintores->where('condicion', 'Dañado')->count() }}</h3>
                        <p class="mb-0">Dañados</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Auto cerrar alertas después de 5 segundos
    setTimeout(function() {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
</script>
@endsection