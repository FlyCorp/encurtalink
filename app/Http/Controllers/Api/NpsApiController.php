<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NpsApiReceive;
use App\Http\Sanitizers\SanitizerNps;
use App\NpsLink;
use App\Jobs\ProcessNpsJob;
use Illuminate\Support\Carbon;

/**
 * @OA\Info(
 *     title="API encurtador de links",
 *     description="Documentação de API's da aplicação",
 *     version="1.0"
 * )
 *
 * @OA\Tag(
 *     name="NPS",
 *     description="Endpoints de API relacionados ao Net Promoter Score"
 * )
 */
class NpsApiController extends Controller
{
    protected $npsLink, $sanitizerNps;

    public function __construct()
    {
        $this->npsLink = new NpsLink;
        $this->sanitizerNps = new SanitizerNps;
    }

    /**
     * @OA\Post(
     *     path="/api/nps/receive",
     *     tags={"NPS"},
     *     summary="Registrar envio de NPS para determinada campanha",
     *     description="Programando o envio de NPS para campanhas previamnente fornecidas, ao publico alvo da companhia.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="Campaign_name",
     *                     type="string",
     *                     description="Título da campanha",
     *                     example="Vendas B2B"
     *                 ),
     *                 @OA\Property(
     *                     property="Client_name",
     *                     type="string",
     *                     description="Nome do cliente",
     *                     example="Jane Doe"
     *                 ),
     *                 @OA\Property(
     *                     property="Client_document",
     *                     type="string",
     *                     description="Documento do cliente",
     *                     example="12027042636"
     *                 ),
     *                 @OA\Property(
     *                     property="Client_representant",
     *                     type="string",
     *                     description="Representante do cliente",
     *                     example="Fulano de tal"
     *                 ),
     *                 @OA\Property(
     *                     property="Client_uf",
     *                     type="string",
     *                     description="Sigla do estado ao qual o cliente pertence",
     *                     example="MG"
     *                 ),
     *                 @OA\Property(
     *                     property="Client_city",
     *                     type="string",
     *                     description="Cidade à qual o cliente pertence",
     *                     example="Ipatinga"
     *                 ),
     *                 @OA\Property(
     *                     property="Order_company",
     *                     type="string",
     *                     description="Unidade de origem do pedido",
     *                     example="Central Farma"
     *                 ),
     *                 @OA\Property(
     *                     property="Order_number",
     *                     type="string",
     *                     description="Número do pedido",
     *                     example="123456"
     *                 ),
     *                 @OA\Property(
     *                     property="Order_value",
     *                     type="string",
     *                     description="Valor total do pedido",
     *                     example="580.00"
     *                 ),
     *                 @OA\Property(
     *                     property="Order_date",
     *                     type="string",
     *                     format="date",
     *                     description="Data de faturamento do pedido",
     *                     example="2023-12-13"
     *                 ),
     *                 @OA\Property(
     *                     property="Config_process-in",
     *                     type="string",
     *                     format="date-time",
     *                     description="Data e hora para processamento de envio",
     *                     example="2023-12-13 14:00"
     *                 ),
     *                 @OA\Property(
     *                     property="Config_gateway",
     *                     type="string",
     *                     description="Gateway de envio",
     *                     example="TakeBlip"
     *                 ),
     *                 @OA\Property(
     *                     property="Gateway_channel",
     *                     type="string",
     *                     description="Gateway de envio",
     *                     example="Nao estereis"
     *                 ),
     *                 @OA\Property(
     *                     property="Config_number",
     *                     type="string",
     *                     description="Número de telefone do cliente",
     *                     example="5531993714728"
     *                 ),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(response="200", description="Nps processado com sucesso"),
     *     @OA\Response(response="422", description="Um ou mais campos inválidos")
     * )
     */
    public function receive(NpsApiReceive $request)
    {
        $data = $this->sanitizerNps->postReceive($request->validated());

        $nps = $this->npsLink
        ->where("campaign_name", $data["campaign_name"])
        ->where("config_gateway", $data["config_gateway"])
        ->where("config_number", $data["config_number"])
        ->whereDate("created_at", Carbon::today()) // Adicione esta condição
        ->firstOr(function () use($data){
            return $this->npsLink->create($data);
        });

        switch ($nps->wasRecentlyCreated) {
            case false:
                $nps->update($data);
                break;

            default:
                ProcessNpsJob::dispatch($nps->id)->delay(Carbon::parse($nps->config_process_in));
                break;
        }

        return response()->json([
            "status" => "success",
            "data" => [
                "link" => route("nps.show", ["uuid" => $nps->uuid])
            ],
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/nps/homolog",
     *     tags={"NPS"},
     *     summary="Registrar envio de NPS para determinada campanha",
     *     description="Programando o envio de NPS para campanhas previamnente fornecidas, ao publico alvo da companhia.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="Campaign_name",
     *                     type="string",
     *                     description="Título da campanha",
     *                     example="Vendas B2B"
     *                 ),
     *                 @OA\Property(
     *                     property="Client_name",
     *                     type="string",
     *                     description="Nome do cliente",
     *                     example="Jane Doe"
     *                 ),
     *                 @OA\Property(
     *                     property="Client_document",
     *                     type="string",
     *                     description="Documento do cliente",
     *                     example="12027042636"
     *                 ),
     *                 @OA\Property(
     *                     property="Client_representant",
     *                     type="string",
     *                     description="Representante do cliente",
     *                     example="Fulano de tal"
     *                 ),
     *                 @OA\Property(
     *                     property="Client_uf",
     *                     type="string",
     *                     description="Sigla do estado ao qual o cliente pertence",
     *                     example="MG"
     *                 ),
     *                 @OA\Property(
     *                     property="Client_city",
     *                     type="string",
     *                     description="Cidade à qual o cliente pertence",
     *                     example="Ipatinga"
     *                 ),
     *                 @OA\Property(
     *                     property="Order_company",
     *                     type="string",
     *                     description="Unidade de origem do pedido",
     *                     example="Central Farma"
     *                 ),
     *                 @OA\Property(
     *                     property="Order_number",
     *                     type="string",
     *                     description="Número do pedido",
     *                     example="123456"
     *                 ),
     *                 @OA\Property(
     *                     property="Order_value",
     *                     type="string",
     *                     description="Valor total do pedido",
     *                     example="580.00"
     *                 ),
     *                 @OA\Property(
     *                     property="Order_date",
     *                     type="string",
     *                     format="date",
     *                     description="Data de faturamento do pedido",
     *                     example="2023-12-13"
     *                 ),
     *                 @OA\Property(
     *                     property="Config_process-in",
     *                     type="string",
     *                     format="date-time",
     *                     description="Data e hora para processamento de envio",
     *                     example="2023-12-13 14:00"
     *                 ),
     *                 @OA\Property(
     *                     property="Config_gateway",
     *                     type="string",
     *                     description="Gateway de envio",
     *                     example="TakeBlip"
     *                 ),
     *                 @OA\Property(
     *                     property="Gateway_channel",
     *                     type="string",
     *                     description="Gateway de envio",
     *                     example="Nao estereis"
     *                 ),
     *                 @OA\Property(
     *                     property="Config_number",
     *                     type="string",
     *                     description="Número de telefone do cliente",
     *                     example="5531993714728"
     *                 ),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(response="200", description="Nps processado com sucesso"),
     *     @OA\Response(response="422", description="Um ou mais campos inválidos")
     * )
     */
    public function homolog(NpsApiReceive $request)
    {
        $data = $this->sanitizerNps->postReceive($request->validated());

        return response()
        ->json([
            "status" => "success",
            "data"   => $data
        ], 200);
    }
}
