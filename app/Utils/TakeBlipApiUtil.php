<?php

namespace App\Utils;

use GuzzleHttp\Client;
use App\Services\ApiClient;

class TakeBlipApiUtil
{

    protected $apiClient;

    const  AUTHORIZATION    = 'Key Y2VudHJhbG51dHJpdGlvbnJvdGVhZG9yOnFieVVaaTV4ZjJqR3IzR2dpMDZU';

    protected $headers = [
        'Accept'          => 'application/json',
        'Content-Type'    => 'application/json',
        'Authorization'   => self::AUTHORIZATION,
    ];

    /**
    * Cria uma nova instância da classe TakeBlipApiUtil.
    *
    * @return void
    */
    public function __construct()
    {
        $this->apiClient = new ApiClient("https://msging.net");
    }

    public function dispatch($endpoint, $method = 'GET', $data = [], $headers = [], $connectTimeout = null, $timeout = null)
    {
        $client = new Client([
            'base_uri' => 'https://msging.net',
            'timeout' => $timeout,
            'connect_timeout' => $connectTimeout,
        ]);

        $options = [
            'headers' => $headers,
            'json' => $data,
            'verify' => false
        ];

        return $client->request($method, $endpoint, $options);
    }

    /**
    * Faz uma requisição POST para o endpoint /messages.
    *
    * @param array $params Parâmetros enviados na requisição.
    * @return array|null Retorna os dados da resposta em formato JSON em caso de sucesso, ou null em caso de erro.
    */
    public function messages(array $params)
    {
        #return $this->apiClient->request('/messages', 'POST', $params, $this->headers, 10, 30);
        return $this->dispatch('/messages', 'POST', $params, $this->headers, 10, 30);
    }

}
