<?php

namespace App\Livewire\Forms;

use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Form;

class
StudentForm extends Form
{
    public ?Student $model;


    #[Validate]
    public $name = '';
    #[Validate]
    public $roll = '';
    public $id = '';
    #[Validate]
    public $department_id = null;
    #[Validate]
    public $session = '';
    #[Validate]

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
                "min:2"
            ],
            'roll' => 'required|max:20',
            'session' => 'string'
        ];
    }

    public function setModel(Student $model)
    {
        $this->model = $model;
        $this->id = $model->id;
        $this->name = $model->name;
        $this->session = $model->session;
        $this->roll = $model->roll;
        $this->department_id = $model->department_id;
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();

        Student::create([
            'name' => $this->name,
            'roll' => $this->roll,
            'session' => $this->session,
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
            'roll' => $this->roll,
            'session' => $this->session,
            'department_id' => $this->department_id,
            'updated_by_user_id' => auth()->id(),
        ]);

        $this->reset();
    }
}
