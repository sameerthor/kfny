<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\Models\ProvoiderInformation;
use App\Models\InsuranceCompany;
use App\Models\CaseStatus as CaseStatusModal;
use App\Models\BasicIntake;

class CaseStatus extends Component
{
    public $providers = [];
    public $insurance_companies = [];
    public $statuses = [];
    public $provider_id = [];
    public $insurance_company_id = [];
    public $status_id = [];
    public $answ_from = "";
    public $answ_to = "";
    public $filing_from = "";
    public $filing_to = "";
    public $serv_from = "";
    public $serv_to = "";

    public function mount()
    {
        $this->providers = ProvoiderInformation::select('id', 'name')->get();
        $this->insurance_companies = InsuranceCompany::select('id', 'name')->get();
        $this->statuses = CaseStatusModal::select('id', 'status')->get();
    }

    public function render()
    {
        if (!empty($this->provider_id) || !empty($this->insurance_company_id) || !empty($this->status_id) || !empty($this->answ_from) || !empty($this->answ_to) || !empty($this->filing_from) || !empty($this->filing_to) || !empty($this->serv_from) || !empty($this->serv_to)) {
            $res = BasicIntake::whereHas('patient', function ($query) {
                if (!empty($this->insurance_company_id)) {
                    $query->whereIn('insurance_company_id', $this->insurance_company_id);
                }
            });

            if (!empty($this->answ_from)) {
                $res = $res->whereHas('filingInfo', function ($query) {
                    $query->whereDate('ans_rec', '>=', date('Y-m-d', strtotime($this->answ_from)));
                });
            }

            if (!empty($this->answ_to)) {
                $res = $res->whereHas('filingInfo', function ($query) {
                    $query->whereDate('ans_rec', '<=', date('Y-m-d', strtotime($this->answ_to)));
                });
            }

            if (!empty($this->filing_from)) {
                $res = $res->whereHas('filingInfo', function ($query) {
                    $query->whereDate('filing_date', '>=', date('Y-m-d', strtotime($this->filing_from)));
                });
            }

            if (!empty($this->filing_to)) {
                $res = $res->whereHas('filingInfo', function ($query) {
                    $query->whereDate('filing_date', '<=', date('Y-m-d', strtotime($this->filing_to)));
                });
            }
            
            if (!empty($this->serv_from)) {
                $res = $res->whereHas('filingInfo', function ($query) {
                    $query->whereDate('date_served', '>=', date('Y-m-d', strtotime($this->serv_from)));
                });
            }

            if (!empty($this->serv_to)) {
                $res = $res->whereHas('filingInfo', function ($query) {
                    $query->whereDate('date_served', '<=', date('Y-m-d', strtotime($this->serv_to)));
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
        return view('livewire.reports.case-status', compact('search_results'));
    }

    public function clearData()
    {
        $this->provider_id = [];
        $this->insurance_company_id = [];
        $this->status_id = [];
        $this->answ_from = "";
        $this->answ_to = "";
        $this->filing_from = "";
        $this->filing_to = "";
        $this->serv_from = "";
        $this->serv_to = "";
        $this->emitSelf('$refresh');
    }
}
