<?php

namespace App\Livewire\Exam;

use App\Livewire\Forms\ExamForm;
use LivewireUI\Modal\ModalComponent;

class CreateExam extends ModalComponent
{
    public ExamForm $form;

    public function save()
    {
        $this->form->store();

        $this->dispatch('closeModal');

        return $this->redirect('/exams');
    }

    public function render()
    {
        return view('livewire.exam.create-exam');
    }
}
