<?php

namespace App\Livewire\Tenant\Admin\Employee;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class EmployeeEditComponent extends Component
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

    public $employee_id;

    public function mount($id)
    {
        $employee = Employee::findOrFail($id);
        $this->employee_id = $employee->id;
        $this->role = $employee->role;
        $this->joining_date = $employee->joining_date;
        $this->designation_id = $employee->designation_id;
        $this->department_id = $employee->department_id;
        $this->qualification = $employee->qualification;
        $this->experience_detail = $employee->experience_detail;
        $this->total_experience = $employee->total_experience;

        // Employee Details
        $this->name = $employee->name;
        $this->dob = $employee->dob;
        $this->religion = $employee->religion;
        $this->mobile = $employee->mobile;
        $this->email = $employee->email;
        $this->present_address = $employee->present_address;
        $this->permanent_address = $employee->permanent_address;

        // Login Details
        $this->username = $employee->username;

        // Bank Info
        $this->bank_name = $employee->bank_name;
        $this->holder_name = $employee->holder_name;
        $this->bank_branch = $employee->bank_branch;
        $this->bank_address = $employee->bank_address;
        $this->ifsc_code = $employee->ifsc_code;
        $this->account_no = $employee->account_no;
    }


    public function render()
    {
        $employees = Employee::all();
        $departments = Department::all();
        $designations = Designation::all();

        return view('livewire.tenant.admin.employee.employee-edit-component')
        ->with('employees', $employees)
        ->with('departments', $departments)
        ->with('designations', $designations)
        ->layout('layouts.tenant.app', [
            'title' => "Edit Employee | Monarchy School",
        ]);
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
            // 'username' => 'required|unique:employees,username',
            // 'password' => 'required|min:4',
        ];
    }

    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules());
    }

    public function update()
    {
        
        try {

            $data = $this->validate($this->rules());

            // Upload photo
            $photoPath = $this->photo?->store('students', 'public');

            $employee = Employee::where('id', $this->employee_id)->update([
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

            $this->dispatch('toast', type: 'success', message: 'Employee updated successfully!');


        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('validation-failed');
            throw $e;
        }
    }


}
