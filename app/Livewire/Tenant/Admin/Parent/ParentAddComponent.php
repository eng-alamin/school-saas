<?php

namespace App\Livewire\Tenant\Admin\Parent;

use Livewire\Component;
use App\Models\Guardian;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class ParentAddComponent extends Component
{
    public $name;
    public $relation;
    public $father_name;
    public $mother_name;
    public $occupation;
    public $income;
    public $education;
    public $mobile;
    public $email;
    public $address;
    public $photo;
    public $username;
    public $password;

    public function render()
    {
        return view('livewire.tenant.admin.parent.parent-add-component')
            ->layout('layouts.tenant.app', [
                'title' => "Create Parent | Monarchy School",
            ]);
    }

    public function resetForm()
    {
        $this->reset();
    }

    protected function failedValidation($validator)
    {
        $this->dispatch('validation-failed');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'relation' => 'nullable|string|max:50',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'income' => 'nullable|numeric',
            'education' => 'nullable|string|max:255',
            'mobile' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'username' => 'required|unique:guardians,username',
            'password' => 'required|min:4',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules());
    }

    public function save()
    {
        try {
            $data = $this->validate($this->rules());

            $photoPath = $this->photo?->store('parents', 'public');

            Guardian::create([
                'name' => $this->name,
                'relation' => $this->relation,
                'father_name' => $this->father_name,
                'mother_name' => $this->mother_name,
                'occupation' => $this->occupation,
                'income' => $this->income,
                'education' => $this->education,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'address' => $this->address,
                'photo' => $photoPath,

                // Login Details
                'username' => $this->username,
                'password' => bcrypt($this->password),
            ]);

            $this->dispatch('toast', type: 'success', message: 'Parent created successfully!');
            $this->resetForm();
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'An error occurred while creating the parent.');
            throw $e;
        }
    }

}
