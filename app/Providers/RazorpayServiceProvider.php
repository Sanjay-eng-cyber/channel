<?php

namespace App\Providers;

use App\Lib\Razorpay\Razorpay;
use Illuminate\Support\ServiceProvider;

class RazorpayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Razorpay::class, function () {
            return new Razorpay(config('razorpay.id'), config('razorpay.secret'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
