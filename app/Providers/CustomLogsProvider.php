<?php

namespace App\Providers;

use App\Services\CustomLogDbService;
use App\Services\CustomLogServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class CustomLogsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CustomLogServiceInterface::class, function () {
            return new CustomLogDbService(DB::table('logs'));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
