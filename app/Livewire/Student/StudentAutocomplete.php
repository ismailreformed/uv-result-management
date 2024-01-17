<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class StudentAutocomplete extends Component
{
    public $showList = false;
    public $query = '';
    public $students = [];

    public function queryUpdated()
    {
        if(empty($this->query)) {
            $this->showList = false;
        }

        $students = Student::where('name', 'like', '%' . $this->query . '%')
            ->orWhere('roll', 'like', '%' . $this->query . '%')
            ->get();

        $this->students = $students;
    }

    public function selectStudent($studentId)
    {
        $selectedStudent = Student::find($studentId);
        $this->query = sprintf('%s - %s', $selectedStudent->roll, $selectedStudent->name);
        $this->dispatch('studentSelected', $selectedStudent);
    }

    public function toggleList(bool $value)
    {
        $this->showList = $value;
    }

    public function render()
    {
        return view('livewire.student.student-autocomplete');
    }
}
