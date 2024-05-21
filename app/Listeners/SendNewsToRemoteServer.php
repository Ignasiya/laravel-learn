<?php

namespace App\Listeners;

use App\Events\NewsCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendNewsToRemoteServer
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewsCreated $event): bool
    {
        Log::info('Send News To remote server listener fired id ' . $event->news->id);
        return false;
    }
}
