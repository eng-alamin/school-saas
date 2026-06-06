<?php

namespace App\Http\Middleware;

use App\Services\ThemeService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * InjectTheme
 *
 * Resolves the current tenant's theme and shares it with every Blade view
 * in this request lifecycle so that layouts can inject CSS variables without
 * any boilerplate in individual controllers.
 *
 * Registration options (choose one):
 *
 *   A) Global – add to the $middleware array in App\Http\Kernel (Laravel ≤ 10)
 *      or bootstrap/app.php ->withMiddleware() (Laravel 11+).
 *
 *   B) Route-group – apply only to the "tenant" routes:
 *      Route::middleware(['web', 'inject.theme'])->group(...)
 *
 *   Alias registration example (bootstrap/app.php):
 *      $middleware->alias(['inject.theme' => \App\Http\Middleware\InjectTheme::class]);
 */
class InjectTheme
{
    public function __construct(private readonly ThemeService $themeService)
    {
    }

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tenantId = $this->resolveTenantId($request);

        if ($tenantId !== null) {
            $theme = $this->themeService->getTheme($tenantId);

            // Share with ALL Blade views for this request
            View::share('theme', $theme);
            View::share('themeCss', $this->themeService->renderCssBlock($theme));
        }

        return $next($request);
    }

    // ── Tenant resolution strategy ────────────────────────────────────────
    //
    // Adjust this method to match however *your* app identifies the current
    // tenant (session, subdomain, DB lookup, Spatie\Multitenancy, etc.).
    //
    private function resolveTenantId(Request $request): ?int
    {
        // ── Option 1: Spatie Laravel-Multitenancy ─────────────────────────
        // if (app()->bound(\Spatie\Multitenancy\Models\Tenant::class)) {
        //     $tenant = \Spatie\Multitenancy\Models\Tenant::current();
        //     return $tenant?->id;
        // }

        // ── Option 2: Stancl/Tenancy ──────────────────────────────────────
        // if (function_exists('tenant') && tenant()) {
        //     return (int) tenant()->getTenantKey();
        // }

        // ── Option 3: Custom – tenant stored in session ───────────────────
        // return session('tenant_id');

        // ── Option 4: Custom – tenant derived from subdomain ─────────────
        // $subdomain = explode('.', $request->getHost())[0];
        // $tenant = \App\Models\Tenant::where('subdomain', $subdomain)->first();
        // return $tenant?->id;

        // ── Option 5: Auth user has a tenant_id column (simple SaaS) ──────
        $user = $request->user();
        if ($user && isset($user->tenant_id)) {
            return (int) $user->tenant_id;
        }

        return null;
    }
}