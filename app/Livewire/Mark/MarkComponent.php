<?php

namespace App\Livewire\Mark;

use App\Models\Mark;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class MarkComponent extends Component
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

    public function delete(Mark $mark){
        $mark->delete();
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
        return view('livewire.mark.mark-component',
            [
                'marks' => Mark::orderBy($this->sortBy,$this->sortDir)
                    ->paginate($this->perPage)
            ]
        );
    }
}
