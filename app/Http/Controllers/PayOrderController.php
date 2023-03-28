<?php

namespace App\Http\Controllers;

use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{

    public function store(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway, Request $request)
    {
        $orderDetails->all();
        return $paymentGateway->charge(2500);
    }


}
