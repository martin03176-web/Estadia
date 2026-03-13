@extends('layouts.template')
@section('estilos')
<style>
    .filter-card {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 25px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .filter-row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        align-items: flex-end;
    }
    
    .filter-group {
        flex: 1 1 200px;
    }
    
    .filter-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 500;
        color: #495057;
        font-size: 0.9rem;
    }
    
    .filter-group input,
    .filter-group select {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 0.95rem;
    }
    
    .filter-group input:focus,
    .filter-group select:focus {
        outline: none;
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }
    
    .filter-actions {
        display: flex;
        gap: 10px;
        margin-left: auto;
    }
    
    .btn-filter {
        padding: 8px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .btn-filter-primary {
        background: #dc3545;
        color: white;
    }
    
    .btn-filter-primary:hover {
        background: #c82333;
    }
    
    .btn-filter-secondary {
        background: #6c757d;
        color: white;
    }
    
    .btn-filter-secondary:hover {
        background: #5a6268;
    }
    
    .pagination-info {
        margin-top: 20px;
        color: #6c757d;
    }
    
    .badge-riesgo {
        padding: 5px 10px;
        border-radius: 4px;
        font-weight: 500;
    }
</style>
@endsection

@section('titulo','Historial de incidencias')

@section('contenido')
<section class="hero">
    <div class="login-wrapper-L">
        <div class="logo-text">
            <h1>Historial de Incidencias</h1>
            <a href="{{ route('incidentes.create') }}" type="button" class="btn btn-outline-secondary mb-3">
                <i class="fa-solid fa-circle-up"></i> Nuevo Incidente
            </a>
        </div>

        <!-- Mensajes de sesión -->
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Filtros de búsqueda -->

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item" style="border: 1px solid #cce5ff;">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" style="background-color: #e6f3ff; color: #004085;" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <i class="fa-solid fa-filter me-2"></i> Filtros de búsqueda
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="filter-card">
                    <form method="GET" action="{{ route('incidentes.index') }}" id="filterForm">
                        <div class="filter-row">
                            <div class="filter-group">
                                <label><i class="fa-solid fa-align-left"></i> Asunto</label>
                                <input type="text" name="asunto" value="{{ request('asunto') }}" 
                                       placeholder="Buscar por asunto...">
                            </div>
                            
                            <div class="filter-group">
                                <label><i class="fa-regular fa-calendar"></i> Fecha desde</label>
                                <input type="date" name="fecha_desde" value="{{ request('fecha_desde') }}">
                            </div>
                            
                            <div class="filter-group">
                                <label><i class="fa-regular fa-calendar"></i> Fecha hasta</label>
                                <input type="date" name="fecha_hasta" value="{{ request('fecha_hasta') }}">
                            </div>
                            
                            <div class="filter-group">
                                <label><i class="fa-solid fa-building"></i> Tipo de establecimiento</label>
                            
                                <select name="tipo_establecimiento">
                                    <option value="">Todos</option>
                            
                                    <option value="Edificio" {{ request('tipo_establecimiento') == 'Edificio' ? 'selected' : '' }}>
                                        Edificio
                                    </option>
                            
                                    <option value="Instalaciones auxiliares" {{ request('tipo_establecimiento') == 'Instalaciones auxiliares' ? 'selected' : '' }}>
                                        Instalaciones auxiliares
                                    </option>
                            
                                    <option value="Bloque de conexión" {{ request('tipo_establecimiento') == 'Bloque de conexión' ? 'selected' : '' }}>
                                        Bloque de conexión
                                    </option>
                            
                                    <option value="Módulo operativo" {{ request('tipo_establecimiento') == 'Módulo operativo' ? 'selected' : '' }}>
                                        Módulo operativo
                                    </option>
                            
                                    <option value="Local comercial" {{ request('tipo_establecimiento') == 'Local comercial' ? 'selected' : '' }}>
                                        Local comercial
                                    </option>
                            
                                    <option value="Estacionamiento" {{ request('tipo_establecimiento') == 'Estacionamiento' ? 'selected' : '' }}>
                                        Estacionamiento
                                    </option>
                            
                                    <option value="Áreas comunes exteriores" {{ request('tipo_establecimiento') == 'Áreas comunes exteriores' ? 'selected' : '' }}>
                                        Áreas comunes exteriores
                                    </option>
                            
                                    <option value="Otro" {{ request('tipo_establecimiento') == 'Otro' ? 'selected' : '' }}>
                                        Otro
                                    </option>
                            
                                </select>
                            </div>
                            
                            
                            <div class="filter-group">
                                <label><i class="fa-solid fa-expand"></i> Nivel</label>
                                <input type="text" name="nivel" value="{{ request('nivel') }}" 
                                       placeholder="Buscar por nivel...">
                            </div>
                            
                            <div class="filter-group">
                                <label><i class="fa-solid fa-door-open"></i> Lugar específico</label>
                                <input type="text" 
                                       name="lugar_especifico" 
                                       value="{{ request('lugar_especifico') }}"
                                       placeholder="Ej: Pasillo, Oficina, Comedor...">
                            </div>
                        
                            <div class="filter-group">
                                <label><i class="fa-solid fa-person-falling-burst"></i> Tipo de Incidente</label>
                                <select name="tipo_incidente_id">
                                    <option value="">Todos los tipos</option>
                                    @foreach($tipoIncidentes ?? [] as $tipo)
                                        <option value="{{ $tipo->id }}" {{ request('tipo_incidente_id') == $tipo->id ? 'selected' : '' }}>
                                            {{ $tipo->tipo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="filter-group">
                                <label><i class="fa-solid fa-explosion"></i> Tipo de Riesgo</label>
                                <select name="tipo_riesgo_id">
                                    <option value="">Todos los tipos</option>
                                    @foreach($tipoRiesgos ?? [] as $tipo)
                                        <option value="{{ $tipo->id }}" {{ request('tipo_riesgo_id') == $tipo->id ? 'selected' : '' }}>
                                            {{ $tipo->tipo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
        
        
                            
                            
                            <div class="filter-group">
                                <label><i class="fa-solid fa-skull-crossbones"></i> Nivel de Riesgo</label>
                                <select name="nivel_riesgo_id">
                                    <option value="">Todos los niveles</option>
                                    @foreach($nivelRiesgos ?? [] as $nivel)
                                        <option value="{{ $nivel->id }}" {{ request('nivel_riesgo_id') == $nivel->id ? 'selected' : '' }}>
                                            {{ $nivel->nivel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-actions">
                                <button type="submit" class="btn-filter btn-filter-primary">
                                    <i class="fa-solid fa-search"></i> Buscar
                                </button>
                                <a href="{{ route('incidentes.index') }}" class="btn-filter btn-filter-secondary">
                                    <i class="fa-solid fa-rotate-left"></i> Limpiar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>


        <!-- Resultados -->
        <div class="container-fluid mt-4 px-4">
            <div class="row mb-3">
                <div class="col-12">
                    <p class="text-secondary">Total de registros: {{ $incidentes->total() }}</p>
                </div>
            </div>
            
            <div class="row">
                @forelse($incidentes as $incidente)
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header text-black d-flex justify-content-between align-items-center">
                            <strong>{{ $incidente->asunto }}</strong>
                            @php
                                $nivel = $incidente->nivelRiesgo->nivel ?? '';
                                $color = match($nivel) {
                                    'Bajo' => 'success',
                                    'Medio' => 'warning',
                                    'Alto' => 'danger',
                                    default => 'secondary'
                                };
                            @endphp
                            <span class="badge bg-{{ $color }} fs-6">{{ $nivel ?: 'N/A' }}</span>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <p><strong><i class="fa-regular fa-calendar"></i> Fecha:</strong> 
                                        {{ \Carbon\Carbon::parse($incidente->fecha)->format('d/m/Y') }}
                                    </p>
                                    <p><strong><i class="fa-solid fa-location-dot"></i> Área:</strong><br>
                                        @if($incidente->area)
                                            {{ $incidente->area->tipo_establecimiento ?? 'N/A' }} <br>
                                            Piso: {{ $incidente->area->nivel ?? 'N/A' }} <br>
                                            {{ $incidente->area->lugar_especifico ?? 'N/A' }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                    <p><strong><i class="fa-solid fa-user"></i> Responsable:</strong><br>
                                        {{ $incidente->responsable->nombre ?? 'N/A' }}
                                    </p>
                                </div>

                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong><i class="fa-solid fa-person-falling-burst"></i> Tipo:</strong> 
                                                {{ $incidente->tipoIncidente->tipo ?? 'N/A' }}
                                            </p>
                                            <p><strong><i class="fa-solid fa-explosion"></i> Riesgo:</strong> 
                                                {{ $incidente->tipoRiesgo->tipo ?? 'N/A' }}
                                            </p>
                                            <p><strong><i class="fa-solid fa-clock"></i> Tiempo total:</strong> 
                                                {{ $incidente->duracion ?? 'N/A' }}
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong><i class="fa-solid fa-toolbox"></i> Material/Equipo:</strong><br>
                                                {{ $incidente->materialEquipo->nombre ?? 'N/A' }}
                                                @if($incidente->materialEquipo && $incidente->materialEquipo->nota)
                                                    <br><small class="text-muted">{{ $incidente->materialEquipo->nota }}</small>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="text-muted">
                                        <strong>Descripción:</strong><br>
                                        {{ \Str::limit($incidente->descripcion, 300) }}
                                    </p>
                                    @if($incidente->acciones_correctivas)
                                        <p class="text-muted mt-2">
                                            <strong>Acciones correctivas:</strong><br>
                                            {{ \Str::limit($incidente->acciones_correctivas, 200) }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <a href="{{ route('incidentes.show', $incidente) }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fa-solid fa-eye"></i> Ver detalles
                            </a>
                            <a href="{{ route('incidentes.edit', $incidente) }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fa-solid fa-edit"></i> Actualizar
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fa-solid fa-info-circle fa-2x mb-3"></i>
                        <p>No se encontraron incidencias con los filtros aplicados.</p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="pagination-info">
                    Mostrando {{ $incidentes->firstItem() ?? 0 }} - {{ $incidentes->lastItem() ?? 0 }} 
                    de {{ $incidentes->total() }} registros
                </div>
                <div>
                    {{ $incidentes->appends(request()->query())->links() }}
                </div>
            </div>
        </div>

        <div id="message" class="message"></div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Mantener los filtros al hacer submit (deshabilitar campos vacíos)
    document.getElementById('filterForm')?.addEventListener('submit', function(e) {
        const inputs = this.querySelectorAll('input, select');
        inputs.forEach(input => {
            if (!input.value) {
                input.disabled = true;
            }
        });
    });

    // Auto submit para selects (opcional)
    /*
    document.querySelectorAll('select[name="tipo_incidente_id"], select[name="tipo_riesgo_id"], select[name="nivel_riesgo_id"]')
        .forEach(select => {
            select.addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        });
    */
</script>
@endsection