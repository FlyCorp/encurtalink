<?php

namespace App\Utils;

use GuzzleHttp\Client;
use App\Services\ApiClient;

class MaisChatApiUtil
{
    protected $apiClient;
    const AUTHORIZATION    = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0ZW5hbnQiOiI2NTIwM2FjNTZkZDRmMzBmNGFmNzUwMDUiLCJuYW1lIjoiQ2VudHJhbCBGYXJtYSIsImNucGoiOiIwMzIzMDc3MTAwMDE2MyIsImlhdCI6MTY5NjYxMTAxM30.w58uEcMtqYUnXoLsi8D19quIUKe_Yd_2hsaVpJdhxbc";
    protected $maisChatClient;

    protected $headers = [
        'Accept'                => 'application/json',
        'Content-Type'          => 'application/json',
        'Authorization'         => "Bearer " . self::AUTHORIZATION,
    ];

    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient('https://apimaischat.maischat.io/v2/');
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
            $json = sprintf('{
                    "type": "apiTemplate",
                    "broker": "wppCloudAPI",
                    "appId": "149582271566762",
                    "source": "553138012040",
                    "destination": "%s",
                    "token": "EAASYWLJqc1YBO1jOZB26n6StKhcZCKCkAYm2GUbEKnaUsVLgvd5ftcx7NK6IEwYX3ESZAyK1IbaKZAHGoOdiviYMxnScJOXiydIbKbbO9O8ENPsb8bn0w6Y3FLsAn2Di6tXxNhOPEngiHrqxCcOkJp8P864J7r7E4G5LR6VZAb1sZBunZBwXcqDBdJ4e8l3mgyIbxBvhwZBckuZA7AF7z",
                    "template": {
                        "name": "nps_360v2",
                        "language": "pt_BR",
                        "components": [
                            {
                                "type": "BUTTON",
                                "sub_type": "url",
                                "index": "0",
                                "parameters": [
                                    {
                                        "type": "text",
                                        "text": %s
                                    }
                                ]
                            }
                        ]
                    }
                }',
                $data['pacient_whatsapp'],
                $data['uuid'],
            );

            $params = [
                'body'  => $json
            ];

            return $this->dispatch("msg/template/{$broker}", 'POST', $params, $this->headers, 30, 60);
    }

}
