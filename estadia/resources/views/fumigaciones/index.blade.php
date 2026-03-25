@extends('layouts.template')

@section('estilos')
<style>
    .card-fumigacion {
        margin-bottom: 2rem;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .card-header-programada {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 1rem;
    }
    .card-header-extemporanea {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
        padding: 1rem;
    }
    .badge-programada {
        background-color: #28a745;
    }
    .badge-extemporanea {
        background-color: #dc3545;
    }
    .table-fumigaciones th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    .btn-gestion-periodos {
        background: linear-gradient(135deg, #6c757d, #495057);
        color: white;
        transition: transform 0.2s;
    }
    .btn-gestion-periodos:hover {
        transform: translateY(-2px);
        color: white;
    }
</style>
@endsection

@section('titulo','Calendario de Fumigaciones')

@section('contenido')
<section class="hero">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 ">
            <h1 class="text-dark"><i class="fa-solid fa-calendar-alt text-dark"></i> Calendario de Fumigaciones</h1>
            <div>
                <a href="{{ route('fumigaciones.create', ['tipo' => 'programada']) }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Nueva Programada
                </a>
                <a href="{{ route('fumigaciones.create', ['tipo' => 'extemporanea']) }}" class="btn btn-danger">
                    <i class="fa-solid fa-bug"></i> Nueva Extemporánea
                </a>
            </div>
        </div>

        <!-- Gestión de Periodos - Apartado 11 -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0"><i class="fa-solid fa-calendar-plus"></i> Gestión de Periodos</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <a href="{{ route('fumigaciones.periodos.create') }}" class="btn btn-success w-100 py-3">
                            <i class="fa-solid fa-plus-circle fa-lg"></i> 
                            <span class="ms-2">Crear Nuevo Periodo</span>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('fumigaciones.periodos.index') }}" class="btn btn-info w-100 py-3 btn-gestion-periodos">
                            <i class="fa-solid fa-list-ul fa-lg"></i> 
                            <span class="ms-2">Ver Todos los Periodos</span>
                        </a>
                    </div>
                </div>
                <div class="alert alert-info mt-3 mb-0">
                    <i class="fa-solid fa-info-circle"></i> 
                    <strong>¿Cómo funciona?</strong> Primero crea un periodo (ej: 2025 - Primavera), luego podrás generar automáticamente las fumigaciones programadas para todas las áreas.
                </div>
            </div>
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

        <!-- Fumigaciones Programadas -->
        <h2 class="mb-3 mt-4 text-dark">
            <i class="fa-solid fa-calendar-check text-success"></i> 
            Fumigaciones Programadas
        </h2>
        
        @forelse($periodos as $periodo)
            <div class="card card-fumigacion">
                <div class="card-header-programada">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fa-solid fa-calendar-week"></i> 
                            {{ $periodo->anio }} - {{ ucfirst($periodo->temporada) }}
                            <span class="badge bg-light text-dark ms-2">{{ $periodo->fumigaciones->count() }} registros</span>
                        </h4>
                        <a href="{{ route('fumigaciones.periodos.show', $periodo) }}" class="btn btn-light btn-sm">
                            <i class="fa-solid fa-eye"></i> Ver Detalles
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($periodo->fumigaciones->isEmpty())
                        <div class="alert alert-warning m-3">
                            <i class="fa-solid fa-exclamation-triangle"></i> 
                            No hay fumigaciones generadas para este periodo.
                            <a href="{{ route('fumigaciones.periodos.generar', $periodo) }}" class="btn btn-primary btn-sm ms-3" onclick="return confirm('¿Generar fumigaciones para el periodo {{ $periodo->anio }} - {{ ucfirst($periodo->temporada) }}?')">
                                <i class="fa-solid fa-cogs"></i> Generar Fumigaciones
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th><i class="fa-solid fa-building"></i> Área</th>
                                        <th><i class="fa-regular fa-calendar"></i> Fecha</th>
                                        <th><i class="fa-regular fa-clock"></i> Horario</th>
                                        <th><i class="fa-solid fa-book"></i> Motivo</th>
                                        <th><i class="fa-solid fa-user"></i> Responsable</th>
                                        <th><i class="fa-solid fa-toolbox"></i> Equipo</th>
                                        <th><i class="fa-solid fa-gear"></i> Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($periodo->fumigaciones as $fum)
                                        <tr>
                                            <td>
                                                <small class="text-muted">ID: {{ $fum->id }}</small>
                                                <strong>{{ $fum->area->tipo_establecimiento ?? 'N/A' }}</strong><br>
                                                <small class="text-muted">{{ $fum->area->nivel ?? 'N/A' }} - {{ $fum->area->lugar_especifico ?? 'N/A' }}</small>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($fum->fecha)->format('d/m/Y') }}</td>
                                            <td>{{ $fum->hora ?? 'N/A' }}</td>
                                            <td>{{ $fum->motivo->descripcion ?? 'N/A' }}</td>
                                            <td>{{ $fum->responsableServicio->nombre ?? 'N/A' }}</td>
                                            <td>{{ $fum->equipoFumigacion->nombre ?? 'N/A' }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('fumigaciones.show', $fum->id) }}" class="btn btn-info btn-sm" title="Ver">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                   
                                                    <a href="{{ route('fumigaciones.edit', ['fumigacione' => $fum->id]) }}" class="btn btn-warning btn-sm" title="Editar">
                                                        <i class="fa-solid fa-edit"></i> Editar
                                                    </a>
                                                    @if($fum->tipo == 'extemporanea')
                                                        <form action="{{ route('fumigaciones.destroy', $fum->id) }}" method="POST" class="d-inline">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta fumigación?')" title="Eliminar">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="alert alert-info  text-dark">
                <i class="fa-solid fa-info-circle"></i> 
                No hay periodos de fumigación registrados. 
                <a href="{{ route('fumigaciones.periodos.create') }}" class="alert-link">Crea un nuevo periodo</a> para comenzar.
            </div>
        @endforelse

        <!-- Fumigaciones Extemporáneas -->
        <h2 class="mb-3 mt-5 text-dark">
            <i class="fa-solid fa-triangle-exclamation text-danger"></i> 
            Fumigaciones Extemporáneas
        </h2>
        
        <div class="card card-fumigacion">
            <div class="card-header-extemporanea">
                <h4 class="mb-0">
                    <i class="fa-solid fa-bug"></i> 
                    Emergencias y Fumigaciones No Programadas
                    <span class="badge bg-light text-dark ms-2">{{ $extemporaneas->count() }} registros</span>
                </h4>
            </div>
            <div class="card-body p-0">
                @if($extemporaneas->isEmpty())
                    <div class="alert alert-info m-3">
                        <i class="fa-solid fa-info-circle"></i> 
                        No hay fumigaciones extemporáneas registradas.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th><i class="fa-solid fa-building"></i> Área</th>
                                    <th><i class="fa-regular fa-calendar"></i> Fecha</th>
                                    <th><i class="fa-regular fa-clock"></i> Horario</th>
                                    <th><i class="fa-solid fa-book"></i> Motivo</th>
                                    <th><i class="fa-solid fa-user"></i> Responsable</th>
                                    <th><i class="fa-solid fa-toolbox"></i> Equipo</th>
                                    <th><i class="fa-solid fa-gear"></i> Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($extemporaneas as $fum)
                                    <tr>
                                        <td>
                                            <small class="text-muted">ID: {{ $fum->id }}</small>
                                            <strong>{{ $fum->area->tipo_establecimiento ?? 'N/A' }}</strong><br>
                                            <small class="text-muted">{{ $fum->area->nivel ?? 'N/A' }} - {{ $fum->area->lugar_especifico ?? 'N/A' }}</small>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($fum->fecha)->format('d/m/Y') }}</td>
                                        <td>{{ $fum->hora ?? 'N/A' }}</td>
                                        <td>{{ $fum->motivo->descripcion ?? 'N/A' }}</td>
                                        <td>{{ $fum->responsableServicio->nombre ?? 'N/A' }}</td>
                                        <td>{{ $fum->equipoFumigacion->nombre ?? 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('fumigaciones.show', $fum->id) }}" class="btn btn-info btn-sm" title="Ver">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('fumigaciones.edit', $fum->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                                    <i class="fa-solid fa-edit"></i>
                                                </a>
                                                <form action="{{ route('fumigaciones.destroy', $fum->id) }}" method="POST" class="d-inline">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta fumigación extemporánea?')" title="Eliminar">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- Resumen Estadístico -->
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-calendar-check fa-3x mb-2"></i>
                        <h3>{{ $periodos->sum(function($p) { return $p->fumigaciones->count(); }) }}</h3>
                        <p class="mb-0">Fumigaciones Programadas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-bug fa-3x mb-2"></i>
                        <h3>{{ $extemporaneas->count() }}</h3>
                        <p class="mb-0">Fumigaciones Extemporáneas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-calendar-alt fa-3x mb-2"></i>
                        <h3>{{ $periodos->count() }}</h3>
                        <p class="mb-0">Periodos Registrados</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-chart-line fa-3x mb-2"></i>
                        <h3>{{ $periodos->sum(function($p) { return $p->fumigaciones->count(); }) + $extemporaneas->count() }}</h3>
                        <p class="mb-0">Total Fumigaciones</p>
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

    // Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
@endsection