<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/register', \App\Livewire\TenantRegistrationWizard::class)->name('tenant.register');
    Route::get('/login', \App\Livewire\Tenant\Auth\LoginComponent::class)->name('tenant.login');
});