<?php

namespace App\Billing;



use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{
    public $currency;
    public $discount;
    public function __construct($currency)
    {
        $this->currency=$currency;
        $this->discount=0;
    }

    public function charge($amount){
        //Charge the bank
        $amount=$amount-$this->discount;
        return [
            'amount'=>$amount,
            'confirmation_number'=> Str::random(),
            'currency'=>$this->currency,
            'discount'=>$this->discount
        ];
    }

    //charge discount
    public function chargeDiscount($discount=0)
    {
        $this->discount=$discount;
    }
}
