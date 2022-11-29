<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateUser extends FormRequest
{

    protected function prepareForValidation()
    { }

    public function rules()
    {
        return
            [
                'name'  => 'required',
                'email' => 'required|unique:users,email',
            ];
    }

    public function messages()
    {
        return [
            'name.required'                     => 'O nome é obrigatório',
            'email.required'                    => 'O email é obrigatório',
            'email.exists'                      => 'E-mail duplicado',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
