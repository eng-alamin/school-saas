<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class TenantRegistrationWizard extends Component
{
    use WithFileUploads;

    public int $currentStep = 1;

    /*
    |--------------------------------------------------------------------------
    | School Information
    |--------------------------------------------------------------------------
    */

    public string $school_name = '';
    public string $school_type = '';
    public string $phone = '';
    public string $email = '';
    public string $timezone = 'Asia/Dhaka';

    public $logo;

    /*
    |--------------------------------------------------------------------------
    | Tenant Information
    |--------------------------------------------------------------------------
    */

    public string $subdomain = '';
    public string $plan = 'free';

    /*
    |--------------------------------------------------------------------------
    | Admin Information
    |--------------------------------------------------------------------------
    */

    public string $admin_name = '';
    public string $admin_email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /*
    |--------------------------------------------------------------------------
    | UI States
    |--------------------------------------------------------------------------
    */

    public bool $isSubdomainAvailable = false;

    /*
    |--------------------------------------------------------------------------
    | Real-time Validation
    |--------------------------------------------------------------------------
    */

    protected function rules()
    {
        return [
            'school_name' => 'required|min:3|max:255',
            'school_type' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'logo' => 'nullable|image|max:2048',

            'subdomain' => [
                'required',
                'alpha_dash',
                'min:3',
                'max:30',
            ],

            'admin_name' => 'required|min:3',
            'admin_email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function updatedSubdomain()
    {
        $this->validateOnly('subdomain');

        $this->isSubdomainAvailable = ! \App\Models\Domain::where(
            'domain',
            $this->subdomain . '.school-saas.test'
        )->exists();
    }

    /*
    |--------------------------------------------------------------------------
    | Step Validation
    |--------------------------------------------------------------------------
    */

    public function stepOneValidation()
    {
        $this->validate([
            'school_name' => 'required|min:3|max:255',
            'school_type' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'logo' => 'nullable|image|max:2048',
        ]);
    }

    public function stepTwoValidation()
    {
        $this->validate([
            'subdomain' => [
                'required',
                'alpha_dash',
                'min:3',
                'max:30',
            ],
        ]);
    }

    public function stepThreeValidation()
    {
        $this->validate([
            'admin_name' => 'required|min:3',
            'admin_email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    public function nextStep()
    {
        match ($this->currentStep) {
            1 => $this->stepOneValidation(),
            2 => $this->stepTwoValidation(),
            3 => $this->stepThreeValidation(),
        };

        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    /*
    |--------------------------------------------------------------------------
    | Final Registration
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        $this->stepThreeValidation();

        app(
            \App\Services\Tenant\TenantProvisioningService::class
        )->register([
            'school_name' => $this->school_name,
            'school_type' => $this->school_type,
            'phone' => $this->phone,
            'email' => $this->email,
            'subdomain' => $this->subdomain,
            'admin_name' => $this->admin_name,
            'admin_email' => $this->admin_email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Tenant Created Successfully');

        return redirect()->to(
            'https://' . $this->subdomain . '.school-saas.test/login'
        );
    }

    public function render()
    {
        return view('livewire.tenant-registration-wizard')
        ->layout('layouts.app', [
            'title' => "Register | Monarchy School",
        ]);
    }
}
