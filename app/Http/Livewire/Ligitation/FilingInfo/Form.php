<?php

namespace App\Http\Livewire\Ligitation\FilingInfo;

use Livewire\Component;
use App\Models\FilingInformation;
use App\Models\Discovery;
use App\Models\DiscoverySchedule;
use App\Models\DiscoverAppearance;

class Form extends Component
{
    public $leftForm;
    public $rightForm;
    public $basic_intake_id;
    public $disc_schedule_id;
    public $disc_appearance_id;
    public $modalData;
    public $appModalData;
    public $leftFormStatus = "readonly";
    public $rightFormStatus = "readonly";
    protected $listeners = ['formdataChange'];

    public function render()
    {
        $filing_info = FilingInformation::where('basic_intake_id', $this->basic_intake_id)->first();
        $discovery = Discovery::where('basic_intake_id', $this->basic_intake_id)->first();
        return view('livewire.ligitation.filing-info.form', compact('filing_info', 'discovery'));
    }

    public function addNew($formType)
    {
        if ($formType == "left") {
            $this->leftFormStatus = "editable";
            $this->leftForm = is_array($this->leftForm) ? array_fill_keys(array_keys($this->leftForm), null) : null;
        } else {
            $this->rightFormStatus = "editable";
            $this->rightForm = is_array($this->rightForm) ? array_fill_keys(array_keys($this->rightForm), null) : null;;
        }
    }



    public function editable($formType)
    {
        if ($formType == "left")
            $this->leftFormStatus = "editable";
        else
            $this->rightFormStatus = "editable";
    }

    public function submitLeftForm()
    {


        $basic_intake_id = $this->basic_intake_id;
        $matchThese = ['basic_intake_id' => $basic_intake_id];
        $data = $this->leftForm;
        $data['basic_intake_id'] = $basic_intake_id;
        FilingInformation::updateOrCreate($matchThese, $data);
        $this->leftFormStatus = "readonly";
    }

    public function submitRightForm()
    {
        $basic_intake_id = $this->basic_intake_id;
        $matchThese = ['basic_intake_id' => $basic_intake_id];
        $data = $this->rightForm;
        $data['basic_intake_id'] = $basic_intake_id;
        Discovery::updateOrCreate($matchThese, $data);
        $this->rightFormStatus = "readonly";
    }


    public function readonly($formType)
    {


        if ($formType == "left") {
            $this->leftFormStatus = "readonly";
            $this->leftForm = FilingInformation::where('basic_intake_id', $this->basic_intake_id)->first()?->toArray();
        } else {
            $this->rightFormStatus = "readonly";
            $this->rightForm = Discovery::where('basic_intake_id', $this->basic_intake_id)->first()?->toArray();
        }
    }

    public function formdataChange($id)
    {
        $this->leftForm = FilingInformation::where('basic_intake_id', $id)->first()?->toArray();
        $this->rightForm = Discovery::where('basic_intake_id', $id)->first()?->toArray();
        $this->basic_intake_id = $id;
    }

    public function addDiscSchedule()
    {
        $this->disc_schedule_id = null;
        $this->dispatchBrowserEvent('addSchedule');
    }

    public function editDiscSchedule($id)
    {
        $this->disc_schedule_id = $id;
        $this->dispatchBrowserEvent('editSchedule');
        $this->modalData = DiscoverySchedule::find($id)?->toArray();
    }

    public function submitScheduleForm()
    {
        $data = $this->modalData;
        $id = $this->disc_schedule_id;
        $form=$this->rightForm;
        $data['discovery_id'] = @$form['id'];

        if (empty($id)) {
            DiscoverySchedule::create($data);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            DiscoverySchedule::where('id', $id)->update($data);
        }
        $this->dispatchBrowserEvent('saveSchedule');
        $this->disc_schedule_id = null;
        $this->modalData = null;
    }

    public function addDiscAppearance()
    {
        $this->disc_appearance_id = null;
        $this->dispatchBrowserEvent('addAppearance');
    }

    public function editDiscAppearance($id)
    {
        $this->disc_appearance_id = $id;
        $this->dispatchBrowserEvent('editAppearance');
        $this->appModalData = DiscoverAppearance::find($id)?->toArray();
    }

    public function submitAppearanceForm()
    {
        $data = $this->appModalData;
        $id = $this->disc_appearance_id;
        $form=$this->rightForm;
        $data['discovery_id'] = @$form['id'];

        if (empty($id)) {
            DiscoverAppearance::create($data);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            DiscoverAppearance::where('id', $id)->update($data);
        }
        $this->dispatchBrowserEvent('saveAppearance');
        $this->disc_appearance_id = null;
        $this->appModalData = null;
    }
}
