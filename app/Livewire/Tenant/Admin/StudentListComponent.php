<?php

namespace App\Livewire\Tenant\Admin;

use Livewire\Component;
use App\Models\Student;
use Livewire\Attributes\On;

class StudentListComponent extends Component
{

    public function render()
    {
        $students =  Student::with('guardians')->get();
        
        return view('livewire.tenant.admin.student-list-component')
        ->with('students', $students)
        ->layout('layouts.tenant.app', [
            'title' => "Student List | Monarchy School",
        ]);
    }

    
    public $delete_id;

    #[On('deleteConfirmed')]
    public function deleteStudent($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();

            $this->dispatch('refresh-list');

            $this->dispatch('toast', type: 'success', message: 'Student deleted successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Delete failed: ' . $e->getMessage());
        }
    }


    // public function deleteConfirmation($id)
    // {
    //     $this->delete_id = $id;
    //     $this->dispatch('showDeleteModal');
    // }

    // public function deleteStudent()
    // {
    //     try{
    //         $data = Student::find($this->delete_id);
    //         $data->delete();

    //         // Log the activity
    //         // activity()
    //         // ->useLog('client')
    //         // ->event('deleted')
    //         // ->performedOn($data)
    //         // ->causedBy(auth()->user())
    //         // ->withProperties(['ip' => request()->ip(), 'browser' => request()->userAgent()])
    //         // ->log("The student is deleted for information.");
            
    //         $this->dispatch('toast', type: 'success', message: 'Student deleted successfully!');
    //         return redirect()->route('admin.student.list')->with('success', 'Student is successfully deleted');
    //     }catch(\Exception $e){
    //         $this->dispatch('toast', type: 'error', message: 'Delete failed: ' . $e->getMessage());
    //     }
    // }

}
