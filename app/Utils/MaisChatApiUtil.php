<?php

namespace App\Utils;

use GuzzleHttp\Client;
use App\Services\ApiClient;

class MaisChatApiUtil
{
    protected $apiClient, $channel;
    const AUTHORIZATION_ESTEREIS = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0ZW5hbnQiOiI2NWEwMzE5YTNmYjNkNDViMjdmMTljMmUiLCJuYW1lIjoiQ2VudHJhbCBJbmpldGF2ZWlzIiwiY25waiI6Ijc0NTMxMjk1MDAwMTY5IiwiaWF0IjoxNzA0OTk3Mjc0fQ.OwBCSUxg0pFlnqHtDTpmrK7eOfgxuxTUFblrVMk6lRo";
    const AUTHORIZATION_NAOESTEREIS    = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0ZW5hbnQiOiI2NTIwM2FjNTZkZDRmMzBmNGFmNzUwMDUiLCJuYW1lIjoiQ2VudHJhbCBGYXJtYSIsImNucGoiOiIwMzIzMDc3MTAwMDE2MyIsImlhdCI6MTY5NjYxMTAxM30.w58uEcMtqYUnXoLsi8D19quIUKe_Yd_2hsaVpJdhxbc";
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
            'Authorization' => 'Bearer ' . ($this->channel == "Estereis" ? self::AUTHORIZATION_ESTEREIS : self::AUTHORIZATION_NAOESTEREIS),
        ];

        switch ($channel) {
            case 'Nao estereis':
                $this->config = [
                    "appId" => "149582271566762",
                    "source" => "553138012040",
                    "token" => "EAASYWLJqc1YBO1jOZB26n6StKhcZCKCkAYm2GUbEKnaUsVLgvd5ftcx7NK6IEwYX3ESZAyK1IbaKZAHGoOdiviYMxnScJOXiydIbKbbO9O8ENPsb8bn0w6Y3FLsAn2Di6tXxNhOPEngiHrqxCcOkJp8P864J7r7E4G5LR6VZAb1sZBunZBwXcqDBdJ4e8l3mgyIbxBvhwZBckuZA7AF7z",
                ];
                break;

            default:
                $this->config = [
                    "appId" => "216551731543973",
                    "source" => "553190686031",
                    "token" => "EAAEFUAKCeZAUBOw4KgUL1Ls31EdmV4Wi623sCR0m0P05Q3VTGiXZBAHnQLfQ8L9HpmQxrPcHW6Bzz8dsOQBEqr5DWZAXBiD8jHgIPD26X5t4hISbVWW4RzRUaHXdzqQDVfcHmUZBHuT28ZCUOuUbBl5ZBzMy6UNKwUfzC1lZCIAZBJ8aHX0yNs5PL8SGAfbAtgs2",
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
                    "broker" => "wppCloudAPI",
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
