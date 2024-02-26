<?php

namespace App\Livewire\ResultGeneration;

use App\Models\Department;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Mark;
use App\Models\Semester;
use App\Models\Student;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ResultGenerationComponent extends Component
{
    use WithPagination;

    public $exams = '';
    public $departments = '';
    public $semesters = '';
    public $grades = '';

    #[Validate]
    public $student_id = '';
    #[Validate]
    public $department_id = '';
    #[Validate]
    public $semester_id = '';
    #[Validate]
    public $exam_id = '';
    public $prepared_by = '';
    public $compared_by = '';
    public $chairman = '';
    public $controller_of_exams = '';
    public $enrollment_date = '';
    public $department_name = '';

    public $student = '';
    public $semester = '';
    public $exam = '';
    public $gpa = '';
    public array $results = [];
    public array $combinedResults = [];
    public array $uniqueSubjects = [];

    public $tabs = ['Individual Result', 'Combined Result'];
    public $activeTab = 'Combined Result';


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
        $this->exams = Exam::all();
        $this->grades = Grade::all()->sortByDesc('id');
        $this->semesters = Semester::all();
        $this->departments = Department::all();
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
            'department_id' => 'required_without:student_id|exists:departments,id',
            'student_id' => 'required_without:department_id|exists:students,id',
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

    public function searchCombinedResult()
    {
        $this->validate();

        $marks = Mark::query()
            ->select('marks.*', 'students.id as student_id', 'students.name as name', 'students.roll as roll')
            ->leftJoin('students', 'marks.student_id', '=', 'students.id')
            ->where('semester_id', $this->semester_id)
            ->where('exam_id', $this->exam_id)
            ->where('students.department_id', '=', $this->department_id )
            ->get()
            ->groupBy('student_id');


        $this->combinedResults = $marks->map(function ($mark) {
            $studentInfo = [
                'student_id' => $mark[0]['student_id'],
                'name' => $mark[0]['name'],
                'roll' => $mark[0]['roll']
            ];

            $studentInfo['marks'] = $mark->map(function ($result) {
                return [
                    'subject_name' => $result->subject->name,
                    'subject_code' => $result->subject->code,
                    'credit_hours' => $result->subject->credit_hours,
                    'credit_earned' => $result->credit_earned,
                    'grade_letter' => $result->grade->grade_letter,
                ];
            });

            $studentInfo['credit_earned'] = $studentInfo['marks']->sum('credit_hours');

            $studentInfo['gp_earned'] = $studentInfo['marks']->sum('credit_earned');

            $studentInfo['gpa'] = round($studentInfo['gp_earned'] / $studentInfo['credit_earned'], 2);

            return $studentInfo;
        })->toArray();

        $uniqueSubjects = [];

        foreach ($this->combinedResults as $student) {
            foreach ($student['marks'] as $mark) {
                // Extract subject information
                $subjectName = $mark['subject_name'];
                $subjectCode = $mark['subject_code'];
                $creditHours = $mark['credit_hours'];

                // Store subject information if not already stored
                if (!isset($uniqueSubjects[$subjectCode])) {
                    $uniqueSubjects[$subjectCode] = [
                        'subject_name' => $subjectName,
                        'credit_hours' => $creditHours,
                        'subject_code' => $subjectCode
                    ];
                }
            }
        }

        $this->uniqueSubjects = $uniqueSubjects;
    }

    public function render()
    {
        return view('livewire.result-generation.result-generation-component',
            [
                'departments' => $this->departments,
                'exams' => $this->exams,
                'grades' => $this->grades,
                'semesters' => $this->semesters
            ]);
    }
}
