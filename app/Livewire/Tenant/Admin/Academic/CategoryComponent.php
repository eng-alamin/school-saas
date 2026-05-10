<?php

namespace App\Livewire\Tenant\Admin\Academic;

use Livewire\Component;
use App\Models\AcademicCategory;
use Livewire\Attributes\On;

class CategoryComponent extends Component
{
    public $name;

    public $category_id;
    public $delete_id;

    public function render()
    {
        $this->dispatch('refresh-list', AcademicCategory::all()->toArray());

        $categories = AcademicCategory::all();

        return view('livewire.tenant.admin.academic.category-component')
            ->with('categories', $categories)
            ->layout('layouts.tenant.app', [
                'title' => "Categories | School SaaS",
            ]);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            AcademicCategory::create([
                'name' => $this->name,
            ]);

            $this->dispatch('refresh-list', AcademicCategory::all()->toArray());
            
            $this->dispatch('toast', type: 'success', message: 'Category created successfully!');

            // Reset input fields
            $this->name = '';
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Creation failed: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $category = AcademicCategory::findOrFail($id);
        $this->category_id = $category->id;
        $this->name = $category->name;

        $this->dispatch('refresh-list', AcademicCategory::all()->toArray());
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $category = AcademicCategory::findOrFail($this->category_id);
            $category->update([
                'name' => $this->name,
            ]);

            $this->dispatch('refresh-list', AcademicCategory::all()->toArray());
            
            $this->dispatch('toast', type: 'success', message: 'Category updated successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Update failed: ' . $e->getMessage());
        }
    }



    #[On('deleteConfirmed')]
    public function deleteCategory($id)
    {
        try {
            $category = AcademicCategory::findOrFail($id);
            $category->delete();

            $this->dispatch('refresh-list');

            $this->dispatch('toast', type: 'success', message: 'Category deleted successfully!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Delete failed: ' . $e->getMessage());
        }
    }
}
