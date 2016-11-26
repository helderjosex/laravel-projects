<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:45',
            'cpf' => 'cpf|unique:clients',
            'birthdate' => 'date|date_format:Y-m-d',
        ];
    }

    public function response(array $errors)
    {
        return response()->json($errors, 422);
    }

    public function messages()
    {
        return [
            'cpf.cpf' => 'CPF inválido',
        ];
    }

}
