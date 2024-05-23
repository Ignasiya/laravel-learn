<?php

namespace App\Providers;

use App\Events\NewsCreated;
use App\Listeners\SendNewsCreatedNotification;
use App\Listeners\SendNewsToRemoteServer;
use App\Services\SmsSenderInterface;
use App\Services\SmsSenderService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SmsSenderInterface::class, function () {
            return new SmsSenderService('Client id', 'token');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            NewsCreated::class,
            SendNewsCreatedNotification::class,
        );
        Event::listen(
            NewsCreated::class,
            SendNewsToRemoteServer::class,
        );
    }
}
