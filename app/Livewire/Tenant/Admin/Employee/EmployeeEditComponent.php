<?php

namespace App\Livewire\Tenant\Admin\Employee;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use App\Models\User;

use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class EmployeeEditComponent extends Component
{
    use WithFileUploads;

    public $employeeId;
    public $userId;
    public $employee;

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
    public $photo_upload;

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

    public function mount($id)
    {
        $this->employeeId = $id;
        $this->employee = Employee::with('user')->findOrFail($id);
        $this->userId = $this->employee->user_id;

        $this->role = $this->employee->user->role;
        $this->joining_date = $this->employee->joining_date;
        $this->designation_id = $this->employee->designation_id;
        $this->department_id = $this->employee->department_id;
        $this->qualification = $this->employee->qualification;
        $this->experience_detail = $this->employee->experience_detail;
        $this->total_experience = $this->employee->total_experience;

        // Employee Details
        $this->name = $this->employee->name;
        $this->dob = $this->employee->dob;
        $this->religion = $this->employee->religion;
        $this->mobile = $this->employee->mobile;
        $this->email = $this->employee->email;
        $this->present_address = $this->employee->present_address;
        $this->permanent_address = $this->employee->permanent_address;

        $this->photo = $this->employee->photo;

        // Login Details
        $this->username = $this->employee->user->username;

        // Bank Info
        $this->bank_name = $this->employee->bank_name;
        $this->holder_name = $this->employee->holder_name;
        $this->bank_branch = $this->employee->bank_branch;
        $this->bank_address = $this->employee->bank_address;
        $this->ifsc_code = $this->employee->ifsc_code;
        $this->account_no = $this->employee->account_no;
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
            'photo_upload'       => 'nullable',
            
            'username'    => ['required', Rule::unique('users', 'username')->ignore($this->userId)],
            'password'    => 'nullable|min:4',
        ];
    }

    protected function failedValidation($validator)
    {
        $this->dispatch('validation-failed');
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules());
    }

    public function safePreviewUrl($upload): ?string
    {
        if (!$upload) return null;
        try {
            return $upload->temporaryUrl();
        } catch (\Throwable $e) {
            return null;
        }
    }

    private function deleteOldFile($path): void
    {
        if (!$path) {
            return;
        }

        $fullPath = public_path($path);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    public function update()
    {
        
        try {

            $this->validate($this->rules());

            $data = $this->validate($this->rules());

            $userData = [
                'name'     => $this->name,
                'username' => $this->username,
                'email'    => $this->email,
            ];

            if (!empty($this->password)) {
                $userData['password'] = $this->password;
            }

            $user = User::with('employee')->findOrFail($this->userId);
            $user->update($userData);

            $employee = [
                // Academic Details
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

                // Bank Info
                'bank_name' => $this->bank_name,
                'holder_name' => $this->holder_name,
                'bank_branch' => $this->bank_branch,
                'bank_address' => $this->bank_address,
                'ifsc_code' => $this->ifsc_code,
                'account_no' => $this->account_no,
            ];

            if ($this->photo_upload) {
                $this->deleteOldFile($this->employee->photo);
                $employee['photo'] = \App\Helpers\TenantFileHelper::store($this->photo_upload, 'employees');
            }

            $this->employee->update($employee);

            $this->dispatch('toast', type: 'success', message: 'Employee updated successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('validation-failed');
            $this->dispatch('toast', type: 'error', message: 'An error occurred while creating the parent.');
            throw $e;
        }
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


}
