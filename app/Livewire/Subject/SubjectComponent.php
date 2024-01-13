<?php

namespace App\Livewire\Subject;

use App\Models\Subject;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SubjectComponent extends Component
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

    public function delete(Subject $subject){
        $subject->delete();
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
        return view('livewire.subject.subject-component',
            [
                'subjects' => Subject::search($this->search)
                    ->orderBy($this->sortBy,$this->sortDir)
                    ->paginate($this->perPage)
            ]
        );
    }
}
