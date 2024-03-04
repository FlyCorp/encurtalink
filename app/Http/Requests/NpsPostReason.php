<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class NpsPostReason extends FormRequest
{

    protected function prepareForValidation()
    {

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reason_channel'     => [
                'nullable',
                Rule::in(['atendimento', 'entrega', 'qualidade', 'outros']),
            ],
            'reason_description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'reason_channel.required' => 'O motivo do voto é obrigatório',
            'reason_channel.in' => 'O motivo do voto deve ser (atendimento, entrega, qualidade ou outros)',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
