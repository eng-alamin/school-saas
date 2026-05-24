<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(function (Request $request) {

        $host = $request->getHost();

        $centralDomains = config('tenancy.central_domains');

        foreach ($centralDomains as $domain) {

            if ($host === $domain) {
                return route('central.login');
            }

        }

        return route('tenant.login');

    });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
