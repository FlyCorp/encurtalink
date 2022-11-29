<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateUser extends FormRequest
{

    public function rules()
    {
        return
            [   
                'id'    => 'required|exists:users,id',
                'name'  => 'required',
                'email' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'id.required'                       => 'O id é obrigatório',
            'id.exists'                         => 'usuário inexistente',
            'name.required'                     => 'O nome é obrigatório',
            'email.required'                    => 'O email é obrigatória',
            'email.exists'                      => 'E-mail duplicado',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
