<?php

namespace App\Http\Livewire\Ligitation\Motion;

use App\Models\Appeal;
use App\Models\Arbitration;
use App\Models\Arbitrator;
use Livewire\Component;
use App\Models\Motion;
use App\Models\MotionAdjourned;
use App\Models\Trial;
use App\Models\TrialDate;
use App\Models\Judge;


class Form extends Component
{

    public $leftMotionForm;
    public $motionVisible = false;
    public $trialVisible = false;
    public $arbsVisible = false;
    public $appealsVisible = false;
    public $rightMotionForm;
    public $leftTrialForm;
    public $rightTrialForm;
    public $basic_intake_id;
    public $motions;
    public $motion_id;
    public $motion_adj_id;
    public $trial_id;
    public $trial_date_id;
    public $arbitrations;
    public $arbitration_id;
    public $arbitrationForm;
    public $appeals;
    public $appeal_id;
    public $appealForm;
    public $leftMotionFormStatus = "readonly";
    public $rightMotionFormStatus = "editable";
    public $leftTrialFormStatus = "readonly";
    public $rightTrialFormStatus = "editable";
    protected $listeners = ['formdataChange'];

    public function render()
    {
        $judges = Judge::all();
        $arbitration_data = Arbitrator::all();
        $trialDates=TrialDate::where('trial_id',$this->trial_id)->get();
        return view('livewire.ligitation.motion.form', compact('judges', 'arbitration_data','trialDates'));
    }

    public function addNewMotion($formType)
    {
        if ($formType == "left") {
            $this->leftMotionFormStatus = "editable";
            $this->leftMotionForm = is_array($this->leftMotionForm) ? array_fill_keys(array_keys($this->leftMotionForm), null) : null;
            $this->rightMotionForm = null;
            $this->motion_adj_id = null;
            $this->motion_id = null;
        } else {
            $this->rightMotionFormStatus = "editable";
            $this->rightMotionForm = is_array($this->rightMotionForm) ? array_fill_keys(array_keys($this->rightMotionForm), null) : null;
            $this->rightMotionForm = null;
            $this->motion_adj_id = null;
            $this->dispatchBrowserEvent('addAdjMotion');
        }
    }


    public function addNewTrial($formType)
    {
        if ($formType == "left") {
            $this->leftTrialFormStatus = "editable";
            $this->leftTrialForm = is_array($this->leftTrialForm) ? array_fill_keys(array_keys($this->leftTrialForm), null) : null;
            $this->rightTrialForm = null;
            $this->trial_date_id = null;
            $this->trial_id = null;
        } else {
            $this->rightTrialFormStatus = "editable";
            $this->rightTrialForm = is_array($this->rightTrialForm) ? array_fill_keys(array_keys($this->rightTrialForm), null) : null;
            $this->rightTrialForm = null;
            $this->trial_date_id = null;
            $this->dispatchBrowserEvent('addTrialDate');
        }
    }


    public function editableMotion($formType)
    {
        if ($formType == "left")
            $this->leftMotionFormStatus = "editable";
        else
            $this->rightMotionFormStatus = "editable";
    }

    public function editableTrial($formType)
    {
        if ($formType == "left")
            $this->leftTrialFormStatus = "editable";
        else
            $this->rightTrialFormStatus = "editable";
    }

    public function submitLeftMotionForm()
    {

        $basic_intake_id = $this->basic_intake_id;
        $data = $this->leftMotionForm;
        $data['basic_intake_id'] = $basic_intake_id;
        $id = $this->motion_id;
        if (empty($id)) {
            $this->motion_id = Motion::create($data)->id;
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            Motion::where('id', $id)->update($data);
        }
        $this->leftMotionFormStatus = "readonly";
        $this->motions = Motion::where('basic_intake_id', $basic_intake_id)->get();
    }

    public function submitLeftTrialForm()
    {

        $basic_intake_id = $this->basic_intake_id;
        $data = $this->leftTrialForm;
        $data['basic_intake_id'] = $basic_intake_id;
        $id = $this->trial_id;
        if (empty($id)) {
            $this->trial_id = Trial::create($data)->id;
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            Trial::where('id', $id)->update($data);
        }
        $this->leftTrialFormStatus = "readonly";
    }

    public function submitRightMotionForm()
    {

        $data = $this->rightMotionForm;
        $id = $this->motion_adj_id;
        $data['motion_id'] = $this->motion_id;
        if (empty($id)) {
            MotionAdjourned::create($data);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            MotionAdjourned::where('id', $id)->update($data);
        }
        $this->rightMotionFormStatus = "readonly";
        $this->dispatchBrowserEvent('saveAdjMotion');
        $this->motions = Motion::where('basic_intake_id', $this->basic_intake_id)->get();
    }

    public function submitRightTrialForm()
    {

        $data = $this->rightTrialForm;
        $id = $this->trial_date_id;
        $data['trial_id'] = $this->trial_id;
        if (empty($id)) {
            TrialDate::create($data);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            TrialDate::where('id', $id)->update($data);
        }
        $this->rightTrialFormStatus = "readonly";
        $this->dispatchBrowserEvent('saveTrialDate');
    }

