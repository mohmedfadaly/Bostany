<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '493047036182-mo8f5c03k7rrndattvctaf4ntlb5r4ld.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://7roadsapp.com/public/auth/callback',
    ],

    'facebook' => [
        'client_id' => '2259149310935252',
        'client_secret' => '65fbf3eeaded7a44afccc84551c591af',
        'redirect' => 'https://7roadsapp.com/public/auth/callback',
    ],
];
