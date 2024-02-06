<?php

namespace App\Livewire\ResultGeneration;

use App\Models\Department;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Mark;
use App\Models\Semester;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ResultGenerationComponent extends Component
{
    use WithPagination;

    #[Validate]
    public $student_id = '';
    #[Validate]
    public $semester_id = '';
    #[Validate]
    public $exam_id = '';
    public $department_name = '';

    public $student = '';
    public $semester = '';
    public $exam = '';
    public $gpa = '';
    public array $results = [];

    public $tabs = ['Individual Result', 'Combined Result'];
    public $activeTab = 'Individual Result';


    public function changeTab($tab)
    {
        $this->activeTab = $tab;
    }

    #[On('student-selected')]
    public function updateStudentId($student)
    {
        $this->student = $student;
        $this->student_id = $student['id'];
    }

    public function mount()
    {
        $this->department_name = '';
    }

    public function updatedSemesterId($value)
    {
        $this->semester = Semester::find($value);
    }

    public function updatedExamId($value)
    {
        $this->exam = Exam::find($value);
    }


    public function rules()
    {
        return [
            'student_id' => 'required|exists:students,id',
            'semester_id' => 'required|exists:semesters,id',
            'exam_id' => 'required|exists:exams,id',
        ];
    }

    public function searchResult()
    {
        $this->validate();

        $marks = Mark::query()
            ->where('student_id', $this->student_id)
            ->where('semester_id', $this->semester_id)
            ->where('exam_id', $this->exam_id)
            ->get();

        $this->results = $marks->map(function ($result) {
            return [
              'subject_name' => $result->subject->name,
              'subject_code' => $result->subject->code,
              'credit_hours' => $result->subject->credit_hours,
              'credit_earned' => $result->credit_earned,
              'grade_letter' => $result->grade->grade_letter,
            ];
        })->toArray();

        $this->gpa = round($marks->sum(function ($result) {
            return $result->credit_earned;
        }) / $marks->sum(function ($result) {
                return $result->subject->credit_hours;
            }), 3);
    }

    public function render()
    {
        $exams = Exam::all();
        $grades = Grade::all()->sortByDesc('id');
        $semesters = Semester::all();
        $departments = Department::all();

        return view('livewire.result-generation.result-generation-component', compact(  'departments','exams', 'grades', 'semesters'));
    }
}
