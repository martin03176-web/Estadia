<?php

namespace App\Http\Requests\Atencion;

use Illuminate\Foundation\Http\FormRequest;

class AtencionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
    return [
        'paciente_id'          => 'required|exists:pacientes,id',
        'edad'                 => 'required|integer|min:0|max:120',
        'semestre'             => 'nullable|string|max:50',
        'hora_atencion'        => 'required|date_format:H:i',
        'frecuencia_cardiaca'  => 'required|numeric|min:0',
        'frecuencia_respiratoria' => 'required|numeric|min:0',
        'tension_sistolica'    => 'nullable|numeric|min:0',
        'tension_diastolica'   => 'nullable|numeric|min:0',
        'temperatura'          => 'required|numeric|min:0',
        'oxigenacion'          => 'required|numeric|min:0|max:100',
        'glucemia'             => 'required|numeric|min:0',
        'signos_sintomas'      => 'nullable|string',
        'alergias'             => 'required|string|max:255',
        'medicamento'          => 'nullable|string|max:255',
        'patologia'            => 'nullable|string',
        'ultimo_alimento'      => 'nullable|string',
        'eventos_previos'      => 'nullable|string',
        'destino'              => 'required|in:Se retira por sus propios medios,Acompañado por familiar/amigo,Traslado a servicio medico interno,Traslado en ambulancia,Traslado a la unidad de cuidados',
    ];
}
}
