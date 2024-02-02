<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
* Class ApiClient
*
* Responsável por fazer requisições HTTP para um endpoint específico de API.
*/
class ApiClient
{
    /**
    * URL base da API.
    *
    * @var string
    */
    protected $baseUrl;

    /**
    * Cria uma nova instância do ApiClient.
    *
    * @param string $baseUrl URL base da API.
    * @return void
    */
    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
    * Faz uma requisição HTTP para a API.
    *
    * @param string $endpoint Endpoint da API.
    * @param string $method (opcional, padrão: 'GET') Método HTTP da requisição.
    * @param array $data (opcional, padrão: []) Dados enviados na requisição.
    * @param array $headers (opcional, padrão: []) Headers da requisição.
    * @param int|null $connectTimeout (opcional) Tempo limite de conexão da requisição.
    * @param int|null $timeout (opcional) Tempo limite da requisição.
    * @return array|null Retorna os dados da resposta em formato JSON em caso de sucesso, ou null em caso de erro.
    */
    public function request($endpoint, $method = 'GET', $data = [], $headers = [], $connectTimeout = null, $timeout = null)
    {
        $http = Http::withOptions([
            'base_uri' => $this->baseUrl,
        ]);

        if ($connectTimeout !== null) {
            $http = $http->withOptions([
                'connect_timeout' => $connectTimeout,
            ]);
        }

        if ($timeout !== null) {
            $http = $http->withOptions([
                'timeout' => $timeout,
            ]);
        }

        $http = $http->withOptions([
            'verify' => false, // Ignora a verificação de certificado SSL
        ]);

        $response = $http->withHeaders($headers)->{$method}($endpoint, $data);

        $response->throw();// Lança uma exceção Illuminate\Http\Client\RequestException em caso de erro na requisição.

        return $response->json();
    }
}
