<?php

namespace App\Http\Sanitizers;

class SanitizerShortUrl
{

    public function postCreate(array $data)
    {
        return [
            'code' => (string) \Illuminate\Support\Str::random(6),
            'link' => $data['link'],
            'description' => $data['description'],
            'script_header' => $data['script_header'] ? $data['script_header'] : null,
            'script_body' => $data['script_body'] ? $data['script_body'] : null,
            'redirect' => $data['redirect'] ? $data['redirect'] : 0,
        ];
    }

    public function postEdit(array $data)
    {
        return [
            'code' => $data['code'],
            'link' => $data['link'],
            'description' => $data['description'],
            'script_header' => $data['script_header'] ? $data['script_header'] : null,
            'script_body' => $data['script_body'] ? $data['script_body'] : null,
            'redirect' => $data['redirect'] ? $data['redirect'] : 0,
        ];
    }

}
