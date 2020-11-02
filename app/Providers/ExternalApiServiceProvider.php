<?php

namespace App\Providers;

use App\Services\ExchangeRateService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ExternalApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ExchangeRateService::class, function ($app) {
            return new ExchangeRateService(config('aziz.exchange_rate_url'), config('aziz.currency_options'));
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
