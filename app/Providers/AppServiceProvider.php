<?php

namespace App\Providers;

use App\Local;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * Registers the instance is used for the interaction with an outdoor service
         */
        $this->app->bind(Local\OutdoorServiceInterface::class, function() {
            return
                (new Local\FakedService())
                    ->withLogin(config("faked_service.login"))
                    ->withPassword(config("faked_service.password"))
                    ->withEndpoint(config("faked_service.endpoint"))
                    ->withLog(Log::getLogger());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
