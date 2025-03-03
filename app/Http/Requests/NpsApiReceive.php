<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NpsMonthRating;
use App\Rules\ValidCellphone;

use Illuminate\Contracts\Validation\Validator as ValidatorContract;

class NpsApiReceive extends FormRequest
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
            'Campaign_name'      => [
                'required',
                new NpsMonthRating('campaign_name', [
                    'config_gateway' => $this->input('Config_gateway'),
                    'config_number' => $this->input('Config_number'),
                ]),
            ],
            'Client_name'        => 'required',
            'Client_document'    => 'required',
            'Client_representant'    => 'required',
            'Client_uf' => [
                'required',
                'in:AC,AL,AM,AP,BA,CE,DF,ES,GO,MA,MG,MS,MT,PA,PB,PE,PI,PR,RJ,RN,RO,RR,RS,SC,SE,SP,TO',
            ],
            'Client_city'    => 'required',
            'Order_company'     => [
                'required',
                Rule::in(['Central Farma', 'Central Farma - Ipatinga', 'Central Farma - Caratinga', 'Central Farma - Injetáveis', 'Central Nutrition', 'Harmonize']),
            ],
            'Order_number'    => 'required',
            'Order_value' => [
                'required',
                'numeric',
            ],
            'Order_date' => [
                'required',
                'date_format:Y-m-d',
            ],
            'Config_process-in' => [
                'required',
                'date_format:Y-m-d H:i',
            ],
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
        ];
    }

    public function messages()
    {
        return [
            'Campaign_name.required' => 'O nome da campanha é obrigatório',
            'Client_name.required' => 'O nome do cliente é obrigatório',
            'Client_document.required' => 'O documento do cliente é obrigatório',
            'Client_representant.required' => 'O representante do cliente é obrigatório',
            'Client_uf.required' => 'A UF do cliente é obrigatória',
            'Client_uf.in' => 'A UF do cliente deve ser uma sigla válida de estados do Brasil',
            'Client_city.required' => 'A cidade do cliente é obrigatória',
            'Order_company.required' => 'A filial do pedido é obrigatória',
            'Order_company.in' => 'A filial do pedido deve ser "Central Farma" ou "Central Nutrition"',
            'Order_number.required' => 'O n° do pedido é obrigatório',
            'Order_value.required' => 'O valor do pedido é obrigatório',
            'Order_value.numeric' => 'O valor do pedido deve ser numérico',
            'Order_date.required' => 'A data do pedido é obrigatória',
            'Config_process-in.date_format' => 'O formato da data de processamento deve ser Y-m-d',
            'Config_process-in.required' => 'A data de processamento é obrigatória',
            'Config_process-in.date_format' => 'O formato da data de processamento deve ser Y-m-d H:i',
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
