<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\Models\DefenseFirm;
use App\Models\ProvoiderInformation;
use App\Models\InsuranceCompany;
use App\Models\CaseStatus;
use App\Models\BasicIntake;

class DefenceFirm extends Component
{
    public $defence_firms = [];
    public $providers = [];
    public $insurance_companies = [];
    public $statuses = [];
    public $defence_firm_id = [];
    public $provider_id = [];
    public $insurance_company_id = [];
    public $status_id = [];

    public function mount()
    {
        $this->defence_firms = DefenseFirm::select('id', 'name')->get();
        $this->providers = ProvoiderInformation::select('id', 'name')->get();
        $this->insurance_companies = InsuranceCompany::select('id', 'name')->get();
        $this->statuses = CaseStatus::select('id', 'status')->get();
    }

    public function render()
    {
        if (!empty($this->defence_firm_id) || !empty($this->provider_id) || !empty($this->insurance_company_id) || !empty($this->status_id)) {
            $res = BasicIntake::whereHas('patient', function ($query) {
                if (!empty($this->insurance_company_id)) {
                    $query->whereIn('insurance_company_id', $this->insurance_company_id);
                }
            });

            if (!empty($this->defence_firm_id)) {
                $res = $res->whereIn('carrier_attorney', $this->defence_firm_id);
            }

            if (!empty($this->provider_id)) {
                $res = $res->whereIn('provider_id', $this->provider_id);
            }

            if (!empty($this->status_id)) {
                $res = $res->whereIn('status', $this->status_id);
            }

            $search_results = $res->get();
        } else {
            $search_results = [];
        }

        return view('livewire.reports.defence-firm', compact('search_results'));
    }

    public function clearData()
    {
        $this->defence_firm_id = [];
        $this->provider_id = [];
        $this->insurance_company_id = [];
        $this->status_id = [];
        $this->emitSelf('$refresh');
    }
}
