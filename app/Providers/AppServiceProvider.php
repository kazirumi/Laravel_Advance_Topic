<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditCardPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChannelsComposer;
use App\Models\Channel;
use App\PostCardSendingService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //service container example
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

        //View Composer Example
        //Example 1
        //View::share('channels',Channel::orderBy('name')->get());

        //Example 2 View Composer with wild card
//        View::composer(['channel.index','post.*'],function ($view){
//            $view->with('channels',Channel::orderBy('name')->get());
//        });

        //Example 3 View Composer with dedicated class
        View::composer('partials.channels.*',ChannelsComposer::class);

        // facades example
        $this->app->singleton('Postcard',function ($app){
            return new PostCardSendingService('bd',100,200);
        });


    }
}
