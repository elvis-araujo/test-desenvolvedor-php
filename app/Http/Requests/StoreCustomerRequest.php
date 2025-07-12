<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'document' => 'required|string|unique:customers,document',
            'birth_date' => 'required|date',
            'sex' => 'required|in:M,F',
            'city_id' => 'required',
            'state_id' => 'required',
            'address' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser uma string.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',

            'document.required' => 'O CPF/CNPJ é obrigatório.',
            'document.string' => 'O documento deve ser um texto.',
            'document.unique' => 'Este documento já está cadastrado.',

            'birth_date.required' => 'A data de nascimento é obrigatória.',
            'birth_date.date' => 'Informe uma data de nascimento válida.',

            'sex.required' => 'O sexo é obrigatório.',
            'sex.in' => 'O sexo deve ser Masculino (M) ou Feminino (F).',

            'city_id.required' => 'A cidade é obrigatória.',
            'state_id.required' => 'O estado é obrigatório.',
            'address.required' => 'O endereço é obrigatório.',
        ];
    }
}
