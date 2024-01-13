<?php

namespace App\Livewire\Forms;

use App\Models\Department;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class
DepartmentForm extends Form
{
    public ?Department $department;

    #[Validate]
    public $name = '';
    public $id = '';
    public $faculty_id = null;

    public $editMode = false;

    public function rules()
    {
        return [
            'name' => [
                'required',
                "min:2",
                Rule::unique('departments')->ignore($this->id),
            ],
            'faculty_id' => [
                'required',
                'exists:faculties,id'
            ],
        ];
    }

    public function setDepartment(Department $department)
    {
        $this->department = $department;

        $this->name = $department->name;
        $this->id = $department->id;
        $this->faculty_id = $department->faculty_id;
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();

        Department::create([
            'name' => $this->name,
            'faculty_id' => $this->faculty_id,
            'created_by_user_id' => auth()->id()
        ]);

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->department->update([
            'name' => $this->name,
            'faculty_id' => $this->faculty_id,
            'updated_by_user_id' => auth()->id(),
        ]);

        $this->reset();
    }
}
