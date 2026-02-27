<?php

namespace App\Http\Requests\Area;

use Illuminate\Foundation\Http\FormRequest;


class CreateAreaRequest extends FormRequest
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
            'edificio' => 'required|string|max:100',
            'piso' =>'required|string|max:100',
            'lugar' =>'required|string|max:100',
            'nota' =>'nullable|string|max:100',
        ];
    }
}
