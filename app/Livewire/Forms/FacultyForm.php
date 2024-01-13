<?php

namespace App\Livewire\Forms;

use App\Models\Faculty;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FacultyForm extends Form
{
    public ?Faculty $faculty;

    #[Validate]
    public $name = '';
    public $editMode = false;

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('faculties')->ignore($this->faculty->id),
            ],
        ];
    }

    public function setFaculty(Faculty $faculty)
    {
        $this->faculty = $faculty;

        $this->name = $faculty->name;
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();

        Faculty::create([
            'name' => $this->name,
            'created_by_user_id' => auth()->id()
        ]);

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->faculty->update([
            'name' => $this->name,
            'updated_by_user_id' => auth()->id(),
        ]);

        $this->reset();
    }
}
