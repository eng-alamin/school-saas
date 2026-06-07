<?php

namespace App\Livewire\Tenant\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginComponent extends Component
{
    public $email    = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email'    => 'required|email',
        'password' => 'required|min:6',
    ];

    protected function messages()
    {
        return [
            'email.required'    => 'Email address is required.',
            'email.email'       => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',
            'password.min'      => 'Password must be at least 6 characters.',
        ];
    }

    protected function throttleKey(): string
    {
        return Str::lower($this->email) . '|' . request()->ip();
    }

    public function login()
    {
        $this->validate();

        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            $seconds = RateLimiter::availableIn($this->throttleKey());
            $this->addError('email', "Too many login attempts. Please try again in {$seconds} seconds.");
            return;
        }

        if (! Auth::attempt([
            'email'    => $this->email,
            'password' => $this->password,
        ], $this->remember)) {

            RateLimiter::hit($this->throttleKey(), 60);
            $this->reset('password');
            $this->addError('email', 'These credentials do not match our records.');
            return;
        }

        RateLimiter::clear($this->throttleKey());

        request()->session()->regenerate();

        $this->recordSession();

        $this->redirectBasedOnRole(Auth::user());
    }

    private function redirectBasedOnRole($user): void
    {
        $dashboards = [
            'admin'      => 'admin.dashboard',
            'teacher'    => 'teacher.dashboard',
            'student'    => 'student.dashboard',
            'parent'     => 'parent.dashboard',
            'accountant' => 'accountant.dashboard',
        ];

        $routeName = $dashboards[$user->role] ?? null;
        $tenantId  = tenant('id');

        if ($routeName && \Illuminate\Support\Facades\Route::has($routeName)) {
            $this->redirect(
                route($routeName, ['tenant' => $tenantId]),
                navigate: true
            );
            return;
        }

        // Fallback
        $this->redirect(
            route('tenant.login', ['tenant' => $tenantId]),
            navigate: true
        );
    }

    protected function recordSession(): void
    {
        $sessionId = request()->session()->getId();
        $userId    = Auth::id();
        $now       = time();

        $exists = DB::table('sessions')->where('id', $sessionId)->exists();

        if ($exists) {
            DB::table('sessions')->where('id', $sessionId)->update([
                'user_id'       => $userId,
                'ip_address'    => request()->ip(),
                'user_agent'    => request()->userAgent(),
                'last_activity' => $now,
            ]);
        } else {
            DB::table('sessions')->insert([
                'id'            => $sessionId,
                'user_id'       => $userId,
                'ip_address'    => request()->ip(),
                'user_agent'    => request()->userAgent(),
                'payload'       => '',
                'last_activity' => $now,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.tenant.auth.login-component')
            ->layout('layouts.app', [
                'title' => 'Login | Monarchy School',
            ]);
    }
}