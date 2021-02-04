<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function rules()
    {
        return [
            "email" => ['required', 'email'],
            "password" => ['required', 'min:3', 'max:20'],
        ];
    }

    public function messages(){

        return [
            'email.required' => 'Email é de preenchimento obrigatório',
            'email.email' => 'Favor digite um email válido',
            'password.required' => 'Senha é obrigatória',
            'password.min' => 'A senha tem que ter no mínimo :min caracteres',
            'password.max' => 'A senha tem que ter no mínimo :max caracteres'
        ];

    }
}
