<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NpsMonthRating;
use App\Rules\ValidCellphone;

use Illuminate\Contracts\Validation\Validator as ValidatorContract;

class NpsApiUpdate extends FormRequest
{

    protected function prepareForValidation()
    {

    }

    protected function failedValidation(ValidatorContract $validator)
    {
        $response = response()->json([
            'message' => 'Os dados fornecidos são inválidos.',
            'errors' => $validator->errors(),
        ], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Campaign_name'      => 'required',
            'Config_gateway'     => [
                'required',
                Rule::in(['MaisChat', 'OctaDesk', 'TakeBlip']),
            ],
            'Gateway_channel' => [
                'required_if:Config_gateway,MaisChat',
                Rule::in(['Estereis', 'Nao estereis'])  ,
            ],
            'Config_number' => [
                'required',
                'numeric',
                new ValidCellphone
            ],
            'Order_company'     => [
                'required',
                Rule::in(['Central Farma', 'Central Farma - Ipatinga', 'Central Farma - Caratinga', 'Central Farma - Injetáveis', 'Central Nutrition', 'Harmonize']),
            ],
            'Order_number'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Campaign_name.required' => 'O nome da campanha é obrigatório',
            'Order_company.required' => 'A filial do pedido é obrigatória',
            'Order_company.in' => 'A filial do pedido deve ser uma das opções válidas',
            'Order_number.required' => 'O n° do pedido é obrigatório',
            'Config_gateway.required' => 'O gateway de disparo é obrigatório',
            'Config_gateway.in' => 'O valor do gateway de disparo deve ser "MaisChat", "OctaDesk" ou "TakeBlip"',
            'Gateway_channel.required_if' => 'O canal de gateway é obrigatório quando o gateway é "MaisChat"',
            'Gateway_channel.in' => 'O canal de gateway deve ser Estereis ou Nao estereis',
            'Config_number.required' => 'O telefone do destinatário é obrigatório',
            'Config_number.numeric' => 'O telefone deve conter apenas números',
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
