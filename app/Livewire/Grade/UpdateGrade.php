<?php

namespace App\Livewire\Grade;

use App\Livewire\Forms\GradeForm;
use App\Models\Grade;
use LivewireUI\Modal\ModalComponent;

class UpdateGrade extends ModalComponent
{
    public GradeForm $form;

    public function mount(Grade $grade)
    {
        $this->form->setModel($grade);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('closeModal');

        return $this->redirect('/grades');
    }

    public function render()
    {
        return view('livewire.grade.create-grade');
    }
}
