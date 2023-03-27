<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditUrlConfig extends FormRequest
{

    protected function prepareForValidation()
    {

    }

    public function rules()
    {
        return
            [
                'description'   => 'required',
                'value'         => 'required',
            ];
    }

    public function messages()
    {
        return [
            'description.required'    => 'A descrição é obrigatória',
            'value.required'          => 'O valor é obrigatório',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
