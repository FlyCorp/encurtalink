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
        ];
    }

    public function postEdit(array $data)
    {
        return [
            'link' => $data['link'],
            'description' => $data['description'],
        ];
    }

}
