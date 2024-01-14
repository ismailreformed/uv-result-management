<?php

namespace App\Livewire\Forms;

use App\Models\Grade;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GradeForm extends Form
{
    public ?Grade $model;

    public $id = '';
    #[Validate]
    public $title = '';
    #[Validate]
    public $grade_letter = '';
    #[Validate]
    public $grade_point = '';

    public $editMode = false;

    public function rules()
    {
        return [
            'title' =>  'required|string|max:128',
            'grade_letter' => [
                'required',
                Rule::unique('grades')->ignore($this->id),
            ],
            'grade_point' => 'required|numeric|max:4'
        ];
    }

    public function setModel(Grade $model)
    {
        $this->model = $model;

        $this->id = $model->id;
        $this->title = $model->title;
        $this->grade_letter = $model->grade_letter;
        $this->grade_point = $model->grade_point;
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();

        Grade::create([
            'title' => $this->title,
            'grade_letter' => $this->grade_letter,
            'grade_point' => $this->grade_point,
            'created_by_user_id' => auth()->id()
        ]);

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->model->update([
            'title' => $this->title,
            'grade_letter' => $this->grade_letter,
            'grade_point' => $this->grade_point,
            'updated_by_user_id' => auth()->id(),
        ]);

        $this->reset();
    }
}
