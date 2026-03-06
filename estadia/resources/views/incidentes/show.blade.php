@extends('layouts.template')

@section('titulo','Reporte de incidente')

@section('estilos')
<style>
    .reporte-container{
        max-width: 1000px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,.1);
        font-size: 14px;
    }

    .titulo-reporte{
        text-align: center;
        font-weight: bold;
        font-size: 22px;
        margin-bottom: 20px;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
    }

    .seccion{
        margin-bottom: 20px;
    }

    .seccion h4{
        background: #343a40;
        color: white;
        padding: 8px 10px;
        font-size: 15px;
        margin-bottom: 10px;
    }

    .grid-2{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px 40px;
    }

    .campo{
        display: flex;
        justify-content: space-between;
        border-bottom: 1px dotted #999;
        padding: 4px 0;
    }

    .label{
        font-weight: 600;
    }

    .descripcion-box{
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 6px;
        min-height: 80px;
        background: #f9f9f9;
    }

    @media print{
        .no-print{
            display: none;
        }
        body{
            background: white;
        }
    }
</style>
@endsection


@section('contenido')

<div class="reporte-container">

    <div class="titulo-reporte">
        REPORTE OFICIAL DE INCIDENTE
    </div>

    {{-- ================= DATOS GENERALES ================= --}}
    <div class="seccion">
        <h4>DATOS GENERALES</h4>

        <div class="grid-2">

            <div class="campo">
                <span class="label">Asunto:</span>
                <span>{{ $incidente->asunto }}</span>
            </div>

            <div class="campo">
                <span class="label">Fecha:</span>
                <span>{{ \Carbon\Carbon::parse($incidente->fecha)->format('d/m/Y') }}</span>
            </div>

            <div class="campo">
                <span class="label">Responsable:</span>
                <span>{{ $incidente->responsable->nombre ?? 'N/A' }}</span>
            </div>

            <div class="campo">
                <span class="label">Tipo de Incidente:</span>
                <span>{{ $incidente->tipoIncidente->tipo ?? 'N/A' }}</span>
            </div>

            <div class="campo">
                <span class="label">Tipo de Riesgo:</span>
                <span>{{ $incidente->tipoRiesgo->tipo ?? 'N/A' }}</span>
            </div>

            <div class="campo">
                <span class="label">Nivel de Riesgo:</span>
                <span>{{ $incidente->nivelRiesgo->nivel ?? 'N/A' }}</span>
            </div>

            <div class="campo">
                <span class="label">Material / Equipo:</span>
                <span>{{ $incidente->materialEquipo->nombre ?? 'N/A' }}</span>
            </div>

            <div class="campo">
                <span class="label">Tiempo Total:</span>
                <span>{{ $incidente->tiempo_total }} hrs</span>
            </div>

        </div>
    </div>


    {{-- ================= DESCRIPCIÓN ================= --}}
    <div class="seccion">
        <h4>DESCRIPCIÓN DEL INCIDENTE</h4>

        <div class="descripcion-box">
            {{ $incidente->descripcion }}
        </div>
    </div>


    {{-- ================= ACCIONES CORRECTIVAS ================= --}}
    <div class="seccion">
        <h4>ACCIONES CORRECTIVAS</h4>

        <div class="descripcion-box">
            {{ $incidente->acciones_correctivas }}
        </div>
    </div>


    <div class="text-center mt-4 no-print">
        {{-- <button onclick="window.print()" class="btn btn-dark">
            Imprimir Reporte
        </button> --}}
        <a href="{{ route('incidentes.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </div>

</div>

@endsection