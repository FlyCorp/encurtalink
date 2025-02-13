<?php

return [
    'cfarma' => [
        'default_template' => 'nps_360v2',
        'estereis' => [
            'authorization' => env('AUTHORIZATION_ESTEREIS'),
            'appid' => env('APP_ID_ESTEREIS'),
            'source' => env('SOURCE_ESTEREIS'),
            'token' => env('TOKEN_ESTEREIS'),
        ],
        'nao_estereis' => [
            'authorization' => env('AUTHORIZATION_NAOESTEREIS'),
            'appid' => env('APP_ID_NAOESTEREIS'),
            'source' => env('SOURCE_NAOESTEREIS'),
            'token' => env('TOKEN_NAOESTEREIS'),
        ]
    ],
    'cnutrition' => [
        'default_template' => 'nps_360v2',
        'estereis' => [
            'authorization' => env('AUTHORIZATION_ESTEREIS'),
            'appid' => env('APP_ID_ESTEREIS'),
            'source' => env('SOURCE_ESTEREIS'),
            'token' => env('TOKEN_ESTEREIS'),
        ],
        'nao_estereis' => [
            'authorization' => env('AUTHORIZATION_NAOESTEREIS'),
            'appid' => env('APP_ID_NAOESTEREIS'),
            'source' => env('SOURCE_NAOESTEREIS'),
            'token' => env('TOKEN_NAOESTEREIS'),
        ]
    ],
    'harmonize' => [
        'default_template' => 'nps_360v2',
        'nao_estereis' => [
            'authorization' => env('AUTHORIZATION_NAOESTEREIS'),
            'appid' => env('APP_ID_NAOESTEREIS'),
            'source' => env('SOURCE_NAOESTEREIS'),
            'token' => env('TOKEN_NAOESTEREIS'),
        ]
    ],
    'caratinga' => [
        'default_template' => 'nps_360v3',
        'nao_estereis' => [
            'authorization' => env('AUTHORIZATION_NAOESTEREIS_CARATINGA'),
            'appid' => env('APP_ID_NAOESTEREIS_CARATINGA'),
            'source' => env('SOURCE_NAOESTEREIS_CARATINGA'),
            'token' => env('TOKEN_NAOESTEREIS_CARATINGA'),
        ]
    ],
];
