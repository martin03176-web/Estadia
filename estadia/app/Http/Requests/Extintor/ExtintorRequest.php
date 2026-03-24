<?php

namespace App\Http\Requests\Extintor;

use Illuminate\Foundation\Http\FormRequest;


class ExtintorRequest extends FormRequest
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
            'clave_id' => 'required|exists:claves,id',
            'numeracion' => 'required|string',
            'fecha_adquisicion' => 'required|date',
            'area_id' => 'required|exists:areas,id', 
            'tipo_id' => 'required|exists:tipos,id',
            'peso' => 'required|string',
            'ubicacion' => 'required|string',
            'lugar_referencia' => 'required|string', 
            'observaciones' => 'nullable|string',
            'condicion_extintor' => 'nullable|string',
        ];
    }
}
