<?php

namespace App\Http\Requests\Paciente;

use Illuminate\Foundation\Http\FormRequest;


class CreatePacienteRequest extends FormRequest
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
            'nombre' => 'required|string|max:100',
            'edad' =>'required|integer|min:4|max:100',
            'sexo' =>'required|in:Masculino,Femenino,Otro',
            'telefono' =>'nullable|string|max:15',
            'codigo' =>'required|string|max:20',
            'carrera_area' =>'required|string|max:100',
            'semestre' =>'required|string|max:100',
        ];
    }
}
