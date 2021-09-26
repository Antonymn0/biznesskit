<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use Illuminate\Http\Request;

class PayOrderTestController extends Controller
{
    private $paymentgateway;

    public function test(PaymentGatewayContract $paymentgateway)
    {
        $this->paymentgateway = $paymentgateway;
        return $this->orderDetails();
    }

    public function orderDetails()
    {
        $this->paymentgateway->setDiscount(10);
        return dd($this->paymentgateway->charge(500));
    }
}
