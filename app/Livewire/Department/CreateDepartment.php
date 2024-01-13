<?php

namespace App\Livewire\Department;

use App\Livewire\Forms\DepartmentForm;
use App\Models\Faculty;
use LivewireUI\Modal\ModalComponent;

class CreateDepartment extends ModalComponent
{
    public DepartmentForm $form;

    public function save()
    {
        $this->form->store();

        $this->dispatch('closeModal');

        return $this->redirect('/departments');
    }

    public function render()
    {
        $faculties = Faculty::all();

        return view('livewire.department.create-department', compact('faculties'));
    }
}
