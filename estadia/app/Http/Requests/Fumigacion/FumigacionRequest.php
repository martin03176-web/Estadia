<?php

namespace App\Http\Requests\Fumigacion;

use Illuminate\Foundation\Http\FormRequest;

class FumigacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tipo' => 'nullable|string|in:programada,extemporanea',
            'periodo_id' => 'nullable|exists:fumigacion_periodos,id',
            'responsble_servicio_id' => 'required|exists:responsables,id',
            'area_id' => 'required|exists:areas,id',
            'responsable_titular_id' => 'required|exists:responsables,id',
            'fecha' => 'required',
            'hora' => 'required',
            'motivo_id' => 'required|exists:motivos,id',
            'responsable_contingencia_id' => 'required|exists:responsables,id',
            'equipo_fumigacion_id' => 'required|exists:equipo_fumigacions,id',
            'responsable_fumigacion_id' => 'required|exists:responsables,id',
        ];
    }

    public function messages(): array
    {
        return [
            'responsble_servicio_id.required' => 'El responsable del servicio es obligatorio',
            'area_id.required' => 'El área es obligatoria',
            'responsable_titular_id.required' => 'El responsable titular es obligatorio',
            'fecha.required' => 'La fecha es obligatoria',
            'hora.required' => 'La hora es obligatoria',
            'motivo_id.required' => 'El motivo es obligatorio',
            'responsable_contingencia_id.required' => 'El responsable ante contingencia es obligatorio',
            'equipo_fumigacion_id.required' => 'El equipo de fumigación es obligatorio',
            'responsable_fumigacion_id.required' => 'El responsable de fumigación es obligatorio',
        ];
    }
}