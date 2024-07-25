<?php

namespace App\Http\Livewire\EOU;

use App\Models\InsuranceCompany;
use App\Models\ProvoiderInformation;
use App\Models\EOU;
use Livewire\Component;

class Form extends Component
{
    public $formStatus = "readonly";
    public $eouForm = null;
    public $eou_id = null;
    public function render()
    {
        $insurance_companies = InsuranceCompany::all();
        $providers = ProvoiderInformation::all();
        return view('livewire.e-o-u.form', compact('insurance_companies', 'providers'));
    }

    public function addNew()
    {
        $this->formStatus = "editable";
        $this->eouForm = is_array($this->eouForm) ? array_fill_keys(array_keys($this->eouForm), null) : null;
    }

    public function submitEOUForm()
    {
        $data = $this->eouForm;
        $id = $this->eou_id;
        if (empty($id)) {
            $r = EOU::create($data);
            $this->eou_id = $r->id;
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            EOU::where('id', $id)->update($data);
        }
    }
}
