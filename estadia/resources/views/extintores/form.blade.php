@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Registro de extintores')


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Nuevo Extintor</h1>
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

        <form method="POST" action="{{ $extintor->exists ? route('extintores.update', $extintor) : route('extintores.store') }}" class="login-form">
            @csrf
            @if($extintor->exists) @method('PUT') @endif
             <!-- Name/Nombre -->
             
             <div class="form-group">
                <label>
                    <i class="fa-solid fa-shield"></i> Clave del Extintor
                    <a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Clave Nueva</a>
                </label>

                <select class="form-select form-select-sm" name="clave" required>
                    <option value="">Seleccione un clave...</option>
                    @foreach($claves as $clave)
                        <option value="{{ $clave->id }}" {{ old('clave', $extintor->clave) == $clave->id ? 'selected' : '' }}>
                            {{ $clave->edificio }} - {{ $clave->piso }} - {{ $clave->lugar }}
                        </option>
                    @endforeach
                </select>
                           @error('clave_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                           
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-arrow-up-9-1"></i> Numeración</label>
                <input type="text" id="numeracion" name="numeracion" value="{{ old('numeracion', $extintor->numeracion) }}"
                       placeholder="Ingrese la numeración">
                @error('numeracion')
                    <div class="logo-text"><p>{{ $message }}</p></div>
                @enderror
            </div>
             <!-- Fecha -->
             <div class="form-group">
                <label><i class="fa-regular fa-calendar-days"></i> Fecha de Adquisición</label>
                <input type="date" id="fecha" name="fecha" value="{{ old('fecha', $incidente->fecha) }}" required autofocus autocomplete="fecha">
                @error('fecha')
                <div class="logo-text"><p>{{$message}}</p></div>
                @enderror
            </div>

           <!-- Área -->
           <div class="form-group">
            <label><i class="fa-solid fa-expand"></i> Áreas
                <a href="{{ route('areas.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nueva Área</a>
            </label>
            <select class="form-select form-select-sm" name="area_id" required>
                <option value="">Seleccione un área...</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ old('area_id', $incidente->area_id) == $area->id ? 'selected' : '' }}>
                        {{ $area->edificio }} - {{ $area->piso }} - {{ $area->lugar }}
                    </option>
                @endforeach
            </select>
            @error('area_id')
                <div class="logo-text"><p>{{ $message }}</p></div>
            @enderror
        </div>

            <div class="form-group">
                <label>
                    <i class="fa-solid fa-fire-extinguisher"></i> Tipo de Extintor
                    <a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nuevo Tipo</a>
                </label>
                    <select class="form-select form-select-sm" name="area_id" required>
                        <option value="">Seleccione un área...</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_id', $incidente->area_id) == $area->id ? 'selected' : '' }}>
                                {{ $area->edificio }} - {{ $area->piso }} - {{ $area->lugar }}
                            </option>
                        @endforeach
                    </select>
                           @error('ex_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
                           

                      
            </div>

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-weight-scale"></i> Pesos del Extintor
                </label>
                <input type="number" step="0.01" min="0" id="frecuencia_cardiaca" name="frecuencia_cardiaca"
                       value="{{ old('frecuencia_cardiaca', $atencion->frecuencia_cardiaca) }}"
                       placeholder="Solo números..." required autofocus autocomplete="frecuencia_cardiaca">
                       @error('telefono')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <!-- Email Address/Correo Electronico -->
           

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-location-dot"></i> Ubicación
                </label>
                <input type="text" id="numeracion" name="numeracion" value="{{ old('numeracion', $extintor->numeracion) }}"
                       placeholder="Ingrese la numeración">
                       @error('name')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-map-pin"></i> Lugar de Referecia
                </label>
                <input type="text" id="numeracion" name="numeracion" value="{{ old('numeracion', $extintor->numeracion) }}"
                       placeholder="Ingrese la numeración">
                       @error('name')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-align-left"></i> Observaciones
                </label>
                <input type="text" id="numeracion" name="numeracion" value="{{ old('numeracion', $extintor->numeracion) }}"
                       placeholder="Ingrese la numeración">
                       @error('name')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <div class="form-group">
                <label >
                    <i class="fa-solid fa-calendar-check"></i> Condición del Extintor
                    <a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Nueva Condición</a>
                </label>
                    <input type="text" id="condicion_id" list="condicion" class="form-control form-control-lg"
                           placeholder="Ingrese la Condición" required autofocus autocomplete="material_equipo_id">
                           <datalist id="condicion" >
                            <option value="Nuevo"></option>
                            <option value="Usado"></option>
                            <option value="Mantenimiento"></option>
                            <option value="Dañado"></option>
                           </datalist>
                           @error('condicion_id')     
                        <div class="logo-text">
                            <p>{{$message}}</p> 
                        </div>
                           @enderror
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $extintor->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')

    
@endsection
 