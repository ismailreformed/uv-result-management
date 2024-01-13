<?php

namespace App\Livewire\Faculty;

use App\Livewire\Forms\FacultyForm;
use App\Models\Faculty;
use Livewire\Component;

class UpdateFaculty extends Component
{
    public FacultyForm $form;

    public function mount(Faculty $faculty)
    {
        $this->form->setFaculty($faculty);
    }

    public function save()
    {
        $this->form->update();

        return $this->dispatch('closeModal');
    }
    public function render()
    {
        return view('livewire.faculty.update-faculty');
    }
}
