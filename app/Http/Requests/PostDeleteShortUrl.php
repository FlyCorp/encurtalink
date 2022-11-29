<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostDeleteShortUrl extends FormRequest
{
    
    public function rules()
    {
        return
            [
                'id' => 'required|exists:short_urls,id',
            ];
    }

    public function messages()
    {
        return [
            'id.required'                   => 'O id é obrigatório',
            'id.exists'                     => 'Link inexistente',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
