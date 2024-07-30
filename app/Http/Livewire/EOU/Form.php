<?php

namespace App\Http\Livewire\EOU;

use App\Models\InsuranceCompany;
use App\Models\ProvoiderInformation;
use App\Models\EOU;
use App\Models\EOULetter;
use Livewire\Component;

class Form extends Component
{
    public $formStatus = "readonly";
    public $eouForm = null;
    public $eou_id = null;
    public $eou_letter_id;
    public $eouLetterForm;
    public $searchForm;
    public $searchResults;
    public function render()
    {
        $EOU_Letters = EOULetter::where("eou_id", $this->eou_id)->get();
        $insurance_companies = InsuranceCompany::all();
        $providers = ProvoiderInformation::all();
        return view('livewire.e-o-u.form', compact('insurance_companies', 'providers', 'EOU_Letters'));
    }

    public function addNew()
    {
        $this->formStatus = "editable";
        $this->eouForm = is_array($this->eouForm) ? array_fill_keys(array_keys($this->eouForm), null) : null;
        $this->eou_id = null;
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

    public function editEouLetter($id)
    {
        $this->eou_letter_id = $id;
        $this->eouLetterForm = EOULetter::where('id', $id)->first()?->toArray();
        $this->dispatchBrowserEvent('editEouLetter');
    }


    public function addNewEouLetter()
    {
        $this->eou_letter_id = null;
        $this->eouLetterForm = null;
        $this->dispatchBrowserEvent('addEouLetter');
    }

    public function submitEouLetterForm()
    {

        $data = $this->eouLetterForm;
        $id = $this->eou_letter_id;
        $data['eou_id'] = $this->eou_id;
        if (empty($id)) {
            EOULetter::create($data);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            EOULetter::where('id', $id)->update($data);
        }

        $this->dispatchBrowserEvent('saveEouLetter');
        $this->emit('$refresh');
    }

    public function deleteEouLetter($id)
    {
        EOULetter::find($id)->delete();
        $this->emit('$refresh');
    }

    public function advanceSearch()
    {
        $filtered = array_filter((array)$this->searchForm);
        $query = new EOU();
        foreach ($filtered as $k => $v) {
            if ($k == 'insurance_company') {
                $query =   $query->where("insurance_company", $v);
            }
            if ($k == 'provider') {
                $query =    $query->where("provider", $v);
            }
            if ($k == 'carrier_attorney') {
                $query =   $query->where("carrier_attorney", '%' . $v . '%');
            }
            if ($k == 'eou_status') {
                $query =  $query->where("eou_status", $v);
            }
            if ($k == 'assigner') {
                $query->where("assigner", '%' . $v . '%');
            }
            if ($k == 'claim_number') {
                $query =   $query->where("claim_number", '%' . $v . '%');
            }
            if ($k == 'eou_date') {
                $query =   $query->where("eou_date", $v);
            }
            if ($k == 'witness_fee_outstanding') {
                $query =  $query->where("witness_fee_outstanding", $v);
            }
            if ($k == 'principle_settled_outstanding') {
                $query =   $query->where("principle_settled_outstanding", $v);
            }
            if ($k == 'attorney_fees_settled_outstanding') {
                $query =  $query->where("attorney_fees_settled_outstanding", $v);
            }
            if ($k == 'eou_transcript_deadline') {
                $query =  $query->where("eou_transcript_deadline", $v);
            }
            if ($k == 'response_deadline') {
                $query =  $query->where("response_deadline", $v);
            }
            if ($k == 'adjourned_date') {
                $query =  $query->whereHas("EOULetter", function ($query1) use ($v) {
                    return $query1->where('adjourned_date', $v);
                });
            }
        }
        $this->searchResults = $query->get();

    }
}
