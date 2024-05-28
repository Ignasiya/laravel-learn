<?php

namespace App\Providers;

use App\Events\NewsCreated;
use App\Listeners\SendNewsCreatedNotification;
use App\Listeners\SendNewsToRemoteServer;
use App\Models\News;
use App\Models\User;
use App\Observers\NewsObserver;
use App\Services\SmsSenderInterface;
use App\Services\SmsSenderService;
use Illuminate\Support\Facades\Gate;
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
        News::observe(NewsObserver::class);

        Gate::define('view-users', function (User $user) {
            return $user->isAdmin();
        });
    }
}
