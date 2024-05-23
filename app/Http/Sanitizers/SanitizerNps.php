<?php

namespace App\Http\Sanitizers;

class SanitizerNps
{

    public function postReceive(array $data)
    {
        return [
            "campaign_name"         => $data["Campaign_name"],
            "client_name"           => $data["Client_name"],
            "client_document"       => $data["Client_document"],
            "client_representant"   => $data["Client_representant"],
            "client_uf"             => $data["Client_uf"],
            "client_city"           => $data["Client_city"],
            "order_company"         => $data["Order_company"],
            "order_number"          => $data["Order_number"],
            "order_value"           => $data["Order_value"],
            "order_date"            => $data["Order_date"],
            "config_process_in"     => $data["Config_process-in"],
            "config_gateway"        => $data["Config_gateway"],
            "gateway_channel"       => array_key_exists("Gateway_channel", $data) ? $data["Gateway_channel"] : null,
            "config_number"         => $data["Config_number"],
        ];
    }

}
