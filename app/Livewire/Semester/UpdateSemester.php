<?php

namespace App\Livewire\Semester;

use App\Livewire\Forms\FacultyForm;
use App\Livewire\Forms\SemesterForm;
use App\Models\Faculty;
use App\Models\Semester;
use LivewireUI\Modal\ModalComponent;

class UpdateSemester extends ModalComponent
{
    public SemesterForm $form;

    public function mount(Semester $semester)
    {
        $this->form->setModel($semester);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('closeModal');

        return $this->redirect('/semesters');
    }

    public function render()
    {
        return view('livewire.semester.create-semester');
    }
}
