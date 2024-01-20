<?php

namespace App\Livewire\Subject;

use App\Models\Student;
use App\Models\Subject;
use Livewire\Component;

class SubjectAutocomplete extends Component
{
    public $showList = false;
    public $query = '';
    public $subjects = [];


    // This lifecycle hook is called when the component receives new parameters
    public function mount($selectedSubject = null)
    {
        if($selectedSubject instanceof Subject) {
            $this->subjects = [$selectedSubject];
            $this->query = sprintf('%s - %s', $selectedSubject->code, $selectedSubject->name);
            $this->dispatch('subject-selected', $selectedSubject);
        }
    }

    public function queryUpdated()
    {
        if(empty($this->query)) {
            $this->showList = false;
        }

        $subjects = Subject::where('name', 'like', '%' . $this->query . '%')
            ->orWhere('code', 'like', '%' . $this->query . '%')
            ->get();

        $this->subjects = $subjects;
    }

    public function selectSubject($id)
    {
        $selectedSubject = Subject::find($id);
        $this->query = sprintf('%s - %s', $selectedSubject->code, $selectedSubject->name);
        $this->dispatch('subject-selected', $selectedSubject);
    }

    public function toggleList(bool $value)
    {
        $this->showList = $value;
    }

    public function render()
    {
        return view('livewire.subject.subject-autocomplete');
    }
}
