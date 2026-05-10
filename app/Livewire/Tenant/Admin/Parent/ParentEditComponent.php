<?php

namespace App\Livewire\Tenant\Admin\Parent;

use Livewire\Component;
use App\Models\Guardian;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class ParentEditComponent extends Component
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

    public $parent_id;

    public function mount($id)
    {
        $parent = Guardian::findOrFail($id);
        $this->parent_id = $parent->id;
        $this->name = $parent->name;
        $this->relation = $parent->relation;
        $this->father_name = $parent->father_name;
        $this->mother_name = $parent->mother_name;
        $this->occupation = $parent->occupation;
        $this->income = $parent->income;
        $this->education = $parent->education;
        $this->mobile = $parent->mobile;
        $this->email = $parent->email;
        $this->address = $parent->address;
        $this->photo = $parent->photo;

        $this->username = $parent->username;
    }

    public function render()
    {
        return view('livewire.tenant.admin.parent.parent-edit-component')
            ->layout('layouts.tenant.app', [
                'title' => "Edit Parent | Monarchy School",
            ]);
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
            'username' => 'required|unique:guardians,username,' . $this->parent_id,
            'password' => 'nullable|min:4',
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

            $parent = Guardian::findOrFail($this->parent_id);

            if ($this->photo) {
                $data['photo'] = $this->photo->store('parents', 'public');
            }

            if ($this->password) {
                $data['password'] = bcrypt($this->password);
            }

            $parent->update($data);

            $this->dispatch('toast', type: 'success', message: 'Parent updated successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'An error occurred while creating the parent.');
            throw $e;
        }
    }
}
