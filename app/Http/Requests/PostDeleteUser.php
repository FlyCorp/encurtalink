<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostDeleteUser extends FormRequest
{
    
    public function rules()
    {
        return
            [
                'id' => 'required|exists:users,id',
            ];
    }

    public function messages()
    {
        return [
            'id.required'                   => 'O id é obrigatório',
            'id.exists'                     => 'Usuário inexistente',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
