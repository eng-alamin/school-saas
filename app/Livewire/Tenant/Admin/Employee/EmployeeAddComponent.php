<?php

namespace App\Livewire\Tenant\Admin\Employee;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class EmployeeAddComponent extends Component
{
    use WithFileUploads;

    // Academic Details
    public $role;
    public $joining_date;
    public $designation_id;
    public $department_id;
    public $qualification;
    public $experience_detail;
    public $total_experience;

    // Employee Details
    public $name;
    public $dob;
    public $religion;
    public $mobile;
    public $email;
    public $present_address;
    public $permanent_address;
    public $photo;

    // Login Details
    public $username;
    public $password;

    // Bank Info
    public $bank_name;
    public $holder_name;
    public $bank_branch;
    public $bank_address;
    public $ifsc_code;
    public $account_no;

    public function render()
    {
        $employees = Employee::all();
        $departments = Department::all();
        $designations = Designation::all();

        return view('livewire.tenant.admin.employee.employee-add-component')
        ->with('employees', $employees)
        ->with('departments', $departments)
        ->with('designations', $designations)
        ->layout('layouts.tenant.app', [
            'title' => "Create Employee | Monarchy School",
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
            'role' => 'required',
            // 'joining_date' => 'required|date',
            'designation_id' => 'required|exists:designations,id',
            'department_id' => 'required|exists:departments,id',

            'name' => 'required',
            'mobile' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'photo' => 'nullable|image|max:2048',
            'username' => 'required|unique:employees,username',
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

            // Upload photo
            $photoPath = $this->photo?->store('students', 'public');

            $employee = Employee::create([
                // Academic Details
                'role' => $this->role,
                'joining_date' => $this->joining_date,
                'designation_id' => $this->designation_id,
                'department_id' => $this->department_id,
                'qualification' => $this->qualification,
                'experience_detail' => $this->experience_detail,
                'total_experience' => $this->total_experience,

                // Employee Details
                'name' => $this->name,
                'dob' => $this->dob,
                'religion' => $this->religion,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'present_address' => $this->present_address,
                'permanent_address' => $this->permanent_address,
                'photo' => $photoPath,

                // Login Details
                'username' => $this->username,
                'password' => bcrypt($this->password),

                // Bank Info
                'bank_name' => $this->bank_name,
                'holder_name' => $this->holder_name,
                'bank_branch' => $this->bank_branch,
                'bank_address' => $this->bank_address,
                'ifsc_code' => $this->ifsc_code,
                'account_no' => $this->account_no,
            ]);

            $this->dispatch('toast', type: 'success', message: 'Employee created successfully!');

            $this->resetForm();

        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('validation-failed');
            throw $e;
        }
    }


}
