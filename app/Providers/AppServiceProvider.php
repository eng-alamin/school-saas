<?php

namespace App\Providers;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $centralDomains = config('tenancy.central_domains', []);
        $currentDomain = request()->getHost();

        if (in_array($currentDomain, $centralDomains)) {
            // Central domain: plain web middleware
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/livewire/update', $handle)
                    ->middleware(['web']);
            });
        } else {
            // Tenant domain: include tenancy middleware
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/livewire/update', $handle)
                    ->middleware([
                        'web',
                        \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
                    ]);
            });
        }
    }
}
