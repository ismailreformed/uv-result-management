<?php

namespace App\Livewire\Faculty;

use App\Livewire\Forms\FacultyForm;
use LivewireUI\Modal\ModalComponent;

class CreateFaculty extends ModalComponent
{
    public FacultyForm $form;

    public function save()
    {
        $this->form->store();

        $this->dispatch('closeModal');

        return $this->redirect('/faculty');
    }

    public function render()
    {
        return view('livewire.faculty.create-faculty');
    }
}
