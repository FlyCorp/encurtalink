<?php

namespace App\Utils;

use GuzzleHttp\Client;
use App\Services\ApiClient;

class MaisChatApiUtil
{
    protected $apiClient, $channel, $company;
    protected $maisChatClient;

    protected $headers, $config;

    public function __construct($channel = "Estereis", $company = "cfarma")
    {
        $this->apiClient = new ApiClient('https://apimaischat.maischat.io/v2/');
        $this->channel = $channel;
        $this->company = $company;

        $this->headers = [
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAuthorizationToken(),
        ];

        $this->config = $this->getConfig();
    }

    private function getAuthorizationToken()
    {
        return $this->channel == "Estereis"
            ? config("maischat.{$this->company}.estereis.authorization")
            : config("maischat.{$this->company}.nao_estereis.authorization");
    }

    private function getConfig()
    {
        $configKey = $this->channel == "Nao estereis" ? "nao_estereis" : "estereis";

        return [
            "appId" => config("maischat.{$this->company}.{$configKey}.appid"),
            "source" => config("maischat.{$this->company}.{$configKey}.source"),
            "token" => config("maischat.{$this->company}.{$configKey}.token"),
        ];
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
                        "name" => config("maischat.{$this->company}.default_template"),
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
