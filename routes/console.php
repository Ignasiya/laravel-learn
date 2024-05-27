<?php

use App\Jobs\ClearCache;
use App\Jobs\SyncNews;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    Log::info('Callback executed');
})->everyMinute();

Schedule::command('app:dump-database')->everyMinute();

Schedule::job(SyncNews::class)->everyMinute();

Schedule::exec('touch storage/logs/test.log')->everyMinute();

Schedule::job(ClearCache::class)->hourly();
