<?php

namespace App\Http\Livewire\Ligitation\BasicIntake;

use App\Models\PatientInfo;
use Livewire\Component;
use App\Models\BasicIntake;
use App\Models\InsuranceCompany;
use App\Models\ProvoiderInformation;
use App\Models\Venue;
use App\Models\DefenseFirm;
use App\Models\CaseStatus;
use App\Models\Judge;

class AddForm extends Component
{
    public $basicIntakeData = [];
    public $patient_id;
    public $basic_intake_id;
    public $leftForm;
    public $rightForm;
    public $leftFormStatus = "readonly";
    public $rightFormStatus = "readonly";
    protected $listeners = ['formdataChange'];
    public function render()
    {
        $insuranceId = InsuranceCompany::orderBy('id', 'desc')->get();
        ;
        $provoiderId = ProvoiderInformation::orderBy('id', 'desc')->get();
        $defenceFirm = DefenseFirm::orderBy('id', 'desc')->get();
        $venueCounty = Venue::all();
        $judges = Judge::all();
        $case_statuses = CaseStatus::orderBy('id', 'desc')->get();
        $info = $this->basicIntakeData;
        return view('livewire.ligitation.basic-intake.add-form', compact('case_statuses','info', 'judges', 'venueCounty', 'defenceFirm', 'insuranceId', 'provoiderId'));
    }
    public function formdataChange($id)
    {
        $this->basicIntakeData = BasicIntake::find($id);
        $this->basic_intake_id = $id;
        $this->patient_id = $this->basicIntakeData?->patient_id;
        $this->leftForm= $this->basicIntakeData?->patient?->toArray();
        $this->rightForm= $this->basicIntakeData?->toArray();
       
    }

    public function editable($formType)
    {
        if ($formType == "left")
            $this->leftFormStatus = "editable";
        else
            $this->rightFormStatus = "editable";
    }

    public function readonly($formType)
    {
        if ($formType == "left")
            $this->leftFormStatus = "readonly";
        else
            $this->rightFormStatus = "readonly";
    }

    public function addNew($formType)
    {
        if ($formType == "left")
        {

            $this->leftFormStatus = "editable";
            $this->rightFormStatus = "readonly";
            $this->leftForm=null;
            $this->rightForm=null;
            $this->patient_id=null;
            $this->basic_intake_id = null;
            $this->basicIntakeData=null;
        }   
        else
        {
            $this->rightFormStatus = "editable";
            $this->rightForm=null;
            $this->basicIntakeData=null;
            $this->basic_intake_id = null;
        }
    }

    public function submitLeftForm()
    {
        $data = $this->leftForm;
        $id = $this->patient_id;
        unset($data['created_at']);
        unset($data['updated_at']);
        if (empty($id)) {
           $res= PatientInfo::create($data);
           $this->patient_id = $res->id;
        } else {
            PatientInfo::find($id)->update($data);
        }
        $this->leftFormStatus = "readonly";

    }

    public function submitRightForm()
    {
        $data = $this->rightForm;
        $id = $this->basic_intake_id;
        $data['patient_id']=$this->patient_id;
       
        
        if (empty($id)) {
           $res= BasicIntake::create($data);
           $this->basic_intake_id = $res->id;
           $this->emit('formdataAdded',$res->id);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            unset($data['patient']);
        
            BasicIntake::where('id', $id)->update($data);
        }
        $this->rightFormStatus = "readonly";
        $this->emit('formdataAdded',$this->basic_intake_id);

    }
}
