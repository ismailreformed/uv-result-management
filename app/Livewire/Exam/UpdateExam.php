<?php

namespace App\Livewire\Exam;

use App\Livewire\Forms\ExamForm;
use App\Models\Exam;
use LivewireUI\Modal\ModalComponent;

class UpdateExam extends ModalComponent
{
    public ExamForm $form;

    public function mount(Exam $exam)
    {
        $this->form->setModel($exam);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('closeModal');

        return $this->redirect('/exams');
    }

    public function render()
    {
        return view('livewire.exam.create-exam');
    }
}
