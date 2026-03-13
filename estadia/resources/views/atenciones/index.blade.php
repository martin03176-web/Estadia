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
    
    .filter-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }
    
    .filter-group {
        display: flex;
        flex-direction: column;
    }
    
    .filter-group label {
        margin-bottom: 5px;
        font-weight: 500;
        color: #495057;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .filter-group label i {
        color: #dc3545;
        width: 18px;
    }
    
    .filter-group input,
    .filter-group select {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 0.95rem;
        transition: all 0.3s;
    }
    
    .filter-group input:focus,
    .filter-group select:focus {
        outline: none;
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }
    
    .filter-row {
        display: flex;
        gap: 10px;
        align-items: center;
    }
    
    .filter-row select {
        width: 100px;
        flex-shrink: 0;
    }
    
    .filter-row input[type="number"] {
        flex: 1;
    }
    
    .filter-actions {
        grid-column: 1 / -1;
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #dee2e6;
    }
    
    .btn-filter {
        padding: 10px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-filter-primary {
        background: #dc3545;
        color: white;
    }
    
    .btn-filter-primary:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }
    
    .btn-filter-secondary {
        background: #6c757d;
        color: white;
    }
    
    .btn-filter-secondary:hover {
        background: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
    }
    
    .pagination-info {
        margin-top: 20px;
        color: #6c757d;
    }
    
    .badge-filter {
        background-color: #e7f3ff;
        color: #004085;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        margin-left: 10px;
    }
</style>
@endsection

@section('titulo','Listado de atenciones')

