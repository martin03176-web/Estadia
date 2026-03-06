@extends('layouts.template')

@section('titulo','Expediente clínico')

@section('estilos')
<style>
    .expediente-container{
        max-width: 1100px;
        margin: auto;
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,.1);
        font-size: 14px;
    }

    .titulo-expediente{
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
        background: #ffe9e9;
        color: rgb(0, 0, 0);
        padding: 6px 10px;
        font-size: 15px;
        margin-bottom: 10px;
    }

    .grid-2{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px 30px;
    }

    .campo{
        display: flex;
        justify-content: space-between;
        border-bottom: 1px dotted #999;
        padding: 3px 0;
    }

    .label{
        font-weight: 600;
    }

    @media print{
        body{
            background: white;
        }
        .no-print{
            display: none;
        }
    }
</style>
@endsection


@section('contenido')

<div class="expediente-container">

    <div class="titulo-expediente">
        EXPEDIENTE DE ATENCIÓN MÉDICA
    </div>

    {{-- ================= PACIENTE ================= --}}
    <div class="seccion">
        <h4>DATOS DEL PACIENTE</h4>

        <div class="grid-2">
            <div class="campo">
                <span class="label">Nombre:</span>
                <span>{{ $atencion->paciente->nombre }}</span>
            </div>

            <div class="campo">
                <span class="label">Sexo:</span>
                <span>{{ $atencion->paciente->sexo }}</span>
            </div>

            <div class="campo">
                <span class="label">Edad:</span>
                <span>{{ $atencion->edad }}</span>
            </div>

            <div class="campo">
                <span class="label">Teléfono:</span>
                <span>{{ $atencion->paciente->telefono }}</span>
            </div>

            <div class="campo">
                <span class="label">Código:</span>
                <span>{{ $atencion->paciente->codigo }}</span>
            </div>

            <div class="campo">
                <span class="label">Carrera / Área:</span>
                <span>{{ $atencion->paciente->carrera_area }}</span>
            </div>

            <div class="campo">
                <span class="label">Semestre:</span>
                <span>{{ $atencion->semestre }}</span>
            </div>
        </div>
    </div>

    {{-- ================= SIGNOS VITALES ================= --}}
    <div class="seccion">
        <h4>SIGNOS VITALES</h4>

        <div class="grid-2">

            <div class="campo">
                <span class="label">Hora de atención:</span>
                <span>{{ $atencion->hora_atencion }}</span>
            </div>

            <div class="campo">
                <span class="label">Frecuencia cardiaca:</span>
                <span>{{ $atencion->frecuencia_cardiaca }} lpm</span>
            </div>

            <div class="campo">
                <span class="label">Frecuencia respiratoria:</span>
                <span>{{ $atencion->frecuencia_respiratoria }} rpm</span>
            </div>

            <div class="campo">
                <span class="label">Tensión arterial:</span>
                <span>
                    {{ $atencion->tension_sistolica }}/
                    {{ $atencion->tension_diastolica }} mmHg
                </span>
            </div>

            <div class="campo">
                <span class="label">Temperatura:</span>
                <span>{{ $atencion->temperatura }} °C</span>
            </div>

            <div class="campo">
                <span class="label">Oxigenación:</span>
                <span>{{ $atencion->oxigenacion }} %</span>
            </div>

            <div class="campo">
                <span class="label">Glucemia:</span>
                <span>{{ $atencion->glucemia }} mg/dL</span>
            </div>

        </div>
    </div>

    {{-- ================= SAMPLE ================= --}}
    <div class="seccion">
        <h4>VALORACIÓN MÉTODO SAMPLE</h4>

        <div class="campo">
            <span class="label">Signos y síntomas:</span>
            <span>{{ $atencion->signos_sintomas }}</span>
        </div>

        <div class="campo">
            <span class="label">Alergias:</span>
            <span>{{ $atencion->alergias }}</span>
        </div>

        <div class="campo">
            <span class="label">Medicamentos:</span>
            <span>{{ $atencion->medicamento }}</span>
        </div>

        <div class="campo">
            <span class="label">Patologías:</span>
            <span>{{ $atencion->patologia }}</span>
        </div>

        <div class="campo">
            <span class="label">Último alimento:</span>
            <span>{{ $atencion->ultimo_alimento }}</span>
        </div>

        <div class="campo">
            <span class="label">Eventos previos:</span>
            <span>{{ $atencion->eventos_previos }}</span>
        </div>

    </div>

    {{-- <div class="text-center mt-3 no-print">
        <button onclick="window.print()" class="btn btn-primary">
            Imprimir Expediente
        </button>
    </div> --}}

</div>

@endsection