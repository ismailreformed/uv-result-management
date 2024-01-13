<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class CreateFacultyModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.create-faculty-modal');
    }
}
