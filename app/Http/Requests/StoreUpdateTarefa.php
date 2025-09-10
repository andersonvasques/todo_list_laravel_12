<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateTarefa extends FormRequest
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
                'unique:tarefas'
            ],
        ];

        if ($this->method() === 'PATCH' || $this->method() === 'PUT') {
            $rules['titulo'] = [
                'required',
                'min:3',
                'max:255',
                Rule::unique('tarefas')->ignore($this->id),
            ];
        }

        return $rules;
    }
}
