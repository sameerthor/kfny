<?php

namespace App\Http\Livewire\Ligitation\BasicIntake;

use Livewire\Component;
use App\Models\InsuranceCompany;
use App\Models\PatientInfo;
use App\Models\BasicIntake;
class AdvanceSearch extends Component
{
    public $Search;

    public $searchResults;
    public function render()
    {
        $insuranceId = InsuranceCompany::orderBy('id', 'desc')->get();
        return view('livewire.ligitation.basic-intake.advance-search',compact('insuranceId'));
    }

    public function advanceSearch(){
        if(!empty($this->Search))
        {
            $filtered = array_filter($this->Search);
            $this->searchResults=BasicIntake::whereHas('patient', function ($query) use( $filtered) {
                return $query->where($filtered);
            })->get();
        }else{
            $this->searchResults=[];
        }
        
    }

    public function ViewCase($id){
        $this->emitUp('advanceSearchEmit',$id);

    }

    public function resetForm()
    {
        $this->dispatchBrowserEvent('resetAdvance');
        $this->searchResults=[];
        $this->Search=[];

    }

}
