<?php

namespace App\Livewire\Forms;

use App\Models\Exam;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ExamForm extends Form
{
    public ?Exam $model;

    #[Validate]
    public $name = '';
    public $id = '';
    public $session = '';

    public $editMode = false;

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('exams')->ignore($this->id),
            ],
            'session' => 'required|string|max:56'
        ];
    }

    public function setModel(Exam $model)
    {
        $this->model = $model;

        $this->name = $model->name;
        $this->id = $model->id;
        $this->session = $model->session;
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();

        Exam::create([
            'name' => $this->name,
            'session' => $this->session,
            'created_by_user_id' => auth()->id()
        ]);

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->model->update([
            'name' => $this->name,
            'session' => $this->session,
            'updated_by_user_id' => auth()->id(),
        ]);

        $this->reset();
    }
}
