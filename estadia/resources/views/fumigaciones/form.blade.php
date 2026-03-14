@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Programar fumigación')


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">

        <h1 style="text-align: center; color: #7c0000; margin-bottom: 30px;">
            {{ $incidente->exists ? 'Editar' : 'Nueva' }} Fumigación
        </h1>
        <div class="row ">
            <div class="col-md-6 justify-content-center" >
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-login" date-bs-dismiss="alert" ariel-label="Cerrar"></button>
                    
                @endif
            </div>
        </div>

        <form method="POST" action="{{ $fumigacion->exists ? route('fumigaciones.update', $fumigacion->id) : route('fumigaciones.store') }}" class="login-form">
            @csrf
            @if($fumigacion->exists) @method('PUT') @endif

             <!-- Responsables del servicio -->
            <div class="form-group">
                <label>
                    <i class="fa-solid fa-person"></i> Responsable del Servicio
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Responsable</a>
                </label>
                <select name="responsble_servicio_id" id="responsble_servicio_id" class="form-control form-control-sm" required>
                    <option value="">Seleccione un responsable...</option>
                    @foreach($responsables as $responsable)
                        <option value="{{ $responsable->id }}" {{ old('responsble_servicio_id', $fumigacion->responsble_servicio_id) == $responsable->id ? 'selected' : '' }}>
                            {{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}
                        </option>
                    @endforeach
                </select>
                @error('responsble_servicio_id')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <i class="fa-solid fa-expand"></i> Áreas
                    <a href="{{ route('areas.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nueva Área</a>
                </label>
                <select name="area_id" id="area_id" class="form-control form-control-sm" required>
                    <option value="">Seleccione un área...</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" {{ old('area_id', $fumigacion->area_id) == $area->id ? 'selected' : '' }}>
                            {{ $area->edificio }} - {{ $area->piso }} - {{ $area->lugar }}
                        </option>
                    @endforeach
                </select>
                @error('area_id')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <i class="fa-solid fa-person"></i> Responsable Titular
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Responsable</a>
                </label>
                <select name="responsable_titular_id" id="responsable_titular_id" class="form-control form-control-sm" required>
                    <option value="">Seleccione un responsable...</option>
                    @foreach($responsables as $responsable)
                        <option value="{{ $responsable->id }}" {{ old('responsable_titular_id', $fumigacion->responsable_titular_id) == $responsable->id ? 'selected' : '' }}>
                            {{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}
                        </option>
                    @endforeach
                </select>
                @error('responsable_titular_id')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>

            <!-- fecha de fumigacion -->
            <div class="form-group">
                <label>
                    <i class="fa-regular fa-calendar-days"></i> Fecha
                </label>
                <input type="date" id="fecha" name="fecha" value="{{ old('fecha', $fumigacion->fecha) }}"
                        required autofocus autocomplete="fecha" class="form-control form-control-sm">
                @error('fecha')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <i class="fa-solid fa-book"></i> Motivo
                    <a href="{{ route('motivos.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Motivo</a>
                </label>
                <select name="motivo_id" id="motivo_id" class="form-control form-control-sm" required>
                    <option value="">Seleccione un motivo...</option>
                    @foreach($motivos as $motivo)
                        <option value="{{ $motivo->id }}" {{ old('motivo_id', $fumigacion->motivo_id) == $motivo->id ? 'selected' : '' }}>
                            {{ $motivo->descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('motivo_id')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <i class="fa-solid fa-person"></i> Responsable Ante Contingencia
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Responsable</a>
                </label>
                <select name="responsable_contingencia_id" id="responsable_contingencia_id" class="form-control form-control-sm" required>
                    <option value="">Seleccione un responsable...</option>
                    @foreach($responsables as $responsable)
                        <option value="{{ $responsable->id }}" {{ old('responsable_contingencia_id', $fumigacion->responsable_contingencia_id) == $responsable->id ? 'selected' : '' }}>
                            {{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}
                        </option>
                    @endforeach
                </select>
                @error('responsable_contingencia_id')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <i class="fa-solid fa-toolbox"></i> Material o Equipo Utilizado para Fumigación
                    <a href="{{ route('equipoFumigaciones.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Material/Equipo</a>
                </label>
                <select name="equipo_fumigacion_id" id="equipo_fumigacion_id" class="form-control form-control-sm" required>
                    <option value="">Seleccione un material/equipo...</option>
                    @foreach($equipoFumigaciones as $equipoFumigacion)
                        <option value="{{ $equipoFumigacion->id }}" {{ old('equipo_fumigacion_id', $fumigacion->equipo_fumigacion_id) == $equipoFumigacion->id ? 'selected' : '' }}>
                            {{ $equipoFumigacion->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('equipo_fumigacion_id')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>
                    <i class="fa-solid fa-person"></i> Responsable de Fumigacion
                    <a href="{{ route('responsables.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Responsable</a>
                </label>
                <select name="responsable_fumigacion_id" id="responsable_fumigacion_id" class="form-control form-control-sm" required>
                    <option value="">Seleccione un responsable...</option>
                    @foreach($responsables as $responsable)
                        <option value="{{ $responsable->id }}" {{ old('responsable_fumigacion_id', $fumigacion->responsable_fumigacion_id) == $responsable->id ? 'selected' : '' }}>
                            {{ $responsable->nombre }} - {{ $responsable->telefono }} - {{ $responsable->puesto_area }}
                        </option>
                    @endforeach
                </select>
                @error('responsable_fumigacion_id')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                @enderror
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $fumigacion->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    // No se necesita JavaScript para los selects
    console.log('Formulario cargado correctamente');
</script>
@endsection