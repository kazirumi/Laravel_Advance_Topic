<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditCardPaymentGateway;
use App\Billing\PaymentGatewayContract;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(PaymentGatewayContract::class, function ($app){
            if(request()->has('credit')){
                return new CreditCardPaymentGateway('BDT');
            }
            else{
                return new BankPaymentGateway('usd');
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);
    }
}
