<?php

namespace App\Livewire\Mark;

use App\Livewire\Forms\MarkForm;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Semester;
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

    public function updated($propertyName)
    {
        if ($propertyName === 'form.subject_id' || $propertyName === 'form.grade_id') {
            $this->calculateCreditEarned();
        }
    }

    private function calculateCreditEarned()
    {
        $subject = Subject::find($this->form->subject_id);
        $grade = Grade::find($this->form->grade_id);

        if ($this->form->subject_id && $this->form->grade_id) {
            $this->form->credit_earned = $subject->credit_hours * $grade->grade_point;
        }
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
        $grades = Grade::all()->sortByDesc('id');
        $semesters = Semester::all();

        return view('livewire.mark.create-mark', compact( 'exams', 'grades', 'semesters'));
    }
}
