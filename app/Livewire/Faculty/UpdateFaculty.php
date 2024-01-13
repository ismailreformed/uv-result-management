<?php

namespace App\Livewire\Faculty;

use App\Livewire\Forms\FacultyForm;
use App\Models\Faculty;
use LivewireUI\Modal\ModalComponent;

class UpdateFaculty extends ModalComponent
{
    public FacultyForm $form;

    public function mount(Faculty $faculty)
    {
        $this->form->setFaculty($faculty);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('closeModal');

        return $this->redirect('/faculties');
    }

    public function render()
    {
        return view('livewire.faculty.create-faculty');
    }
}
