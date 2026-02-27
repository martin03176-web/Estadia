<?php

namespace App\Http\Requests\Responsable;

use Illuminate\Foundation\Http\FormRequest;


class CreateResponsableRequest extends FormRequest
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
            'telefono' =>'nullable|string|max:15',
            'puesto_area' =>'required|string|max:100',
            'nota' =>'nullable|string|max:100',
        ];
    }
}
