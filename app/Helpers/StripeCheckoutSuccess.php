<?php

namespace App\Helpers;


class StripeCheckoutSuccess
{
    protected \Stripe\StripeClient $stripe;

    public function __construct()
    {
        $this->stripe = StripeClient::getClient();
    }

    /**
     * Undocumented function
     *
     * @param string $session_id
     * @return boolean true/false if checkout order was updated
     */
    public function updateCheckoutOrder($session_id)
    {

        return true;
    }
}
