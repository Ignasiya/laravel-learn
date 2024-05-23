<?php

namespace App\Providers;

use App\Events\NewsHidden;
use App\Listeners\NewsHiddenListener;
use App\Models\News;
use App\Observers\NewsObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Event::listen(
            NewsHidden::class,
            NewsHiddenListener::class,
        );
        News::observe(NewsObserver::class);
    }
}
