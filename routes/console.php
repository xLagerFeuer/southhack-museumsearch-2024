<?php

use App\Jobs\ProcessGetSearchResponces;
use App\Jobs\ProcessSendSearchRequests;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// todo: Start on artisan queue
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::job(new ProcessSendSearchRequests)->everyFiveSeconds();
Schedule::job(new ProcessGetSearchResponces)->everyTwoSeconds();
