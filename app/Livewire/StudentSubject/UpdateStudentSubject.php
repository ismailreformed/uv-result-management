<?php

namespace App\Livewire\StudentSubject;

use App\Livewire\Forms\StudentForm;
use App\Livewire\Forms\StudentSubjectForm;
use App\Models\Department;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentSubject;
use App\Models\Subject;
use LivewireUI\Modal\ModalComponent;

class UpdateStudentSubject extends ModalComponent
{
    public StudentSubjectForm $form;

    public function mount(StudentSubject $studentSubject)
    {
        $this->form->setModel($studentSubject);
    }

    public function save()
    {
        $this->form->update();

        $this->dispatch('closeModal');

        return $this->redirect('/student-subjects');
    }

    public function render()
    {
        $students = Student::all();
        $semesters = Semester::all();
        $subjects = Subject::all();

        return view('livewire.student-subject.create-student-subject', compact('students', 'subjects', 'semesters'));
    }
}
