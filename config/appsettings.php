<?php
// STARTER-KIT::Config file
return [


    'store_name' => env('STORE_NAME', 'Ecommerce'),

    'url' => env('APP_URL', 'http://localhost'),

    'stripe' => [
        'secret' => env('STRIPE_SECRET', 'no-stripe-secret-key-found'),
        'shipping_1' => env('SHIPPING_ID_1', 'no-shipping-id-1-found'),
        'shipping_2' => env('SHIPPING_ID_2', 'no-shipping-id-2-found'),
        'shipping_3' => env('SHIPPING_ID_3', 'no-shipping-id-3-found'),
    ],

    'timezone' => env('APP_TIMEZONE', 'UTC'),
];
