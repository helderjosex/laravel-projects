<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ClientRequest;

class ClientUpdateRequest extends ClientRequest
{
    public function rules()
    {
        $id = $this->route('client');

        $rules = parent::rules();

        return array_merge($rules,[
            'cpf' => 'cpf|unique:clients,cpf,'.$id,
        ]);
    }
}
