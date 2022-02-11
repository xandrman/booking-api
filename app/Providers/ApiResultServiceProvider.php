<?php

namespace App\Providers;

use App\Interfaces\ApiResultInterface;
use App\Services\ApiResultService;
use Illuminate\Support\ServiceProvider;

class ApiResultServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApiResultInterface::class, ApiResultService::class);
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
