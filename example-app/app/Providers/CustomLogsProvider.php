<?php

namespace App\Providers;

use App\Services\CustomLogDBService;
use App\Services\CustomLogServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class CustomLogsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomLogServiceInterface::class, function () {
            return new CustomLogDBService(DB::table('logs'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
