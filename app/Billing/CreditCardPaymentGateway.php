<?php

namespace App\Billing;



use Illuminate\Support\Str;

class CreditCardPaymentGateway implements PaymentGatewayContract
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
        $fee=$amount*0.03;
        return [
            'amount'=>$amount+$fee,
            'confirmation_number'=> Str::random(),
            'currency'=>$this->currency,
            'discount'=>$this->discount,
            'fee' => $fee
        ];
    }

    //charge discount
    public function chargeDiscount($discount=0)
    {
        $this->discount=$discount;
    }
}
