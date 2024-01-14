<?php

namespace App\Livewire\Forms;

use App\Models\StudentSubject;
use App\Models\Subject;
use Livewire\Attributes\Validate;
use Livewire\Form;

class
StudentSubjectForm extends Form
{
    public ?StudentSubject $model;


    #[Validate]
    public $id = '';
    #[Validate]
    public $student_id = null;
    #[Validate]
    public $semester_id = null;
    #[Validate]
    public $subject_id = null;

    public $editMode = false;

    public function rules()
    {
        return [
            'student_id' => [
                'required',
                'exists:students,id'
            ],
            'semester_id' => [
                'required',
                "exists:semesters,id",
            ],
            'subject_id' => 'required|exists:subjects,id',
        ];
    }

    public function setModel(StudentSubject $model)
    {
        $this->model = $model;
        $this->id = $model->id;
        $this->student_id = $model->student_id;
        $this->semester_id = $model->semester_id;
        $this->subject_id = $model->subject_id;
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();

        StudentSubject::create([
            'student_id' => $this->student_id,
            'semester_id' => $this->semester_id,
            'subject_id' => $this->subject_id,
            'created_by_user_id' => auth()->id()
        ]);

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->model->update([
            'student_id' => $this->student_id,
            'semester_id' => $this->semester_id,
            'subject_id' => $this->subject_id,
            'updated_by_user_id' => auth()->id(),
        ]);

        $this->reset();
    }
}
