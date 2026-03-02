<?php

namespace App\Http\Requests\Incidente;

use Illuminate\Foundation\Http\FormRequest;


class CreateIncidenteRequest extends FormRequest
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
    public function rules(): array
    {
        return [ 
            'asunto' => 'required|string|max:1000',
            'fecha' => 'required|date',
            'area_id' => 'required|exists:areas,id', 
            'responsable_id' => 'required|exists:responsables,id',
            'tipo_incidente_id' => 'required|exists:tipo_incidentes,id',
            'tipo_riesgo_id' => 'required|exists:tipo_riesgos,id',
            'descripcion' => 'required|string|max:5000', 
            'nivel_riesgo_id' => 'required|exists:nivel_riesgos,id',
            'acciones_correctivas' => 'required|string|max:5000',
            'material_equipo_id' => 'required|exists:material_equipos,id',
            'tiempo_total' => 'required|string|max:100',
        ];
    }
}
