@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaM.css')}}">    
@endsection

@section('titulo','Tabla de Áreas')

@section('contenido')
 <!-- Hero Section -->
    <section class="hero">
        <div class="login-wrapper">
            <div class="logo-text">
                <h1>Tablas de Áreas</h1>
                  <!-- Botón para nuevo paciente (comentado) -->
            {{-- <a href="{{ route('areas.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nueva Área</a> --}}
          
            </div>

            <div class="form-group">
                <!-- On tables -->
                <table class="table">
                    <thead>
                    <tr class="table-active">
                        <th scope="col">Edificio</th>
                        <th scope="col">Piso</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Nota</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($areas as $area)
                            @if($area->edificio == 'F')
                                <tr class="table-danger">
                                    <th scope="row">F</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'A')
                                <tr class="table-success">
                                    <th scope="row">A</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'F1')
                                <tr class="table-warning">
                                    <th scope="row">F1</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'B')
                                <tr class="table-info">
                                    <th scope="row">B</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'F2')
                                <tr class="table-warning">
                                    <th scope="row">F2</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'C')
                                <tr class="table-danger">
                                    <th scope="row">C</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'F3')
                                <tr class="table-secondary">
                                    <th scope="row">F3</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'D')
                                <tr class="table-light">
                                    <th scope="row">D</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'F4')
                                <tr class="table-danger">
                                    <th scope="row">F4</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'E')
                                <tr class="table-info">
                                    <th scope="row">E</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'F5')
                                <tr class="table-secondary">
                                    <th scope="row">F5</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'G')
                                <tr class="table-warning">
                                    <th scope="row">G</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'H')
                                <tr class="table-danger">
                                    <th scope="row">H</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'I')
                                <tr class="table-success">
                                    <th scope="row">I</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'J')
                                <tr class="table-info">
                                    <th scope="row">J</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @elseif($area->edificio == 'Nave')
                                <tr class="table-danger">
                                    <th scope="row">Nave</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th scope="row">{{$area->edificio}}</th>
                                    <td>{{$area->piso}}</td>
                                    <td>{{$area->lugar}}</td>
                                    <td>{{$area->nota}}</td>
                                    <td><a href="{{ route('areas.edit', $area) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                                </tr>
                            @endif
                            
                        @endforeach
                    </tbody>
                </table>
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
 