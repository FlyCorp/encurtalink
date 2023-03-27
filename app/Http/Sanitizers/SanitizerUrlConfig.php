<?php

namespace App\Http\Sanitizers;

class SanitizerUrlConfig
{

    public function postCreate(array $data)
    {
        return [
            'key'           => $data['key'],
            'value'         => $data['value'],
            'description'   => $data['description'],
        ];
    }

    public function postEdit(array $data)
    {
        return [
            'value'         => $data['value'],
            'description'   => $data['description'],
        ];
    }

}
