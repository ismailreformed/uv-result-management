<?php

namespace App\Livewire\ResultGeneration;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Mark;
use App\Models\Semester;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ResultGenerationComponent extends Component
{
    use WithPagination;

    public $student_id = '';
    public $semester_id = '';
    public $exam_id = '';

    public $tabs = ['Individual Result', 'Combined Result'];
    public $activeTab = 'Individual Result';

    public function changeTab($tab)
    {
        $this->activeTab = $tab;
    }

    #[On('student-selected')]
    public function updateStudentId($student)
    {
        $this->student_id = $student['id'];
    }

    public function render()
    {
        $exams = Exam::all();
        $grades = Grade::all()->sortByDesc('id');
        $semesters = Semester::all();

        return view('livewire.result-generation.result-generation-component', compact( 'exams', 'grades', 'semesters'));
    }
}
