<?php

declare(strict_types=1);

namespace Service\Payments\Stripe;

use Bpuig\Subby\Contracts\PaymentMethodService;
use Bank\BankPackages\YourPaymentProcessor;
use Bpuig\Subby\Traits\IsPaymentMethod;
use Stripe\Charge;
use Stripe\Stripe;

class CreditCard implements PaymentMethodService
{
    use IsPaymentMethod;

    private $amount;
    private $currency;
    private $creditCard;

    private $subscription;

    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * You would need to retrieve whatever data you need from $this->subscription relationships
     * @return void
     */
    private function retrieveCreditCard() {
        // Nope
    }

    /**
     * Charge desired amount with your favorite bank
     * @return void
     */
    public function charge()
    {
        // Not still configurated
    }
}
