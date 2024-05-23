<?php

namespace App\Http\Livewire\Ligitation\BasicIntake;

use Livewire\Component;
use App\Models\InsuranceCompany;
use App\Models\PatientInfo;
use App\Models\BasicIntake;
use App\Models\DefenseFirm;
use App\Models\ProvoiderInformation;

use DB;
use PhpParser\Node\Expr\Empty_;

class AdvanceSearch extends Component
{
    public $Search;

    public $searchResults;
    public function render()
    {
        $insuranceId = InsuranceCompany::orderBy('id', 'desc')->get();
        $providers = ProvoiderInformation::orderBy('id', 'desc')->get();
        $carrier = DefenseFirm::all();
        return view('livewire.ligitation.basic-intake.advance-search', compact('insuranceId', 'providers', 'carrier'));
    }

    public function advanceSearch()
    {
        $filtered = array_filter($this->Search);

        if (!empty($filtered)) {
            $like_filter = [];

            array_walk($filtered, function (&$v, $k) use (&$like_filter) {
                if ($k == 'provider_id' || $k == 'carrier_attorney' || is_array($v)) {
                    if (is_array($v)) {
                        foreach ($v as $nk => $nv) {

                            if ($nk == "doa") {
                                $v[$nk] = date('Y-m-d', strtotime($nv));
                            } elseif ($nk != 'insurance_company_id') {
                                $v[$nk] = '%' . $nv . '%';
                            }
                        }
                    } else {
                        $v = $v;
                    }
                    $like_filter[$k] = $v;
                } else {
                    $like_filter[$k] = '%' . $v . '%';
                }
            });


            $res = BasicIntake::whereHas('patient', function ($query) use ($like_filter) {
                if (!empty($like_filter['patient'])) {
                    return $query->patientsearch($like_filter['patient']);
                }
            });
            unset($like_filter['patient']);
            $this->searchResults = $res->search($like_filter)->get();
        } else {
            $this->searchResults = [];
        }
        $this->dispatchBrowserEvent('searchAdvance');
    }

    public function ViewCase($id)
    {
        $this->emitUp('advanceSearchEmit', $id);
    }

    public function resetForm()
    {
        $this->dispatchBrowserEvent('resetAdvance');
        $this->searchResults = [];
        $this->Search = [];
    }
}
