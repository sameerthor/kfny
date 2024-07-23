<?php

namespace App\Http\Livewire\EOU;

use Livewire\Component;

class Form extends Component
{
    public $formStatus="readonly";
    public function render()
    {
        return view('livewire.e-o-u.form');
    }

    public function addNew(){
        $this->formStatus="editable";
    }
}

