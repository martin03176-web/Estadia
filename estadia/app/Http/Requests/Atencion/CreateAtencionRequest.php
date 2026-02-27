<?php

namespace App\Http\Requests\Atencion;

use Illuminate\Foundation\Http\FormRequest;

class CreateAtencionRequest extends FormRequest
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
            'paciente_id' => 'required|exists:pacientes,id', 
            'edad' =>'required|string|max:50',
            'semestre' =>'nullable|string|max:50',
            'hora_atencion' =>'required|string|max:10',
            'frecuencia_cardiaca' =>'required|string| max:100',
            'frecuencia_respiratoria' =>'required|string|max:100',
            'tension_sistolica' =>'nullable|string|max:100',
            'tension_diastolica' =>'nullable|string|max:100',
            'temperatura' =>'required|string|max:100',
            'oxigenacion' => 'required|string|max:100',
            'glucemia' =>'required|string|max:100',
            'signos_sintomas' =>'required|string| max:100',
            'alergias' =>'required|string|max:100',
            'medicamento' =>'required|string|max:100',
            'patologia' =>'required|string|max:100',
            'ultimo_alimento' =>'required|string|max:100',
            'eventos_previos' =>'required|string|max:100',
            'destino' =>'required|string|max:100',
        ];
    }
}
