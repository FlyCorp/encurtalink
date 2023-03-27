<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateUrlConfig extends FormRequest
{

    protected function prepareForValidation()
    {

    }

    public function rules()
    {
        return
            [
                'description'   => 'required',
                'key'           => 'required',
                'value'         => 'required',
            ];
    }

    public function messages()
    {
        return [
            'description.required'    => 'A descrição é obrigatória',
            'key.required'            => 'A chave é obrigatória',
            'value.required'          => 'O valor é obrigatório',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
