<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateShortUrl extends FormRequest
{

    protected function prepareForValidation()
    {

    }

    public function rules()
    {
        /* |unique:short_urls,link,NULL,id,deleted_at,NULL */
        return
            [
                'link'        => 'required|url',
                'description' => 'required',
                'script_header' => 'nullable',
                'script_body' => 'nullable',
            ];
    }

    public function messages()
    {
        return [
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
