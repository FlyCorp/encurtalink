<?php

namespace App\Utils;

use GuzzleHttp\Client;
use App\Services\ApiClient;

class MaisChatApiUtil
{
    protected $apiClient, $channel;
    protected $maisChatClient;

    protected $headers, $config;

    /**
     * Undocumented function
     */
    public function __construct($channel = "Estereis")
    {
        $this->apiClient = new ApiClient('https://apimaischat.maischat.io/v2/');
        $this->channel = $channel;

        $this->headers = [
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . ($this->channel == "Estereis" ? config('maischat.estereis.authorization') : config('maischat.nao_estereis.authorization')),
        ];

        switch ($channel) {
            case 'Nao estereis':
                $this->config = [
                    "appId" => config('maischat.nao_estereis.appid'),
                    "source" => config('maischat.nao_estereis.source'),
                    "token" => config('maischat.nao_estereis.token'),
                ];
                break;

            default:
                $this->config = [
                    "appId" => config('maischat.estereis.appid'),
                    "source" => config('maischat.estereis.source'),
                    "token" => config('maischat.estereis.token'),
                ];
                break;
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getBroker()
    {
        return $this->apiClient->request('msg/brokers', 'GET', [], $this->headers, 10, 30);
    }

    public function dispatch($endpoint, $method = 'GET', $data = [], $headers = [], $connectTimeout = null, $timeout = null)
    {
        $client = new Client([
            'base_uri' => 'https://apimaischat.maischat.io/v2/',
            'timeout' => $timeout,
            'connect_timeout' => $connectTimeout,
        ]);

        $options = array_merge([
            'headers' => $headers
        ], $data);

        $response = $client->request($method, $endpoint, $options);

        return json_decode($response->getBody(), true);
    }

    public function sendTemplateMetaCloud(array $data, string $broker = "wppCloudAPI")
    {

            $json = array_merge(
                $this->config,
                [
                    "type" => "apiTemplate",
                    "broker" => $broker,
                    "destination" => $data['pacient_whatsapp'],
                    "template" => [
                        "name" => "nps_360v2",
                        "language" => "pt_BR",
                        "components" => [
                            [
                                "type" => "BUTTON",
                                "sub_type" => "url",
                                "index" => "0",
                                "parameters" => [
                                    [
                                        "type" => "text",
                                        "text" => $data['uuid']
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            );

            $params = [
                'body'  => json_encode($json)
            ];

            return $this->dispatch("msg/template/{$broker}", 'POST', $params, $this->headers, 30, 60);
    }

}
