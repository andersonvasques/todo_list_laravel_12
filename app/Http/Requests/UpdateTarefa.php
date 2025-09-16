<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTarefa extends FormRequest
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
        $rules = [
            'titulo' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('tarefas')->ignore($this->id),
            ],
            'id' => [
                'required',
                'integer'
            ],
            'status' => [
                'required'
            ],
            'id_user' => [
                'integer'
            ],
        ];

        return $rules;
    }
}
