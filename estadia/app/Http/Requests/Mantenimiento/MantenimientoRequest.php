<?php

namespace App\Http\Requests\Mantenimiento;

use Illuminate\Foundation\Http\FormRequest;

class MantenimientoRequest extends FormRequest
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
    // App\Http\Requests\Mantenimiento\MantenimientoRequest.php
    public function rules(): array
    {
        return [
            'extintor_id' => 'required|exists:extintors,id', 
            'fecha' => 'required|date',
            'tipo' => 'required|string|max:20',
        ];
    }
}
