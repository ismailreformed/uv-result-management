<?php

namespace App\Livewire\Forms;

use App\Models\Semester;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SemesterForm extends Form
{
    public ?Semester $model;

    #[Validate]
    public $name = '';
    public $id = '';
    public $duration_in_month = '';

    public $editMode = false;

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('faculties')->ignore($this->id),
            ],
            'duration_in_month' => 'required|numeric|max:12'
        ];
    }

    public function setModel(Semester $model)
    {
        $this->model = $model;

        $this->name = $model->name;
        $this->id = $model->id;
        $this->duration_in_month = $model->duration_in_month;
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();

        Semester::create([
            'name' => $this->name,
            'duration_in_month' => $this->duration_in_month,
            'created_by_user_id' => auth()->id()
        ]);

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->model->update([
            'name' => $this->name,
            'duration_in_month' => $this->duration_in_month,
            'updated_by_user_id' => auth()->id(),
        ]);

        $this->reset();
    }
}
