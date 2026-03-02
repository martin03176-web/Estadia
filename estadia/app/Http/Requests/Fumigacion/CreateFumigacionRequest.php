<?php

namespace App\Http\Requests\Fumigacion;

use Illuminate\Foundation\Http\FormRequest;


class CreateFumigacionRequest extends FormRequest
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
            'responsble_servicio_id' => 'required|exists:responsables,id',
            'area_id' => 'required|exists:areas,id',
            'responsable_titular_id' => 'required|exists:responsables,id',
            'fecha' => 'required|date',
            'asunto' => 'required|string|max:1000',
            'responsable_contingencia_id' => 'required|exists:responsables,id',
            'equipo_fumigacion_id' => 'required|exists:tipo_Fumigacions,id',
            'responsable_fumigacion_id' => 'required|exists:responsables,id',
        ];
    }
}
