@extends('layouts.template')
@section('estilos')

@endsection

@section('titulo','Inventario de extintores')
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->
 <!-- botones ------------------------------------------------------------------------------------------------------------------------------->


 <!-- contenido ----------------------------------------------------------------------------------------------------------------------------------->
@section('contenido')
 <!-- Hero Section -->
 <section class="hero">
    <div class="login-wrapper-M">
        <div class="logo-text">
            <h1>Inventario de Extintores</h1>
            <a href="{{ route('extintors.create') }}" type="button" class="btn btn-outline-secondary mb-3"><i class="fa-solid fa-circle-up"></i> Nuevo Extintor</a>
        </div>

        <div class="form-group">
            <!-- On tables -->
            <table class="table">
                <thead>
                  <tr class="table-active">
                    <th scope="col">Clave</th>
                    <th scope="col">No.</th>
                    <th scope="col">Edificio</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Mantenimiento Interno</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-danger">
                    <th scope="row">Edificio F</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr>
                    <th scope="row">F</th>
                    <td>2</td>
                    <td>F</td>
                    <td>PQS</td>
                    <td>Oficina</td>
                    <td>Hoy</td>
                    <td>Falta colocarlo, se trajo a la bodega</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>     
                  </tr>
                  <tr class="table-success">
                    <th scope="row">Edificio A</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr>
                    <th scope="row">A</th>
                    <td>7</td>
                    <td>A</td>
                    <td>PQS</td>
                    <td>Pasillo</td>
                    <td>01/21/2026</td>
                    <td>Descargado</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                  </tr>
                  <tr>
                    <th scope="row">A</th>
                    <td>6</td>
                    <td>A</td>
                    <td>PQS</td>
                    <td>Pasillo</td>
                    <td>03/31/2026</td>
                    <td>Corrosión</td>
                    <td><a  type="button" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-up"></i>Actualizar</a></td>
                  </tr>
                  

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
 