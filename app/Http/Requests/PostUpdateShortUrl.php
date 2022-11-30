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
        //dd($this->all());
        return
            [
                'id'          => 'required|exists:short_urls,id',
                'code'        => ($this->code_original!=$this->code)?'required|unique:short_urls,code,NULL':"",
                'link'        => 'required|url',
                'description' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'id.required'                     => 'O id é obrigatório',
            'id.exists'                       => 'Link inexistente',
            'code.required'                   => 'destino inexistente',
            'code.unique'                     => 'destino duplicado',
            'link.required'                   => 'O link é obrigatório',
            'link.url'                        => 'O link é inválido',
            //'link.unique'                     => 'Link duplicado',
            'description.required'            => 'A descrição é obrigatória',
            
        ];
    }

    public function authorize()
    {
        return true;
    }
}
