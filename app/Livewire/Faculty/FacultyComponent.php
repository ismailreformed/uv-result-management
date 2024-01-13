<?php

namespace App\Livewire\Faculty;

use App\Models\Faculty;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class FacultyComponent extends Component
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

    public function delete(Faculty $faculty){
        $faculty->delete();
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
        return view('livewire.faculty.faculty-component',
            [
                'faculties' => Faculty::search($this->search)
                    ->orderBy($this->sortBy,$this->sortDir)
                    ->paginate($this->perPage)
            ]
        );
    }
}
