<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'user' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'O campo Usuário é Obrigatório!',
            'password.required' => 'O campo Senha é Obrigatório!',
        ];
    }
}