<?php

namespace App\Livewire\Tenant\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginComponent extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
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

    public function login()
    {
        $this->validate();

        if (!Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember)) {

            $this->reset('password');

            $this->addError('email', 'These credentials do not match our records.');

            return;
        }

        request()->session()->regenerate();

        $this->redirect(route('tenant.dashboard', ['tenant' => tenant('id')]), navigate: true);
    }

    public function render()
    {
        return view('livewire.tenant.auth.login-component')
            ->layout('layouts.app', [
                'title' => 'Login | Monarchy School',
            ]);
    }
}