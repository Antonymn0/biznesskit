<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Billing\PaymentGatewayContract;
use App\Billing\CreditPaymentGateway;
use App\Billing\MpesaPaymentGateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton(abstract:PaymentGatewayContract::class, concrete:function($app){
        //     if( request()->has(key:'mpesa') )
        //     return new MpesaPaymentGateway();
        //     else 
        //     return new CreditPaymentGateway();
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
