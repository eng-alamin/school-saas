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


    // Route::get('try', function () {
    //     auth()->user()->sendEmailVerificationNotification();
    //     return redirect()->back()->with('success','Thanks for the fast site!');
    // })->name('try');

    Route::get('clear', function () {
        Artisan::call('optimize:clear');
        return redirect()->back()->with('success','Thanks for the fast site!');
    })->name('clear');
    // Route::get('backup', function () {
    //     // Artisan::call('backup:clean');
    //     Artisan::call('backup:run');
    //     return redirect()->back()->with('success','Thanks for the backup!');
    // })->name('backup');
    // Route::get('link', function () {
    //     Artisan::call('storage:link');
    //     return redirect()->back()->with('success','Thanks for the link storage!');
    // });
    // Route::get('permissionrefresh', function () {
    //     Artisan::call('migrate:refresh --path=/database/migrations/2024_01_15_210628_create_permission_tables.php');
    // });
    // Route::get('permissionreseed', function () {
    //     Artisan::call('db:seed --class=PermissionSeeder');
    // });
    // Route::get('fresh', function () {
    //     Artisan::call('migrate:fresh --seed');
    // });
    // Route::get('migrate', function () {
    //     Artisan::call('migrate');
    // });
    //   Route::get('key', function () {
    //     Artisan::call('key:generate');
    // });
    Route::get('tenants', function () {
        Artisan::call('tenants:migrate');
    });
}