<?php

use Illuminate\Support\Facades\Route;

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/register',
            \App\Livewire\TenantRegistrationWizard::class
        )->name('tenant.register');

        Route::get('/login',
            \App\Livewire\Tenant\Auth\LoginComponent::class
        )->name('central.login');

    });
}