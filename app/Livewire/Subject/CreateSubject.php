<?php

namespace App\Livewire\Subject;

use App\Livewire\Forms\SubjectForm;
use App\Models\Department;
use LivewireUI\Modal\ModalComponent;

class CreateSubject extends ModalComponent
{
    public SubjectForm $form;

    public function save()
    {
        $this->form->store();

        $this->dispatch('closeModal');

        return $this->redirect('/subjects');
    }

    public function render()
    {
        $departments = Department::all();

        return view('livewire.subject.create-subject', compact('departments'));
    }
}
