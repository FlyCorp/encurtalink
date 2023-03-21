<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateUser extends FormRequest
{

    public function rules()
    {   //dd($this->all());
        return
            [
                'id'     => 'required|exists:users,id',
                'name'   => 'required',
                'email'  => 'required',
                'avatar' => 'mimes:jpeg,png,jpg|max:1024',
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
            //'avatar.required'        => 'O documento com foto é obrigatório',
            'avatar.image'           => 'Somente arquivos de imagem(jpeg,png,jpg)',
            'avatar.max'             => 'O tamanho máximo da imagem é de :max MB',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
