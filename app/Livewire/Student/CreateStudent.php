<?php

namespace App\Livewire\Student;

use App\Livewire\Forms\StudentForm;
use App\Models\Department;
use LivewireUI\Modal\ModalComponent;

class CreateStudent extends ModalComponent
{
    public StudentForm $form;

    public function save()
    {
        $this->form->store();

        $this->dispatch('closeModal');

        return $this->redirect('/students');
    }

    public function render()
    {
        $departments = Department::all();

        return view('livewire.student.create-student', compact('departments'));
    }
}
