<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Define o guard e o broker de senha padrão da aplicação.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'funcionarios'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Aqui definimos os guards de autenticação. O padrão "web" usa sessão
    | e o provider "funcionarios".
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'funcionarios',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Define como os usuários (no nosso caso, funcionários) são recuperados
    | do banco de dados. Estamos usando Eloquent com o model Funcionario.
    |
    */

    'providers' => [
        'funcionarios' => [
            'driver' => 'eloquent',
            'model' => App\Models\Funcionario::class,
        ],

        // Exemplo alternativo usando tabela diretamente:
        // 'funcionarios' => [
        //     'driver' => 'database',
        //     'table' => 'funcionarios',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Configuração de reset de senha para funcionários.
    |
    */

    'passwords' => [
        'funcionarios' => [
            'provider' => 'funcionarios',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60, // minutos
            'throttle' => 60, // segundos entre tentativas
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Tempo em segundos antes de expirar a confirmação de senha.
    | Padrão: 3 horas (10800 segundos).
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];