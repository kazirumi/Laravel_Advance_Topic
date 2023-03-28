<?php

namespace App\Orders;


use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;

class OrderDetails{
    private $paymentGateway;
    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->paymentGateway=$paymentGateway;
    }

    public function all(){
        $this->paymentGateway->chargeDiscount(600);

        return [
            'name'=>'kazi',
            'address'=>'35no west jurain'
        ];
    }
}
