<?php

namespace App\Providers;

use App\Services\SmsSenderInterface;
use App\Services\SmsSenderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(SmsSenderInterface::class, function () {
            return new SmsSenderService('7895168498', 'dsajflasljdfn');
        });
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
