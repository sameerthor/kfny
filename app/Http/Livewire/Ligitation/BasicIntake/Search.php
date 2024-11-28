<?php

namespace App\Http\Livewire\Ligitation\BasicIntake;

use Livewire\Component;
use App\Models\BasicIntake;

class Search extends Component
{
    public $search = '';

    public $basic_intake_id = '';
    protected $listeners = ['formdataAdded', 'advanceSearchEmit'];

    
    public function render()
    {
        $basicIntake = BasicIntake::find($this->search);
        $sibling_data = [];
        $this->emit('formdataChange', $basicIntake?->id);
        $this->basic_intake_id = $basicIntake?->id;
        if (!empty($basicIntake)) {
            $sibling_data = BasicIntake::where('patient_id', $basicIntake->patient_id)->whereNot('id', $basicIntake->id)->get();
        }

        return view('livewire.ligitation.basic-intake.search', ['data' => $basicIntake, 'siblings' => $sibling_data]);
    
      
    }

    public function formdataAdded($id)
    {
        $this->search = $id;
    }

    public function changeFile($no)
    {
        $this->search = $no;
    }

  

    public function updateIndex($in)
    {
        $found = BasicIntake::where('index_number', $in)->first();
        if (!empty($found)) {
            $this->search = $found->id;
        } else {
            $this->search = "";
        }
    }

    public function updateNotes($column, $value)
    {
        BasicIntake::where('id', $this->basic_intake_id)->update([$column => $value]);
    }

    public function advanceSearchEmit($id)
    {
        $this->search = $id;
    }
}
