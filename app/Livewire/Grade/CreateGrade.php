<?php

namespace App\Livewire\Grade;

use App\Livewire\Forms\GradeForm;
use App\Livewire\Forms\SemesterForm;
use LivewireUI\Modal\ModalComponent;

class CreateGrade extends ModalComponent
{
    public GradeForm $form;

    public function save()
    {
        $this->form->store();

        $this->dispatch('closeModal');

        return $this->redirect('/grades');
    }

    public function render()
    {
        return view('livewire.grade.create-grade');
    }
}
