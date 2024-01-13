<?php

namespace App\Livewire\Department;

use App\Livewire\Forms\DepartmentForm;
use App\Models\Department;
use App\Models\Faculty;
use LivewireUI\Modal\ModalComponent;

class UpdateDepartment extends ModalComponent
{
    public DepartmentForm $form;

    public function mount(Department $department)
    {
        $this->form->setDepartment($department);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('closeModal');

        return $this->redirect('/departments');
    }

    public function render()
    {
        $faculties = Faculty::all();

        return view('livewire.department.create-department', compact('faculties'));
    }
}
