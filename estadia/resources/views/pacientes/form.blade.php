@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Registro de pacientes')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Registro de Pacientes</h1>
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

        <form method="POST" action="{{ $paciente->exists ? route('pacientes.update', $paciente) : route('pacientes.store') }}" class="login-form">
            @csrf
            @if ($paciente->exists) @method('PUT') @endif
             <!-- Nombre -->
            <div class="form-group">
                <label >
                    <i class="fas fa-user"></i> Nombre Completo
                </label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $paciente->nombre) }}"
                       placeholder="Ingrese Nombre del Paciente" required autofocus autocomplete="nombre">
                       @error('nombre')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
              <!-- Sexo -->
              <div class="form-group">
                <label >
                    <i class="fa-solid fa-venus-mars"></i> Sexo
                </label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="sexo" >
                    <option value="Masculino" @selected(old('sexo', $paciente->sexo) === 'Masculino' )>Masculino</option>
                    <option value="Femenino" @selected(old('sexo', $paciente->sexo) === 'Femenino' )>Femenino</option>
                    <option value="Otro" @selected(old('sexo', $paciente->sexo) === 'Otro' )>Otro</option>
                  </select>
                  @error('sexo')     
                  <div class="logo-text">
                      <p>{{$message}}</p> 
                  </div>
                     @enderror
    
            </div>
           <!-- Telefono -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-square-phone"></i> Teléfono
                </label>
                <input type="number" id="telefono" name="telefono" value="{{ old('telefono', $paciente->telefono) }}"
                       placeholder="Ingrese Número Telefónico" required autofocus autocomplete="telefono">
                       @error('telefono')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
            
            <!-- Codigo -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-qrcode"></i> Código
                </label>
                <input type="number" id="codio" name="codigo" value="{{ old('codigo', $paciente->codigo) }}"
                       placeholder="Ingrese Código del Paciente" autofocus autocomplete="codigo">
                       @error('codigo')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>

            <!-- Tipo de Paciente -->
                <div class="form-group">
                    <label>
                        <i class="fa-solid fa-users"></i> Tipo de Paciente
                    </label>

                    <select class="form-select form-select-lg mb-3" name="tipo_paciente">
                        <option value="">Seleccione una opción</option>

                        <option value="Academico"
                        @selected(old('tipo_paciente', $paciente->tipo_paciente) === 'Academico')>
                        Académico
                        </option>

                        <option value="Estudiante"
                        @selected(old('tipo_paciente', $paciente->tipo_paciente) === 'Estudiante')>
                        Estudiante
                        </option>

                        <option value="Administrativo"
                        @selected(old('tipo_paciente', $paciente->tipo_paciente) === 'Administrativo')>
                        Administrativo
                        </option>

                        <option value="Operativo"
                        @selected(old('tipo_paciente', $paciente->tipo_paciente) === 'Operativo')>
                        Operativo
                        </option>

                        <option value="Otro"
                        @selected(old('tipo_paciente', $paciente->tipo_paciente) === 'Otro')>
                        Otro
                        </option>
                    </select>

                    @error('tipo_paciente')
                        <div class="logo-text">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
            <!-- Area_carrera -->
            <div class="form-group">
                <label >
                    <i class="fa-solid fa-book-bookmark"></i> Carrera o Área
                </label>
                <input type="text" id="carrera_area" name="carrera_area" value="{{ old('carrera_area', $paciente->carrera_area) }}"
                       placeholder="Ingrese Carrera del Paciente" required autofocus autocomplete="carrera_area">
                       @error('carrera_area')     
                    <div class="logo-text">
                        <p>{{$message}}</p> 
                    </div>
                       @enderror
                      
            </div>
           
        <!-- Boton principal -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="btn btn-solid-red">
                    <i class="fa-solid fa-check-to-slot"></i> {{ $paciente->exists ? 'Actualizar' : 'Registrar' }}
                </x-primary-button>
            </div>
        </form>
        
        <div id="message" class="message"></div>
    </div>
</section>
@endsection
@section('scripts')

@endsection
 