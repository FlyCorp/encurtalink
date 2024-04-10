<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateShortUrl extends FormRequest
{

    protected function prepareForValidation()
    {

    }

    public function rules()
    {

        return
            [
                'link'        => 'required|url',
                'code'        => 'required|unique:short_urls,code,' . request()->id,
                'description' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'id.required'                     => 'O id é obrigatório',
            'id.exists'                       => 'Link inexistente',
            'code.required'                   => 'Código inexistente',
            'code.unique'                     => 'Código duplicado',
            'link.required'                   => 'O link é obrigatório',
            'link.url'                        => 'O link é inválido',
            'description.required'            => 'A descrição é obrigatória',

        ];
    }

    public function authorize()
    {
        return true;
    }
}
