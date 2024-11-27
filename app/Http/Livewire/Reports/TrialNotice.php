<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\Models\ProvoiderInformation;
use App\Models\InsuranceCompany;
use App\Models\BasicIntake;

class TrialNotice extends Component
{
    public $providers = [];
    public $insurance_companies = [];
    public $provider_id = [];
    public $insurance_company_id = [];
    public $not_from = "";
    public $not_to = "";
    
    public function mount()
    {
        $this->providers = ProvoiderInformation::select('id', 'name')->get();
        $this->insurance_companies = InsuranceCompany::select('id', 'name')->get();
    }

    public function render()
    {
        if (!empty($this->provider_id) || !empty($this->insurance_company_id) ||  !empty($this->not_from) || !empty($this->not_to) ) {
            $res = BasicIntake::whereHas('patient', function ($query) {
                if (!empty($this->insurance_company_id)) {
                    $query->whereIn('insurance_company_id', $this->insurance_company_id);
                }
            });

            if (!empty($this->not_from)) {
                $res = $res->whereHas('trial', function ($query) {
                    $query->whereDate('not_filed', '>=', date('Y-m-d', strtotime($this->not_from)));
                });
            }
            
            if (!empty($this->not_to)) {
                $res = $res->whereHas('trial', function ($query) {
                    $query->whereDate('not_filed', '>=', date('Y-m-d', strtotime($this->not_to)));
                });
            }

            if (!empty($this->provider_id)) {
                $res = $res->whereIn('provider_id', $this->provider_id);
            }

          

            $search_results = $res->get();
        } else {
            $search_results = [];
        }
        return view('livewire.reports.trial-notice',compact('search_results'));
    }

    public function clearData()
    {
        $this->provider_id = [];
        $this->insurance_company_id = [];
        $this->not_from = "";
        $this->not_to = "";
        $this->emitSelf('$refresh');
    }
}
