<?php

namespace App\Livewire\Tenant\Admin;

use Livewire\Component;
use App\Models\Student;
use App\Models\Guardian;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class AdmissionCreateComponent extends Component
{
    use WithFileUploads;

    public $academic_year;
    public $register_no;
    public $roll_no;
    public $admission_date;
    public $class_id;
    public $section_id;
    public $category_id;

    public $full_name;
    public $gender;
    public $blood_group;
    public $dob;
    public $religion;
    public $mobile;
    public $email;
    public $present_address;
    public $permanent_address;
    public $photo;

    public $username;
    public $password; 
    public $password_confirmation; 

    public $guardian_id;
    public $guardian_name, $guardian_relation;
    public $guardian_father_name, $guardian_mother_name;
    public $guardian_occupation, $guardian_income, $guardian_education;
    public $guardian_mobile, $guardian_email;
    public $guardian_address;
    public $guardian_username, $guardian_password, $guardian_password_confirmation;

    public $previous_school;
    public $qualification;
    public $remarks;


    public bool $guardian_exists = false;

    public function mount()
    {
        $this->admission_date = now()->format('Y-m-d');
        $this->gender = 'male';
    }

    public function render()
    {
        $guardians = Guardian::all();

        return view('livewire.tenant.admin.admission-create-component')
        ->with('guardians', $guardians)
        ->layout('layouts.tenant.app', [
            'title' => "Create Admission | Monarchy School",
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
            'academic_year' => 'required',
            'register_no' => 'required|unique:students,register_no',
            'full_name' => 'required',
            'username' => 'required|unique:students,username',
            'password' => 'required|confirmed|min:4',

            'guardian_id' => $this->guardian_exists ? 'required' : 'nullable',

            'guardian_name' => !$this->guardian_exists ? 'required' : 'nullable',
            'guardian_relation' => !$this->guardian_exists ? 'required' : 'nullable',
            'guardian_mobile' => !$this->guardian_exists ? 'required' : 'nullable',
            'guardian_email' => !$this->guardian_exists ? 'required|email' : 'nullable',
            'guardian_occupation' => !$this->guardian_exists ? 'required' : 'nullable',
            'guardian_income' => !$this->guardian_exists ? 'required' : 'nullable',
            'guardian_education' => !$this->guardian_exists ? 'required' : 'nullable',
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
            // $photoPath = $this->photo?->store('students', 'public');

            $student = Student::create([
                'academic_year' => $this->academic_year,
                'register_no' => $this->register_no,
                'roll_no' => $this->roll_no,
                'admission_date' => $this->admission_date,
                'class_id' => $this->class_id,
                'section_id' => $this->section_id,
                'category_id' => $this->category_id,

                'full_name' => $this->full_name,
                'gender' => $this->gender,
                'blood_group' => $this->blood_group,
                'dob' => $this->dob,
                'religion' => $this->religion,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'present_address' => $this->present_address,
                'permanent_address' => $this->permanent_address,
                // 'photo' => $photoPath,

                'username' => $this->username,
                'password' => bcrypt($this->password),
            ]);

            // Guardian
                if ($this->guardian_exists) {
                    $student->guardians()->syncWithoutDetaching([$this->guardian_id]);
                } else {
                    $guardian = Guardian::create([
                        'name' => $this->guardian_name,
                        'relation' => $this->guardian_relation,
                        'father_name' => $this->guardian_father_name,
                        'mother_name' => $this->guardian_mother_name,
                        'occupation' => $this->guardian_occupation,
                        'income' => $this->guardian_income,
                        'education' => $this->guardian_education,
                        'mobile' => $this->guardian_mobile,
                        'email' => $this->guardian_email,
                        'address' => $this->guardian_address,

                        // 'photo' => $photoPath,
                        'username' => $this->guardian_username,
                        'password' => bcrypt('1234'),
                    ]);

                    $student->guardians()->attach($guardian->id);
                }

            session()->flash('success', 'Student Created Successfully');

            $this->dispatch('saved');
            $this->resetForm();

            $this->dispatch('toast', type: 'success', message: 'Student created successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('validation-failed');
            throw $e;
        }
    }
}
