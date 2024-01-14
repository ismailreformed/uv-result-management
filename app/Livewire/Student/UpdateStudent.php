<?php

namespace App\Livewire\Student;

use App\Livewire\Forms\StudentForm;
use App\Models\Department;
use App\Models\Student;
use LivewireUI\Modal\ModalComponent;

class UpdateStudent extends ModalComponent
{
    public StudentForm $form;

    public function mount(Student $student)
    {
        $this->form->setModel($student);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('closeModal');

        return $this->redirect('/students');
    }

    public function render()
    {
        $departments = Department::all();

        return view('livewire.student.create-student', compact('departments'));
    }
}
