@extends('layouts.template')
@section('titulo','Reporte de Fumigación')

@section('contenido')
<style>
    /* --- ESTILOS DE VISUALIZACIÓN EN PANTALLA --- */
    .print-wrapper {
        background: #f4f4f4;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Contenedor que simula la hoja de papel */
    .paper-sheet {
        background: white;
        width: 21cm; /* Tamaño A4 Aproximado */
        min-height: 29.7cm;
        padding: 1.5cm;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        font-family: "Arial", sans-serif;
        color: #000;
        position: relative;
    }

    /* --- ESTRUCTURA DEL FORMATO TIPO TABLA --- */
    .header-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .header-table td { border: none; vertical-align: middle; }
    
    .logo-img { width: 80px; }
    .title-text { text-align: center; font-weight: bold; font-size: 14px; }

    .main-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }
    .main-table th, .main-table td {
        border: 1px solid #000;
        padding: 6px;
        font-size: 11px;
        text-align: center;
        overflow: hidden;
    }
    .bg-light-gray { background-color: #eded ed !important; font-weight: bold; }
    
    .text-left { text-align: left; }
    .signature-space { height: 50px; }

    /* --- CONFIGURACIÓN PARA IMPRESORA --- */
    @media print {
        @page {
            size: portrait;
            margin: 0;
        }
        nav, .navbar, .btn, .sidebar, footer, .d-print-none {
            display: none !important;
        }
        .print-wrapper {
            padding: 0;
            background: none;
        }
        .paper-sheet {
            box-shadow: none;
            width: 100%;
            margin: 0;
            padding: 1cm;
        }
        .bg-light-gray {
            background-color: #ededed !important;
            -webkit-print-color-adjust: exact;
        }
    }
</style>

<div class="print-wrapper">
    <div class="mb-3 d-print-none">
        <button onclick="window.print();" class="btn btn-dark btn-lg">
            <i class="fa-solid fa-print"></i> GENERAR HOJA DE IMPRESIÓN
        </button>
        <a href="{{ route('fumigaciones.index') }}" class="btn btn-outline-secondary btn-lg">Volver</a>
    </div>

    <div class="paper-sheet">
        <table class="header-table">
            <tr>
                <td style="width: 15%;">
                    <img src="{{ asset('assets/css/logotabla.png') }}" class="logo-img" alt="Logo">
                </td>
                <td class="title-text">
                    Programa de fumigación periodo vacacional de invierno 2025<br>
                    <span style="font-weight: normal; font-size: 12px;">Jueves 18 y Viernes 19 de Diciembre</span>
                </td>
                <td style="width: 15%;"></td>
            </tr>
        </table>

        <table class="main-table">
            <thead>
                <tr class="bg-light-gray">
                    <th style="width: 35%;">Área</th>
                    <th style="width: 7%;">Fecha</th>
                    <th style="width: 10%;">Horario</th>
                    <th style="width: 8%;">F. externa</th>
                    <th style="width: 8%;">F. interna</th>
                    <th style="width: 20%;">Nombre de quien recibe</th>
                    <th style="width: 12%;">Firma</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-light-gray">
                    <td colspan="7">{{ $fumigacion->area->nivel ?? 'Edificio' }}</td>
                </tr>
                
                <tr>
                    <td class="text-left">{{ $fumigacion->area->lugar_especifico ?? 'N/A' }}</td>
                    <td>
                        @php 
                            $diaNum = \Carbon\Carbon::parse($fumigacion->fecha)->dayOfWeek;
                            $letra = ($diaNum == 4) ? 'J' : (($diaNum == 5) ? 'V' : '-');
                        @endphp
                        {{ $letra }}
                    </td>
                    <td>{{ $fumigacion->hora ?? 'N/A' }}</td>
                    <td></td> <td></td> <td>
                        {{ $fumigacion->observaciones == 'Cerrada' ? 'Cerrada' : ($fumigacion->responsableTitular->nombre ?? '') }}
                    </td>
                    <td class="signature-space"></td>
                </tr>

                @if($fumigacion->observaciones && $fumigacion->observaciones != 'Cerrada')
                <tr>
                    <td colspan="5"></td>
                    <td colspan="2" style="font-style: italic; font-size: 10px; text-align: left;">
                        {{ $fumigacion->observaciones }}
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

        <div style="margin-top: 50px; font-size: 10px; color: #666; text-align: right;">
            Documento generado por el Sistema de Gestión de Fumigación el {{ date('d/m/Y H:i') }}
        </div>
    </div>
</div>
@endsection