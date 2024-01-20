<?php

namespace App\Livewire\ResultGeneration;

use App\Models\Mark;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ResultGenerationComponent extends Component
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

    public $tabs = ['Individual Result', 'Combined Result'];
    public $activeTab = 'Individual Result';

    public function changeTab($tab)
    {
        $this->activeTab = $tab;
    }

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
        return view('livewire.result-generation.result-generation-component');
    }
}
