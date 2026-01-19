<?php

use App\Http\Controllers\Socialite\ProviderCallbackController;
use App\Http\Controllers\Socialite\ProviderRedirectController;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth/{provider}/redirect', ProviderRedirectController::class)->name('auth.redirect');
Route::get('/auth/{provider}/callback', ProviderCallbackController::class)->name('auth.callback');


require __DIR__.'/settings.php';
