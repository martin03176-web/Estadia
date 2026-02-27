@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaL.css')}}">    
@endsection

@section('titulo','Lista de Atenciones')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->

 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper">
        <div class="logo-text">
            <h1>Lista de Atenciones</h1>
        </div>

        <div class="form-group">
            <!-- On tables -->
            {{-- <table class="table">
                <thead>
                  <tr class="table-active">
                    <th scope="col">Nombre alumno</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Código</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Signos Vitales</th>
                    <th scope="col">Valoración SAMPLE</th>
                    <th></th>
                  </tr>
                </thead>
                @forEach($atencions as $atencion)
                <tbody>
                  <tr>
                    <th scope="row">{{$atencion->paciente->nombre}}</th>
                    <td>{{$atencion->paciente->edad}}</td>
                    <td>{{$atencion->paciente->codigo}}</td>
                    <td>{{$atencion->paciente->carrera_area}}</td>
                    <td>{{$atencion->paciente->semestre}}</td>
                    <td><ul class="list-group">
                        <li class="list-group-item">FC: {{$atencion->frecuencia_cardiaca}} lpm</li>
                        <li class="list-group-item">FR: {{$atencion->frecuencia_respiratoria}} rpm</li>
                        <li class="list-group-item">T/A: {{$atencion->tension_sistolica}}/{{$atencion->tension_diastolica}}</li>
                        <li class="list-group-item">Temp: {{$atencion->temperatura}}°C</li>
                        <li class="list-group-item">(SpO2): {{$atencion->oxigenacion}}%</li>
                        <li class="list-group-item">Glucemia: {{$atencion->glucemia}} mg/dL</li>
                      </ul></td>
                    <td><ul class="list-group">
                        <li class="list-group-item">S: {{$atencion->signos_sintomas}}</li>
                        <li class="list-group-item">A: {{$atencion->alergias}}</li>
                        <li class="list-group-item">M: {{$atencion->medicamento}}</li>
                        <li class="list-group-item">P: {{$atencion->patologia}}</li>
                        <li class="list-group-item">L: {{$atencion->ultimo_alimento}}</li>
                        <li class="list-group-item">E: {{$atencion->eventos_previos}}</li>
                      </ul></td>
                    <a href="{{ route('atencions.edit', $atencion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-file-arrow-up"></i>Actualizar</a>
                            <a href="{{ route('atencions.show', $atencion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-eye"></i>Ver</a>
                  </tr>
                  @endforeach
                </tbody>
              </table> --}}
              @foreach($atencions as $atencion)
              <div class="card shadow-lg border-0 mb-4">
                <div class="card-header bg-active d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">
                            <i class="fa-solid fa-user-injured"></i>
                            {{$atencion->paciente->nombre}}
                        </h4>
                        <small>Código: {{$atencion->paciente->codigo}} | {{$atencion->paciente->carrera_area}} - {{$atencion->semestre}} Semestre</small>
                    </div>
                    <span class="badge text-dark fs-6">
                        Edad: {{$atencion->edad}} años
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
                                    <strong>{{$atencion->frecuencia_cardiaca}} lpm</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Frecuencia Respiratoria</span>
                                    <strong>{{$atencion->frecuencia_respiratoria}} rpm</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Tensión Arterial</span>
                                    <strong>{{$atencion->tension_sistolica}}/{{$atencion->tension_diastolica}}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Temperatura</span>
                                    <strong>{{$atencion->temperatura}} °C</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>SpO2</span>
                                    <strong>{{$atencion->oxigenacion}}%</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Glucemia</span>
                                    <strong>{{$atencion->glucemia}} mg/dL</strong>
                                </li>
                            </ul>
                        </div>
            
                        <!-- VALORACION SAMPLE -->
                        <div class="col-md-6">
                            <h5 class="text-dark mb-3">
                                <i class="fa-solid fa-notes-medical"></i> Valoración SAMPLE
                            </h5>
            
                            <div class="mb-2">
                                <strong>S:</strong> {{$atencion->signos_sintomas}}
                            </div>
                            <div class="mb-2">
                                <strong>A:</strong> {{$atencion->alergias}}
                            </div>
                            <div class="mb-2">
                                <strong>M:</strong> {{$atencion->medicamento}}
                            </div>
                            <div class="mb-2">
                                <strong>P:</strong> {{$atencion->ultimo_alimento}}
                            </div>
                            <div class="mb-2">
                                <strong>L:</strong> {{$atencion->ultimo_alimento}}
                            </div>
                            <div class="mb-2">
                                <strong>E:</strong> {{$atencion->eventos_previos}}
                            </div>
                        </div>
            
                    </div>
            
                    <hr>
            
                    <!-- BOTONES -->
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('atencions.show', $atencion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-eye"></i>Ver</a>
                        <a href="{{ route('atencions.edit', $atencion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-file-arrow-up"></i>Actualizar</a>
                    </div>
            
                </div>
            </div>
        @endforeach
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menú móvil
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');
        
        mobileMenuBtn.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            mobileMenuBtn.innerHTML = mainNav.classList.contains('active') 
                ? '<i class="fas fa-times"></i>' 
                : '<i class="fas fa-bars"></i>';
        });
        
        // Cerrar menú al hacer clic en un enlace
        const navLinks = document.querySelectorAll('.nav-link, .submenu-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 900) {
                    mainNav.classList.remove('active');
                    mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                }
            });
        });
    });
</script>
    
@endsection
 