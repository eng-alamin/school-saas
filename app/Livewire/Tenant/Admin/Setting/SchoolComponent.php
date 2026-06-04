<?php

namespace App\Livewire\Tenant\Admin\Setting;

use App\Models\SettingSchool;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class SchoolComponent extends Component
{
    use WithFileUploads;

    // General Setting
    public $name;
    public $email;
    public $mobile;
    public $city;
    public $address;
    public $language = 'English';
    public $timezone = 'Asia/Dhaka';
    public $weekends = [];
    public $unique_roll = 'class_wise';
    public $teacher_restricted = false;

    // Currency
    public $currency = 'BDT';
    public $currency_symbol = '৳';
    public $currency_format = '1230000.50';
    public $symbol_position = 'prefix';

    // Register No Prefix
    public $enable_registration_prefix = false;
    public $institution_code_prefix;
    public $register_start_from = 1;
    public $register_no_digit = 4;

    // Offline Payments
    public $offline_payment_enabled = true;

    // Online Exam
    public $show_only_own_question = false;

    // Fees Carry Forward
    public $due_days = 30;
    public $due_fees_calculation_with_fine = false;

    // Auto Login
    public $auto_generate_student_login = false;
    public $auto_generate_guardian_login = false;

    // Logos (stored paths)
    public $system_logo;
    public $text_logo;
    public $print_logo;
    public $report_logo;

    // Temp uploads
    public $system_logo_upload;
    public $text_logo_upload;
    public $print_logo_upload;
    public $report_logo_upload;

    protected $rules = [
        'name'                     => 'required|string|max:255',
        'email'                    => 'nullable|email|max:255',
        'mobile'                   => 'nullable|string|max:30',
        'city'                     => 'nullable|string|max:100',
        'address'                  => 'nullable|string',
        'language'                 => 'required|string',
        'timezone'                 => 'required|string',
        'weekends'                 => 'nullable|array',
        // 'weekends'                 => 'nullable|string',
        'weekends.*' => 'string|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday',
        'unique_roll'              => 'required|in:class_wise,section_wise,disabled',
        'teacher_restricted'       => 'boolean',

        'currency'                 => 'required|string|max:20',
        'currency_symbol'          => 'required|string|max:10',
        'currency_format'          => 'required|string',
        'symbol_position'          => 'required|in:prefix,suffix',

        'enable_registration_prefix' => 'boolean',
        'institution_code_prefix'  => 'nullable|string|max:50',
        'register_start_from'      => 'required|integer|min:1',
        'register_no_digit'        => 'required|integer|min:1|max:10',

        'offline_payment_enabled'  => 'boolean',
        'show_only_own_question'   => 'boolean',

        'due_days'                 => 'required|integer|min:0',
        'due_fees_calculation_with_fine' => 'boolean',

        'auto_generate_student_login'  => 'boolean',
        'auto_generate_guardian_login' => 'boolean',

        'system_logo_upload'       => 'nullable',
        'text_logo_upload'         => 'nullable',
        'print_logo_upload'        => 'nullable',
        'report_logo_upload'       => 'nullable',
    ];

    public function mount()
    {
        $setting = SettingSchool::first();
        if ($setting) {
            $this->name                           = $setting->name;
            $this->email                          = $setting->email;
            $this->mobile                         = $setting->mobile;
            $this->city                           = $setting->city;
            $this->address                        = $setting->address;
            $this->language                       = $setting->language;
            $this->timezone                       = $setting->timezone;
            $this->weekends                       = $setting->weekends ?? [];
            $this->unique_roll                    = $setting->unique_roll;
            $this->teacher_restricted             = $setting->teacher_restricted;

            $this->currency                       = $setting->currency;
            $this->currency_symbol                = $setting->currency_symbol;
            $this->currency_format                = $setting->currency_format;
            $this->symbol_position                = $setting->symbol_position;

            $this->enable_registration_prefix     = $setting->enable_registration_prefix;
            $this->institution_code_prefix        = $setting->institution_code_prefix;
            $this->register_start_from            = $setting->register_start_from;
            $this->register_no_digit              = $setting->register_no_digit;

            $this->offline_payment_enabled        = $setting->offline_payment_enabled;
            $this->show_only_own_question         = $setting->show_only_own_question;

            $this->due_days                       = $setting->due_days;
            $this->due_fees_calculation_with_fine = $setting->due_fees_calculation_with_fine;

            $this->auto_generate_student_login    = $setting->auto_generate_student_login;
            $this->auto_generate_guardian_login   = $setting->auto_generate_guardian_login;

            $this->system_logo                    = $setting->system_logo;
            $this->text_logo                      = $setting->text_logo;
            $this->print_logo                     = $setting->print_logo;
            $this->report_logo                    = $setting->report_logo;
        }
    }

    /**
     * Safely get a temporary preview URL for a Livewire uploaded file.
     * Returns null if the file extension is not previewable.
     */
    public function safePreviewUrl($upload): ?string
    {
        if (!$upload) return null;
        try {
            return $upload->temporaryUrl();
        } catch (\Throwable $e) {
            return null;
        }
    }

    private function deleteOldFile($path)
    {
        if (!$path) {
            return;
        }

        $path = str_replace('storage/', '', $path);

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    public function save()
    {
        $this->validate();

        $setting = SettingSchool::firstOrNew([]);

        // System Logo
    if ($this->system_logo_upload) {

        $this->deleteOldFile($setting->system_logo);

        $path = $this->system_logo_upload->storeAs(
            'logos',
            time() . '_system.' . $this->system_logo_upload->getClientOriginalExtension(),
            'public'
        );

        $setting->system_logo = 'storage/' . $path;
    }

        // Text Logo
        if ($this->text_logo_upload) {

            $this->deleteOldFile($setting->text_logo);

            $path = $this->text_logo_upload->storeAs(
                'logos',
                time() . '_text.' . $this->text_logo_upload->getClientOriginalExtension(),
                'public'
            );

            $setting->text_logo = 'storage/' . $path;
        }

        // Print Logo
        if ($this->print_logo_upload) {

            $this->deleteOldFile($setting->print_logo);

            $path = $this->print_logo_upload->storeAs(
                'logos',
                time() . '_print.' . $this->print_logo_upload->getClientOriginalExtension(),
                'public'
            );

            $setting->print_logo = 'storage/' . $path;
        }

        // Report Logo
        if ($this->report_logo_upload) {

            $this->deleteOldFile($setting->report_logo);

            $path = $this->report_logo_upload->storeAs(
                'logos',
                time() . '_report.' . $this->report_logo_upload->getClientOriginalExtension(),
                'public'
            );

            $setting->report_logo = 'storage/' . $path;
        }

        $setting->fill([
            'name'                           => $this->name,
            'email'                          => $this->email,
            'mobile'                         => $this->mobile,
            'city'                           => $this->city,
            'address'                        => $this->address,
            'language'                       => $this->language,
            'timezone'                       => $this->timezone,
            'weekends'                       => $this->weekends,
            'unique_roll'                    => $this->unique_roll,
            'teacher_restricted'             => $this->teacher_restricted,
            'currency'                       => $this->currency,
            'currency_symbol'                => $this->currency_symbol,
            'currency_format'                => $this->currency_format,
            'symbol_position'                => $this->symbol_position,
            'enable_registration_prefix'     => $this->enable_registration_prefix,
            'institution_code_prefix'        => $this->institution_code_prefix,
            'register_start_from'            => $this->register_start_from,
            'register_no_digit'              => $this->register_no_digit,
            'offline_payment_enabled'        => $this->offline_payment_enabled,
            'show_only_own_question'         => $this->show_only_own_question,
            'due_days'                       => $this->due_days,
            'due_fees_calculation_with_fine' => $this->due_fees_calculation_with_fine,
            'auto_generate_student_login'    => $this->auto_generate_student_login,
            'auto_generate_guardian_login'   => $this->auto_generate_guardian_login,
        ]);

        $setting->save();

        session()->flash('success', 'School settings saved successfully.');
        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.tenant.admin.setting.school-component')
            ->layout('layouts.tenant.app', [
                'title' => 'Setting School | School Saas',
            ]);
    }
}