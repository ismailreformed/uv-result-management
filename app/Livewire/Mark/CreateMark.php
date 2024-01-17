<?php

namespace App\Livewire\Mark;

use App\Livewire\Forms\MarkForm;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class CreateMark extends ModalComponent
{
    public MarkForm $form;

    #[On('student-selected')]
    public function updateStudentId($student)
    {
        $this->form->student_id = $student['id'];
    }

    #[On('subject-selected')]
    public function updateSubjectId($subject)
    {
        $this->form->subject_id = $subject['id'];
    }

    public function save()
    {
        $this->form->store();

        $this->dispatch('closeModal');

        return $this->redirect('/marks');
    }

    public function render()
    {
        $exams = Exam::all();
        $grades = Grade::all();

        return view('livewire.mark.create-mark', compact( 'exams', 'grades'));
    }
}
