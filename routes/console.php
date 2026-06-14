<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command('report:daily')
    ->everyFiveMinutes()
    ->timezone('Asia/Kolkata')
    ->description('Send daily sales report');

Schedule::command('send:emails')
    ->everyMinute()
    ->timezone('Asia/Kolkata')
    ->description('Send Welcome mail');
