@extends('layouts.template')
@section('estilos')
<link rel="stylesheet" href="{{asset('assets/css/tablaL.css')}}">    
@endsection

@section('titulo','Tabla de Fumigaciones')
 
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper">
        <div class="logo-text">
            <h1>Tablas de Fumigación</h1>
        </div>

        <div class="form-group">
            <!-- On tables -->
            <table class="table">
                <thead>
                    
                  <tr class="table-active">
                    <th scope="col">Reaponsable de quien recibe el servicio</th>
                    <th scope="col">Área</th>
                    <th scope="col">Titular de la dependencia</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Equipo de fumigación</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($fumigacions as $fumigacion)
                      @if($fumigacion->area_id->edificio == 'F')
                          <tr class="table-danger">
                              <th scope="row">F</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'A')
                          <tr class="table-success">
                              <th scope="row">A</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'F1')
                          <tr class="table-warning">
                              <th scope="row">F1</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'B')
                          <tr class="table-info">
                              <th scope="row">B</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'F2')
                          <tr class="table-warning">
                              <th scope="row">F2</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'C')
                          <tr class="table-danger">
                              <th scope="row">C</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'F3')
                          <tr class="table-secondary">
                              <th scope="row">F3</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'D')
                          <tr class="table-light">
                              <th scope="row">D</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'F4')
                          <tr class="table-danger">
                              <th scope="row">F4</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'E')
                          <tr class="table-info">
                              <th scope="row">E</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'F5')
                          <tr class="table-secondary">
                              <th scope="row">F5</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'G')
                          <tr class="table-warning">
                              <th scope="row">G</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'H')
                          <tr class="table-danger">
                              <th scope="row">H</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'I')
                          <tr class="table-success">
                              <th scope="row">I</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'J')
                          <tr class="table-info">
                              <th scope="row">J</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                          </tr>
                      @elseif($fumigacion->area_id->edificio == 'Nave')
                          <tr class="table-danger">
                              <th scope="row">Nave</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          <tr>
                              <th scope="row">{{$fumigacion->edificio}}</th>
                              <td>{{$fumigacion->piso}}</td>
                              <td>{{$fumigacion->lugar}}</td>
                              <td>{{$fumigacion->nota}}</td>
                              <td><a href="{{ route('fumigacions.edit', $fumigacion) }}"  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
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

    
@endsection
 