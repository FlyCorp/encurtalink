<?php

namespace Tests\Unit;

use Tests\TestCase;

class MaisChatUnidadeCaratingaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testValidaChaveEnvComConfigAuthNaoEstereis()
    {
        $this->assertNotNull(config('maischat.caratinga.nao_estereis.authorization'), 'A configuração maischat.caratinga.nao_estereis.authorization não pode ser nula.');
        $this->assertSame(
            env('AUTHORIZATION_NAOESTEREIS_CARATINGA'),
            config('maischat.caratinga.nao_estereis.authorization')
        );
    }

    public function testValidaChaveEnvComConfigAppIdNaoEstereis()
    {
        $this->assertNotNull(config('maischat.caratinga.nao_estereis.appid'), 'A configuração maischat.caratinga.nao_estereis.appid não pode ser nula.');
        $this->assertSame(
            env('APP_ID_NAOESTEREIS_CARATINGA'),
            config('maischat.caratinga.nao_estereis.appid')
        );
    }

    public function testValidaChaveEnvComConfigSourceNaoEstereis()
    {
        $this->assertNotNull(config('maischat.caratinga.nao_estereis.source'), 'A configuração maischat.caratinga.nao_estereis.source não pode ser nula.');
        $this->assertSame(
            env('SOURCE_NAOESTEREIS_CARATINGA'),
            config('maischat.caratinga.nao_estereis.source')
        );
    }

    public function testValidaChaveEnvComConfigTokenNaoEstereis()
    {
        $this->assertNotNull(config('maischat.caratinga.nao_estereis.token'), 'A configuração maischat.caratinga.nao_estereis.token não pode ser nula.');
        $this->assertSame(
            env('TOKEN_NAOESTEREIS_CARATINGA'),
            config('maischat.caratinga.nao_estereis.token')
        );
    }

    public function testEnvioDeNpsUsandoPayloadNaoEstereis()
    {
        $payload = [
            "Campaign_name" => sprintf("Teste Envio Central Farma - Caratinga %s", uniqid()),
            "Client_name" => "Jhon Doe",
            "Client_document" => uniqid(),
            "Client_representant" => "Paulo Paixão",
            "Client_uf" => "MG",
            "Client_city" => "Ipatinga",
            "Order_company" => "Central Farma - Caratinga",
            "Order_number" => "123456",
            "Order_value" => "580.00",
            "Order_date" => "2023-12-13",
            "Config_process-in" => "2023-12-13 14:00",
            "Config_gateway" => "MaisChat",
            "Gateway_channel" => "Nao estereis",
            "Config_number" => "5531993714728"
        ];

        $response = $this->postJson('/api/nps/receive', $payload);

        $response->assertStatus(200);

    }
}
