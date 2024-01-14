<?php

namespace App\Livewire\Grade;

use App\Models\Grade;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class GradeComponent extends Component
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

    public function delete(Grade $grade){
        $grade->delete();
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
        return view('livewire.grade.grade-component',
            [
                'grades' => Grade::search($this->search)
                    ->orderBy($this->sortBy,$this->sortDir)
                    ->paginate($this->perPage)
            ]
        );
    }
}
