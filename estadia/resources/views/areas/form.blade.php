@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Registro de áreas')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->

 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Registro de Áreas</h1>
        </div>
        <div class="row ">
            <div class="col-md-6 justify-content-center" >
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-login" date-bs-dismiss="alert" ariel-label="Cerrar"></button>
                    </div>
                @endif
            </div>
        </div>

        <form method="POST" action="{{ $area->exists ? route('areas.update', $area) : route('areas.store') }}" class="login-form">
            @csrf
            @if ($area->exists) 
                @method('PUT') 
            @endif
            
            <!-- tipo de establecimiento -->
            <div class="form-group">
                <label>
                    <i class="fas fa-building"></i> Tipo de establecimiento
                </label>
                <select name="tipo_establecimiento" class="form-control" required>
                    <option value="">Seleccione...</option>
                    <option value="Edificio" {{ old('tipo_establecimiento', $area->tipo_establecimiento ?? '') == 'Edificio' ? 'selected' : '' }}>Edificio</option>
                    <option value="Instalaciones auxiliares" {{ old('tipo_establecimiento', $area->tipo_establecimiento ?? '') == 'Instalaciones auxiliares' ? 'selected' : '' }}>Instalaciones auxiliares</option>
                    <option value="Bloque de conexión" {{ old('tipo_establecimiento', $area->tipo_establecimiento ?? '') == 'Bloque de conexión' ? 'selected' : '' }}>Bloque de conexión</option>
                    <option value="Módulo operativo" {{ old('tipo_establecimiento', $area->tipo_establecimiento ?? '') == 'Módulo operativo' ? 'selected' : '' }}>Módulo operativo</option>
                    <option value="Local comercial" {{ old('tipo_establecimiento', $area->tipo_establecimiento ?? '') == 'Local comercial' ? 'selected' : '' }}>Local comercial</option>
                    <option value="Estacionamiento" {{ old('tipo_establecimiento', $area->tipo_establecimiento ?? '') == 'Estacionamiento' ? 'selected' : '' }}>Estacionamiento</option>
                    <option value="Áreas comunes exteriores" {{ old('tipo_establecimiento', $area->tipo_establecimiento ?? '') == 'Áreas comunes exteriores' ? 'selected' : '' }}>Áreas comunes exteriores</option>
                    <option value="otro" {{ old('tipo_establecimiento', $area->tipo_establecimiento ?? '') == 'otro' ? 'selected' : '' }}>Otro</option>
                </select>
                @error('tipo_establecimiento')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>
            
            <!-- Nivel -->
            <div class="form-group">
                <label>
                    <i class="fas fa-layer-group"></i> Nivel
                </label>
                <input 
                    type="number"
                    name="nivel"
                    class="form-control"
                    placeholder="Ingrese el nivel"
                    value="{{ old('nivel', $area->nivel ?? '') }}"
                    required
                >
                @error('nivel')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>
            
            <!-- Lugar especifico -->
            <div class="form-group">
                <label>
                    <i class="fas fa-map-pin"></i> Lugar específico
                </label>
                <input 
                    type="text"
                    name="lugar_especifico"
                    class="form-control"
                    placeholder="Ejemplo: pasillo, oficina, comedor"
                    value="{{ old('lugar_especifico', $area->lugar_especifico ?? '') }}"
                    required
                >
                @error('lugar_especifico')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>
            
            <!-- Nota -->
            <div class="form-group">
                <label>
                    <i class="fas fa-sticky-note"></i> Nota / Observaciones
                </label>
                <textarea 
                    name="nota"
                    class="form-control"
                    rows="3"
                    placeholder="Observaciones adicionales (opcional)"
                >{{ old('nota', $area->nota ?? '') }}</textarea>
                @error('nota')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>
        
            <!-- Boton principal -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $area->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection

@section('scripts')
    
@endsection