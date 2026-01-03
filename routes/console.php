<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('articles:publish-scheduled')->everyMinute();
Schedule::command('sitemap:make')->everyTenMinutes();
