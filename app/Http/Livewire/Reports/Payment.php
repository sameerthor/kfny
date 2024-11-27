<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\Models\ProvoiderInformation;
use App\Models\InsuranceCompany;
use App\Models\SettlementCheck;

class Payment extends Component
{
    public $providers;
    public $insurance_companies;
    public $statuses;
    public $provider_id = [];
    public $insurance_company_id = [];
    public $rec_from = "";
    public $rec_to = "";
    public $cheque_no = "";

    public function mount()
    {
        $this->providers = ProvoiderInformation::select('id', 'name')->get();
        $this->insurance_companies = InsuranceCompany::select('id', 'name')->get();
    }

    public function render()
    {
        if (!empty($this->provider_id) || !empty($this->insurance_company_id) || !empty($this->rec_from) || !empty($this->rec_to) || !empty($this->cheque_no)) {
            $res = SettlementCheck::OrderBy("updated_at");

            if (!empty($this->provider_id)) {
                $res = $res->whereHas('settlement.basic_intake', function ($q) {
                    $q->where('provider_id', $this->provider_id);
                });
            }

            if (!empty($this->insurance_company_id)) {
                $res = $res->whereHas('settlement.basic_intake', function ($q) {
                    $q->where('insurance_company_id', $this->insurance_company_id);
                });
            }

            if (!empty($this->rec_from)) {
                $res =  $res->whereDate('date_received', '>=', date('Y-m-d', strtotime($this->rec_from)));
            }
            if (!empty($this->rec_to)) {
                $res = $res->whereDate('date_received', '<=', date('Y-m-d', strtotime($this->rec_to)));
            }


            if (!empty($this->cheque_no)) {
                $res =  $res->where('check', $this->cheque_no);
            }



            $search_results = $res->get();
        } else {
            $search_results = [];
        }
        return view('livewire.reports.payment', compact('search_results'));
    }

    public function clearData()
    {
        $this->provider_id = [];
        $this->insurance_company_id = [];
        $this->rec_from = "";
        $this->rec_to = "";
        $this->cheque_no = "";
        $this->emitSelf('$refresh');
    }
}