    public function formdataChange($id)
    {
        $this->motions = Motion::where('basic_intake_id', $id)->get();
        $this->leftTrialForm = Trial::where('basic_intake_id', $id)->first()?->toArray();
        $this->arbitrations = Arbitration::where('basic_intake_id', $id)->get();
        $this->appeals = Appeal::where('basic_intake_id', $id)->get();

        if (count($this->motions) > 0) {
            $this->motionVisible = true;
        } else {
            $this->motionVisible = false;
        }

        if (!empty($this->leftTrialForm)) {
            $this->trialVisible = true;
            $this->trial_id = $this->leftTrialForm['id'];
        } else {
            $this->trialVisible = false;
            $this->trial_id = null;
        }

        if (count($this->arbitrations) > 0) {
            $this->arbsVisible = true;
        } else {
            $this->arbsVisible = false;
        }

        if (count($this->appeals) > 0) {
            $this->appealsVisible = true;
        } else {
            $this->appealsVisible = false;
        }

        $this->leftMotionForm = null;
        $this->rightMotionForm = null;
        $this->rightTrialForm = null;
        $this->motion_adj_id = null;
        $this->motion_id = null;
        $this->trial_date_id = null;
        $this->arbitrationForm = null;
        $this->arbitration_id = null;
        $this->basic_intake_id = $id;
       
    }

    public function readonlyMotion($formType)
    {

        if ($formType == "left") {
            $this->leftMotionFormStatus = "readonly";
            $this->leftMotionForm = Motion::where('id', $this->motion_id)->first()?->toArray();
        } else {
            $this->rightMotionFormStatus = "readonly";
            $this->rightMotionForm = MotionAdjourned::where('id', $this->motion_adj_id)->first()?->toArray();
        }
    }

    public function readonlyTrial($formType)
    {

        if ($formType == "left") {
            $this->leftTrialFormStatus = "readonly";
            $this->leftTrialForm = Trial::where('id', $this->trial_id)->first()?->toArray();
        } else {
            $this->rightTrialFormStatus = "readonly";
            $this->rightTrialForm = TrialDate::where('id', $this->trial_date_id)->first()?->toArray();
        }
    }

    public function editAdjMotion($id)
    {
        $this->motion_adj_id = $id;
        $this->rightMotionFormStatus = "editable";
        $this->rightMotionForm = MotionAdjourned::where('id', $this->motion_adj_id)->first()?->toArray();
        $this->dispatchBrowserEvent('editAdjMotion');
    }


    public function editTrialDate($id)
    {
        $this->trial_date_id = $id;
        $this->rightTrialFormStatus = "editable";
        $this->rightTrialForm = TrialDate::where('id',  $this->trial_date_id)->first()?->toArray();
        $this->dispatchBrowserEvent('editTrialDate');
    }

    public function editMotion($id)
    {
        $this->motion_id = $id;
        $this->motion_adj_id = null;
        $this->rightMotionForm = null;
        $this->leftMotionForm = Motion::where('id', $this->motion_id)->first()?->toArray();
    }


    public function editTrial($id)
    {
        $this->trial_id = $id;
        $this->trial_date_id = null;
        $this->rightTrialForm = null;
        $this->leftTrialForm = Trial::where('id', $this->trial_id)->first()?->toArray();
    }

    public function editArbitration($id)
    {
        $this->arbitration_id = $id;
        $this->arbitrationForm = Arbitration::where('id', $id)->first()?->toArray();
        $this->dispatchBrowserEvent('editArbitration');
    }


    public function addNewArbitation()
    {
        $this->arbitration_id = null;
        $this->arbitrationForm = null;
        $this->dispatchBrowserEvent('addArbitration');
    }

    public function submitArbitrationForm()
    {

        $data = $this->arbitrationForm;
        $id = $this->arbitration_id;
        $data['basic_intake_id'] = $this->basic_intake_id;
        if (empty($id)) {
            Arbitration::create($data);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            Arbitration::where('id', $id)->update($data);
        }

        $this->dispatchBrowserEvent('saveArbitration');
        $this->arbitrations = Arbitration::where('basic_intake_id', $this->basic_intake_id)->get();
    }

    public function setArbVisible()
    {
        $this->arbsVisible = true;
        $this->dispatchBrowserEvent('addArbitration');
    }

    public function editAppeal($id)
    {
        $this->appeal_id = $id;
        $this->appealForm = Appeal::where('id', $id)->first()?->toArray();
        $this->dispatchBrowserEvent('editAppeal');
    }


    public function addNewAppeal()
    {
        $this->appeal_id = null;
        $this->appealForm = null;
        $this->dispatchBrowserEvent('addAppeal');
    }

    public function submitAppealForm()
    {

        $data = $this->appealForm;
        $id = $this->appeal_id;
        $data['basic_intake_id'] = $this->basic_intake_id;
        if (empty($id)) {
            Appeal::create($data);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            Appeal::where('id', $id)->update($data);
        }

        $this->dispatchBrowserEvent('saveAppeal');
        $this->appeals = Appeal::where('basic_intake_id', $this->basic_intake_id)->get();
    }

    public function setAppealVisible()
    {
        $this->appealsVisible = true;
        $this->dispatchBrowserEvent('addAppeal');
    }
}
