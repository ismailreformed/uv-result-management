<?php

namespace App\Livewire\Semester;

use App\Livewire\Forms\SemesterForm;
use LivewireUI\Modal\ModalComponent;

class CreateSemester extends ModalComponent
{
    public SemesterForm $form;

    public function save()
    {
        $this->form->store();

        $this->dispatch('closeModal');

        return $this->redirect('/semesters');
    }

    public function render()
    {
        return view('livewire.semester.create-semester');
    }
}