@section('contenido')
<section class="hero">
    <div class="login-wrapper-L">
        <div class="logo-text">
            <h1>Listado de Atenciones</h1>
            <a href="{{ route('atenciones.create') }}" type="button" class="btn btn-outline-secondary mb-3">
                <i class="fa-solid fa-circle-up"></i> Nueva Atención
            </a>
        </div>

        <!-- Mensajes de sesión -->
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
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

        <!-- Filtros de búsqueda simplificados -->
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item" style="border: 1px solid #cce5ff;">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" style="background-color: #e6f3ff; color: #004085;" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <i class="fa-solid fa-filter me-2"></i> Filtros de búsqueda
                        @php
                            $activeFilters = collect(request()->except('page'))->filter()->count();
                        @endphp
                        @if($activeFilters > 0)
                            <span class="badge-filter">{{ $activeFilters }} filtros activos</span>
                        @endif
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse {{ request()->anyFilled(['nombre', 'carrera', 'semestre', 'signos_sintomas', 'edad']) ? 'show' : '' }}" data-bs-parent="#accordionFlushExample">
                    <div class="filter-card">
                        <form method="GET" action="{{ route('atenciones.index') }}" id="filterForm">
                            <div class="filter-grid">
                                <!-- Nombre del paciente -->
                                <div class="filter-group">
                                    <label><i class="fa-solid fa-user"></i> Nombre del paciente</label>
                                    <input type="text" name="nombre" value="{{ request('nombre') }}" 
                                           placeholder="Ej: Juan Pérez">
                                </div>
                                
                                <!-- Carrera/Área -->
                                <div class="filter-group">
                                    <label><i class="fa-solid fa-graduation-cap"></i> Carrera/Área</label>
                                    <input type="text" name="carrera" value="{{ request('carrera') }}" 
                                           placeholder="Ej: Medicina, Enfermería...">
                                </div>
                                
                                <!-- Semestre -->
                                <div class="filter-group">
                                    <label><i class="fa-solid fa-clock"></i> Semestre</label>
                                    <select name="semestre">
                                        <option value="">Todos los semestres</option>
                                        @for($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}" {{ request('semestre') == $i ? 'selected' : '' }}>
                                                {{ $i }}° Semestre
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                
                                <!-- Signos y Síntomas -->
                                <div class="filter-group">
                                    <label><i class="fa-solid fa-notes-medical"></i> Signos y Síntomas</label>
                                    <input type="text" name="signos_sintomas" value="{{ request('signos_sintomas') }}" 
                                           placeholder="Ej: Dolor de cabeza, fiebre...">
                                </div>
                                
                                <!-- Edad -->
                                <div class="filter-group">
                                    <label><i class="fa-solid fa-calendar"></i> Edad</label>
                                    <div class="filter-row">
                                        <select name="edad_operator">
                                            <option value="">Operador</option>
                                            <option value="=" {{ request('edad_operator') == '=' ? 'selected' : '' }}>=</option>
                                            <option value=">" {{ request('edad_operator') == '>' ? 'selected' : '' }}>Mayor que</option>
                                            <option value="<" {{ request('edad_operator') == '<' ? 'selected' : '' }}>Menor que</option>
                                            <option value=">=" {{ request('edad_operator') == '>=' ? 'selected' : '' }}>Mayor o igual</option>
                                            <option value="<=" {{ request('edad_operator') == '<=' ? 'selected' : '' }}>Menor o igual</option>
                                        </select>
                                        <input type="number" name="edad" value="{{ request('edad') }}" 
                                               placeholder="Edad" min="0" max="120">
                                    </div>
                                </div>
                            </div>
                            <!-- Fecha inicio -->
                                <div class="filter-group">
                                    <label><i class="fa-solid fa-calendar-days"></i> Fecha desde</label>
                                    <input type="date" name="fecha_inicio" value="{{ request('fecha_inicio') }}">
                                </div>

                                <!-- Fecha fin -->
                                <div class="filter-group">
                                    <label><i class="fa-solid fa-calendar-days"></i> Fecha hasta</label>
                                    <input type="date" name="fecha_fin" value="{{ request('fecha_fin') }}">
                                </div>

                            <div class="filter-actions">
                                <button type="submit" class="btn-filter btn-filter-primary">
                                    <i class="fa-solid fa-search"></i> Buscar
                                </button>
                                <a href="{{ route('atenciones.index') }}" class="btn-filter btn-filter-secondary">
                                    <i class="fa-solid fa-rotate-left"></i> Limpiar filtros
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resultados -->
        <div class="form-group">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <p class="text-secondary mb-0">
                    <i class="fa-solid fa-list"></i> Total de registros: {{ $atenciones->total() }}
                </p>
                @if(request()->anyFilled(['nombre', 'carrera', 'semestre', 'signos_sintomas', 'edad']))
                    <p class="text-secondary mb-0">
                        <i class="fa-solid fa-filter"></i> Mostrando resultados filtrados
                    </p>
                @endif
            </div>
        </div>
        
        @forelse($atenciones as $atencion)
        <div class="card shadow-lg border-0 mb-4">
            <div class="card-header bg-active d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0">
                        <i class="fa-solid fa-user-injured"></i>
                        {{ $atencion->paciente->nombre }}
                    </h4>
                    <small>
                        Código: {{ $atencion->paciente->codigo }} | 
                        {{ $atencion->paciente->carrera_area }} - 
                        {{ $atencion->semestre }} Semestre
                    </small>
                </div>
                <span class="badge text-dark fs-6">
                    Edad: {{ $atencion->edad }} años | 
                    {{ \Carbon\Carbon::parse($atencion->fecha_atencion)->format('d-m-Y') }}
                </span>
            </div>
        
            <div class="card-body">
                <div class="row">
                    <!-- SIGNOS VITALES -->
                    <div class="col-md-6 border-end">
                        <h5 class="text-dark mb-3">
                            <i class="fa-solid fa-heart-pulse"></i> Signos Vitales
                        </h5>
        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Frecuencia Cardiaca</span>
                                <strong>{{ $atencion->frecuencia_cardiaca }} lpm</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Frecuencia Respiratoria</span>
                                <strong>{{ $atencion->frecuencia_respiratoria }} rpm</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tensión Arterial</span>
                                <strong>{{ $atencion->tension_sistolica }}/{{ $atencion->tension_diastolica }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Temperatura</span>
                                <strong>{{ $atencion->temperatura }} °C</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>SpO2</span>
                                <strong>{{ $atencion->oxigenacion }}%</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Glucemia</span>
                                <strong>{{ $atencion->glucemia }} mg/dL</strong>
                            </li>
                        </ul>
                    </div>
        
                    <!-- VALORACION SAMPLE -->
                    <div class="col-md-6">
                        <h5 class="text-dark mb-3">
                            <i class="fa-solid fa-notes-medical"></i> Valoración SAMPLE
                        </h5>
        
                        <div class="mb-2">
                            <strong>S (Signos/Síntomas):</strong> {{ $atencion->signos_sintomas }}
                        </div>
                        <div class="mb-2">
                            <strong>A (Alergias):</strong> {{ $atencion->alergias }}
                        </div>
                        <div class="mb-2">
                            <strong>M (Medicamentos):</strong> {{ $atencion->medicamento }}
                        </div>
                        <div class="mb-2">
                            <strong>P (Patologías):</strong> {{ $atencion->patologia }}
                        </div>
                        <div class="mb-2">
                            <strong>L (Último alimento):</strong> {{ $atencion->ultimo_alimento }}
                        </div>
                        <div class="mb-2">
                            <strong>E (Eventos):</strong> {{ $atencion->eventos_previos }}
                        </div>
                        <div class="mb-2">
                            <strong>Destino:</strong> 
                            <span class="badge bg-info">{{ $atencion->destino }}</span>
                        </div>
                    </div>
                </div>
        
                <hr>
        
                <!-- BOTONES -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('atenciones.show', $atencion) }}" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-eye"></i> Ver
                    </a>
                    <a href="{{ route('atenciones.edit', $atencion) }}" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-file-arrow-up"></i> Actualizar
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-info text-center">
            <i class="fa-solid fa-info-circle"></i> No se encontraron atenciones con los filtros aplicados.
        </div>
        @endforelse

        <!-- Paginación -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="pagination-info">
                Mostrando {{ $atenciones->firstItem() ?? 0 }} - {{ $atenciones->lastItem() ?? 0 }} 
                de {{ $atenciones->total() }} registros
            </div>
            <div>
                {{ $atenciones->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Mantener los filtros al hacer submit
    document.getElementById('filterForm')?.addEventListener('submit', function(e) {
        const inputs = this.querySelectorAll('input, select');
        inputs.forEach(input => {
            if (!input.value) {
                input.disabled = true;
            }
        });
    });
</script>
@endsection