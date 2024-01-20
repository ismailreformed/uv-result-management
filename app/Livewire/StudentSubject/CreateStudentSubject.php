<?php

namespace App\Livewire\StudentSubject;

use App\Livewire\Forms\StudentSubjectForm;
use App\Models\Semester;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class CreateStudentSubject extends ModalComponent
{
    public StudentSubjectForm $form;

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

        return $this->redirect('/student-subjects');
    }

    public function render()
    {
        $semesters = Semester::all();

        return view('livewire.student-subject.create-student-subject', compact('semesters'));
    }
}
