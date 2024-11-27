<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\Models\ProvoiderInformation;
use App\Models\InsuranceCompany;
use App\Models\BasicIntake;
use App\Models\CaseStatus as CaseStatusModal;

class SettlementReport extends Component
{
    public $providers;
    public $insurance_companies;
    public $statuses;
    public $provider_id = [];
    public $insurance_company_id = [];
    public $status_id = [];
    public $sett_from = "";
    public $sett_to = "";
    public $is_out = "";


    public function mount()
    {
        $this->providers = ProvoiderInformation::select('id', 'name')->get();
        $this->insurance_companies = InsuranceCompany::select('id', 'name')->get();
        $this->statuses = CaseStatusModal::select('id', 'status')->get();
    }

    public function render()
    {
        if (!empty($this->provider_id) || !empty($this->insurance_company_id) || !empty($this->status_id) || !empty($this->sett_from) || !empty($this->sett_to) || !empty($this->is_out)) {
            $res = BasicIntake::whereHas('patient', function ($query) {
                if (!empty($this->insurance_company_id)) {
                    $query->whereIn('insurance_company_id', $this->insurance_company_id);
                }
            });


            if (!empty($this->sett_from)) {
                $res = $res->whereHas('settlements', function ($query) {
                    $query->whereDate('date', '>=', date('Y-m-d', strtotime($this->sett_from)));
                });
            }
            if (!empty($this->sett_to)) {
                $res = $res->whereHas('settlements', function ($query) {
                    $query->whereDate('date', '<=', date('Y-m-d', strtotime($this->sett_to)));
                });
            }
            

            if (!empty($this->is_out)) {
                $res = $res->whereHas('settlements', function ($query) {
                    $query->where('outstanding', '>', 0);
                });
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
        return view('livewire.reports.settlement-report', compact('search_results'));
    }

    public function clearData()
    {
        $this->provider_id = [];
        $this->insurance_company_id = [];
        $this->status_id = [];
        $this->sett_from = "";
        $this->sett_to = "";
        $this->is_out = "";
        $this->emitSelf('$refresh');
    }
}
