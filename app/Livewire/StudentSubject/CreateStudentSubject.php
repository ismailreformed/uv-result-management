<?php

namespace App\Livewire\StudentSubject;

use App\Livewire\Forms\StudentForm;
use App\Livewire\Forms\StudentSubjectForm;
use App\Models\Department;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use LivewireUI\Modal\ModalComponent;

class CreateStudentSubject extends ModalComponent
{
    public StudentSubjectForm $form;

    public function save()
    {
        $this->form->store();

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
