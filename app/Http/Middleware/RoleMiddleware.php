<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RoleMiddleware
{
    protected $dashboards = [
        'admin'      => 'admin.dashboard',
        'teacher'    => 'teacher.dashboard',
        'student'    => 'student.dashboard',
        'parent'     => 'parent.dashboard',
        'accountant' => 'accountant.dashboard',
    ];

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect($this->getLoginUrl($request))
                ->with('error', 'এই পেজে প্রবেশ করতে লগইন করুন।');
        }

        if (isset($user->is_active) && !$user->is_active) {
            Auth::logout();
            return redirect($this->getLoginUrl($request))
                ->with('error', 'আপনার অ্যাকাউন্ট নিষ্ক্রিয় করা হয়েছে।');
        }

        if (empty($roles)) {
            return $next($request);
        }

        $allowedRoles = [];
        foreach ($roles as $role) {
            foreach (explode('|', $role) as $r) {
                $allowedRoles[] = trim($r);
            }
        }

        if (!in_array($user->role, $allowedRoles)) {
            return redirect($this->getDashboardUrl($request, $user->role))
                ->with('error', 'এই পেজে আপনার অ্যাক্সেস নেই।');
        }

        return $next($request);
    }

    private function getTenantId(): ?string
    {
        try {
            return tenant('id');
        } catch (\Exception $e) {
            return null;
        }
    }

    private function getLoginUrl(Request $request): string
    {
        $tenantId = $this->getTenantId();

        try {
            if (Route::has('tenant.login') && $tenantId) {
                return route('tenant.login', ['tenant' => $tenantId]);
            }

            if (Route::has('central.login')) {
                return route('central.login');
            }
        } catch (\Exception $e) {
            // fall through
        }

        return $request->getScheme() . '://' . $request->getHost() . '/login';
    }

    private function getDashboardUrl(Request $request, string $role): string
    {
        $routeName = $this->dashboards[$role] ?? null;
        $tenantId  = $this->getTenantId();

        try {
            if ($routeName && Route::has($routeName) && $tenantId) {
                return route($routeName, ['tenant' => $tenantId]);
            }
        } catch (\Exception $e) {
            // fall through
        }

        return $this->getLoginUrl($request);
    }
}