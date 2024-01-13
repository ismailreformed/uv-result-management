<?php

namespace App\Livewire\Subject;

use App\Livewire\Forms\SubjectForm;
use App\Models\Department;
use App\Models\Subject;
use LivewireUI\Modal\ModalComponent;

class UpdateSubject extends ModalComponent
{
    public SubjectForm $form;

    public function mount(Subject $subject)
    {
        $this->form->setModel($subject);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('closeModal');

        return $this->redirect('/subjects');
    }

    public function render()
    {
        $departments = Department::all();

        return view('livewire.subject.create-subject', compact('departments'));
    }
}
