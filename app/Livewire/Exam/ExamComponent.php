<?php

namespace App\Livewire\Exam;

use App\Models\Exam;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ExamComponent extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $search = '';

    public $name = '';

    #[Url(history:true)]
    public $sortBy = 'created_at';

    #[Url(history:true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 5;


    public function updatedSearch(){
        $this->resetPage();
    }

    public function delete(Exam $exam){
        $exam->delete();
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
        return view('livewire.exam.exam-component',
            [
                'exams' => Exam::search($this->search)
                    ->orderBy($this->sortBy,$this->sortDir)
                    ->paginate($this->perPage)
            ]
        );
    }
}
