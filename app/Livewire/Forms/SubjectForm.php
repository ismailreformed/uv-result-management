<?php

namespace App\Livewire\Forms;

use App\Models\Subject;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class
SubjectForm extends Form
{
    public ?Subject $model;


    #[Validate]
    public $name = '';
    public $id = '';
    #[Validate]
    public $department_id = null;
    #[Validate]
    public $code = '';
    #[Validate]
    public $credit_hours = '';

    public $editMode = false;

    public function rules()
    {
        return [
            'department_id' => [
                'required',
                'exists:departments,id'
            ],
            'name' => [
                'required',
                "min:2",
                Rule::unique('subjects')->ignore($this->id),
            ],
            'code' => 'required|max:10',
            'credit_hours' => 'required|numeric|min:1|max:5'
        ];
    }

    public function setModel(Subject $model)
    {
        $this->model = $model;
        $this->id = $model->id;
        $this->name = $model->name;
        $this->code = $model->code;
        $this->credit_hours = $model->credit_hours;
        $this->department_id = $model->department_id;
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();

        Subject::create([
            'name' => $this->name,
            'code' => $this->code,
            'credit_hours' => $this->credit_hours,
            'department_id' => $this->department_id,
            'created_by_user_id' => auth()->id()
        ]);

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->model->update([
            'name' => $this->name,
            'code' => $this->code,
            'credit_hours' => $this->credit_hours,
            'department_id' => $this->department_id,
            'updated_by_user_id' => auth()->id(),
        ]);

        $this->reset();
    }
}
