<?php

namespace App\Livewire\Forms;

use App\Models\Mark;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class
MarkForm extends Form
{
    public ?Mark $model;

    public $id = '';
    #[Validate]
    public $student_id = '';
    #[Validate]
    public $semester_id = '';
    #[Validate]
    public $subject_id = '';
    #[Validate]
    public $exam_id = '';
    #[Validate]
    public $grade_id = '';
    #[Validate]
    public $number = '';
    #[Validate]
    public $credit_earned = '';
    #[Validate]
    public $gp_earned = '';
    #[Validate]
    public $remarks = '';

    public $editMode = false;

    public function rules()
    {
        return [
            'student_id' => 'required|exists:students,id',
            'semester_id' => 'required_with:student_id|exists:semesters,id',
//            'subject_id' => 'required_with:semester_id|exists:subjects,id',
            'exam_id' => 'required|exists:exams,id',
            'number' => 'nullable|numeric',
            'grade_id' => 'required|exists:grades,id',
            'credit_earned' => 'nullable|numeric',
            'gp_earned' => 'nullable|numeric',
            'remarks' => 'nullable|string',
            'subject_id' => ['required', 'exists:subjects,id' ,Rule::unique('marks')->where(function ($query) {
                return $query->where('student_id', $this->student_id)
                    ->where('semester_id', $this->semester_id)
                    ->where('subject_id', $this->subject_id)
                    ->where('exam_id', $this->exam_id);
            })]
        ];
    }

    public function setModel(Mark $model)
    {
        $this->model = $model;
        $this->id = $model->id;
        $this->student_id = $model->student_id;
        $this->semester_id = $model->semester_id;
        $this->exam_id = $model->exam_id;
        $this->subject_id = $model->subject_id;
        $this->number = $model->number;
        $this->grade_id = $model->grade_id;
        $this->credit_earned = $model->credit_earned;
        $this->gp_earned = $model->gp_earned;
        $this->remarks = $model->remarks;
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();

        Mark::create([
            'student_id' => $this->student_id,
            'semester_id' => $this->semester_id,
            'exam_id' => $this->exam_id,
            'subject_id' => $this->subject_id,
            'number' => $this->number,
            'grade_id' => $this->grade_id,
            'credit_earned' => $this->credit_earned,
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
            'exam_id' => $this->exam_id,
            'subject_id' => $this->subject_id,
            'number' => $this->number,
            'grade_id' => $this->grade_id,
            'credit_earned' => $this->credit_earned,
            'updated_by_user_id' => auth()->id(),
        ]);

        $this->reset();
    }
}
