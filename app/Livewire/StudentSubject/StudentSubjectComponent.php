<?php

namespace App\Livewire\StudentSubject;

use App\Models\Student;
use App\Models\StudentSubject;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class StudentSubjectComponent extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $search = '';

    #[Url(history:true)]
    public $sortBy = 'created_at';

    #[Url(history:true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 5;


    public function updatedSearch(){
        $this->resetPage();
    }

    public function delete(StudentSubject $studentSubject){
        $studentSubject->delete();
    }

    public function setSortBy($sortByField){

        if($this->sortBy === $sortByField){
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function render()
    {
        return view('livewire.student-subject.student-subject-component',
            [
                'student_subjects' => StudentSubject::orderBy($this->sortBy,$this->sortDir)
                    ->paginate($this->perPage)
            ]
        );
    }
}
