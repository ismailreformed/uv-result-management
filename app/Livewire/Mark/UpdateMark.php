<?php

namespace App\Livewire\Mark;

use App\Livewire\Forms\MarkForm;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Mark;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use LivewireUI\Modal\ModalComponent;

class UpdateMark extends ModalComponent
{
    public MarkForm $form;

    public function mount(Mark $mark)
    {
        $this->form->setModel($mark);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('closeModal');

        return $this->redirect('/marks');
    }

    public function render()
    {
        $exams = Exam::all();
        $grades = Grade::all()->sortByDesc('id');
        $semesters = Semester::all();

        $selectedStudent = Student::find($this->form->student_id);
        $selectedSubject = Subject::find($this->form->subject_id);

        return view('livewire.mark.create-mark', compact('selectedStudent', 'selectedSubject', 'semesters', 'exams', 'grades'));
    }
}
