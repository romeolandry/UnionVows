<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('logs:clear', function () {
    // Get the path
    $logPath = storage_path('logs');

    // Option A: The "Pure PHP" way (Works on Windows/Linux)
    File::cleanDirectory($logPath);

    // If you have specific logs in the base path:
    collect(glob(base_path('*.log')))->each(fn($file) => unlink($file));

    $this->info('Logs have been cleared successfully!');
})->purpose('Clear all application log files');
