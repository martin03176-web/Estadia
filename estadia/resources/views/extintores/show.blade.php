@extends('layouts.template')
@section('titulo','Ficha del extintor')

@section('contenido')

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-danger text-white">
            INFORMACIÓN DEL EXTINTOR
        </div>

        <div class="card-body">

            <p><strong>Código:</strong> {{ $extintor->codigo }}</p>
            <p><strong>Área:</strong> {{ $extintor->area->nombre ?? 'N/A' }}</p>
            <p><strong>Tipo:</strong> {{ $extintor->tipo }}</p>
            <p><strong>Capacidad:</strong> {{ $extintor->capacidad }}</p>
            <p><strong>Fecha de recarga:</strong> {{ $extintor->fecha_recarga }}</p>
            <p><strong>Fecha de vencimiento:</strong> {{ $extintor->fecha_vencimiento }}</p>

        </div>
    </div>

</div>

@endsection