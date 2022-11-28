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
                'id'          => 'required|exists:short_urls,id',
                'link'        => 'required|url|unique:short_urls,link,NULL,id,deleted_at,NULL',
                'description' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'id.required'                     => 'O id é obrigatório',
            'id.exists'                       => 'Link inexistente',
            'link.required'                   => 'O link é obrigatório',
            'link.url'                        => 'O link é inválido',
            'link.unique'                     => 'Link duplicado',
            'description.required'            => 'A descrição é obrigatória',
            
        ];
    }

    public function authorize()
    {
        return true;
    }
}
