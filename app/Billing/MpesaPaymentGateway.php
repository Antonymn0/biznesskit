<?php 

namespace App\Billing;

class MpesaPaymentGateway implements PaymentGatewayContract
{
    private $currency;
    private $discount;

    public function __construct($currency='KES')
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function charge($amount)
    {
        return[
            'amount' => $amount-$this->discount,
            'confirmation' => 'test',
            'currency' => $this->currency,
            'discount' => $this->discount,
        ];
    }
}
