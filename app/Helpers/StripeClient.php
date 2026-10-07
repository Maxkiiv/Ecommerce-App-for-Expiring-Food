<?php

namespace App\Helpers;

class StripeClient
{
    public static function getClient()
    {
        $secret = config('appsettings.stripe.secret');

        if (!$secret) {
            throw new \Exception('Stripe secret key not configured');
        }

        return new \Stripe\StripeClient($secret);
    }
}
