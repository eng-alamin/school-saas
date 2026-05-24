<?php

namespace App\Providers;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
    
use Stancl\Tenancy\Events\TenancyInitialized;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Event;

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

        // TenancyInitialized event-এ symlink তৈরি করুন
        Event::listen(TenancyInitialized::class, function ($event) {
            $tenantId = $event->tenancy->tenant->id;
            
            $target = storage_path('app/public'); // tenancy override করার পরের path
            $link = public_path('storage/tenant' . $tenantId); // বা শুধু public_path('storage')
            
            if (!File::exists(public_path('storage'))) {
                File::link($target, public_path('storage'));
            }
        });

    }
}
