<?php

namespace App\Providers;

use App\Services\ThemeService;
use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * Register ThemeService as a singleton so it is only instantiated once
     * per request (the cache does the heavy lifting across requests).
     */
    public function register(): void
    {
        $this->app->singleton(ThemeService::class, fn () => new ThemeService());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}