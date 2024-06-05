<?php

namespace App\Http\Livewire\Ligitation\Settlement;

use Livewire\Component;
use App\Models\Settlement;
use App\Models\SettlementCheck;
use App\Models\SettledPerson;
use App\Models\BasicIntake;
use App\Models\CaseStatus;
use DateTime;
use App\Models\FilingInformation;

class Form extends Component
{
    public $settlement_id;
    public $basic_intake_id;
    public $settlementForm;
    public $settlementFormStatus = "readonly";
    public $settlementCheckForm;
    public $settlementChecks;
    public $settlement_check_id;
    public $persons;
    public $replicated_files = [];
    protected $listeners = ['formdataChange', 'calculate'];


    public function render()
    {
        $this->persons = SettledPerson::all();
        $this->settlementChecks = SettlementCheck::where('settlement_id', $this->settlement_id)->get();
        $files = BasicIntake::where('id', '!=', $this->basic_intake_id)->get();
        return view('livewire.ligitation.settlement.form', compact('files'));
    }

    public function formdataChange($id)
    {
        @$this->settlementForm = Settlement::where('basic_intake_id', $id)->first()?->toArray();
        if (!empty(@$this->settlementForm)) {
            $this->settlement_id = @$this->settlementForm['id'];
        } else {
            $this->settlement_id = null;
        }
        $this->basic_intake_id = $id;
    }

    public function readonlySettlement()
    {

        @$this->settlementFormStatus = "readonly";
        @$this->settlementForm = Settlement::where('id', $this->settlement_id)->first()?->toArray();
    }

    public function submitSettlementForm()
    {

        $data = @$this->settlementForm;
        $id = $this->settlement_id;
        $data['basic_intake_id'] = $this->basic_intake_id;
        if (empty($id)) {
            $this->settlement_id =  Settlement::create($data)->id;
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            Settlement::where('id', $id)->update($data);
        }
        @$this->settlementFormStatus = "readonly";
        $this->calculate('total');
        $this->emit('advanceSearchEmit', $this->basic_intake_id);
    }

    public function editSettlementCheck($id)
    {
        $this->settlement_check_id = $id;
        $this->settlementCheckForm = SettlementCheck::where('id', $id)->first()?->toArray();
        $this->dispatchBrowserEvent('editSettlementCheck');
    }


    public function addSettlementCheck()
    {
        $this->settlement_check_id = null;
        $this->settlementCheckForm = null;
        $this->dispatchBrowserEvent('addSettlementCheck');
    }

    public function submitSettlementCheck()
    {

        $data = $this->settlementCheckForm;
        $id = $this->settlement_check_id;
        $data['settlement_id'] = $this->settlement_id;
        if (empty($id)) {
            SettlementCheck::create($data);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            SettlementCheck::where('id', $id)->update($data);
        }

        $this->dispatchBrowserEvent('saveSettlementCheck');
        $this->settlementChecks = settlementCheck::where('settlement_id', $this->settlement_id)->get();

        $this->calculate('total');
    }

    public function addReplicate()
    {
        $this->dispatchBrowserEvent('addReplicate');
    }

    public function submitReplicateForm()
    {
        $files = $this->replicated_files;
        if (!empty($files)) {
            $sett = Settlement::find($this->settlement_id);
            $settChecks = $sett->checks->toArray();

            foreach ($files as $file) {
                $res =  Settlement::where('basic_intake_id', $file)->first();
                if (!empty($res)) {
                    if (count($res->checks) > 0)
                        $res->checks()->delete();
                    $res->delete();
                }
                $newSett = $sett->replicate();
                $newSett->push();
                $newSett->basic_intake_id = $file;
                $newSett->save();
                $newSett->checks()->createMany($settChecks);
                if (max((int)(($newSett['new_total'] == "1" ? $newSett['new_principle'] : $newSett['principle_amount']) + $newSett['interest_amount'] + $newSett['attorney_fees'] + $newSett['filing_fees'] + $newSett['costs']) - $this->settlementChecks->sum('total'), 0) == "0" && ($newSett['type'] == 'Decision' || $newSett['type'] == 'Settlement' || $newSett['type'] == 'Voluntary Payment')) {
                    if ($newSett['type'] == 'Decision') {
                        $status = CaseStatus::where('status', 'Decision - Paid')->first();
                    } elseif ($newSett['type'] == 'Settlement') {
                        $status = CaseStatus::where('status', 'Settled - Paid')->first();
                    } else {
                        $status = CaseStatus::where('status', 'Voluntary Payment')->first();
                    }
                    if (!empty($status)) {
                        BasicIntake::where('id', $file)->update(['status' => $status->id]);
                    }
                }
            }
        }
        $this->dispatchBrowserEvent('saveReplicate');
    }

    public function calculate($field = null)
    {
        $basicIntake = BasicIntake::find($this->basic_intake_id);
        if ($field == 'principle_percent') {
            $case_total = $basicIntake->tableDetails->sum('amount');
            @$this->settlementForm['principle_amount'] = round(($case_total / 100) * @$this->settlementForm['principle_percent'],2);
        }
        if ($field == 'principle_amount') {
            $case_total = $basicIntake->tableDetails->sum('amount');
            @$this->settlementForm['principle_percent'] =  (@$this->settlementForm['principle_amount'] * 100) / $case_total;
        }


        $principle = @$this->settlementForm['new_total'] == 1 ? @$this->settlementForm['new_principle'] : $basicIntake->tableDetails->sum('amount');


        if (($field == 'interest_percent' || $field == 'new_principle' || $field == 'date' || $field == 'interest_from' || $field == 'interest_from_date' || $field == 'principle_percent' || $field == 'term') && !empty(@$this->settlementForm['interest_from'])) {
            $billdata = $basicIntake->tableDetails;
            $outstanding = $billdata->sum('amount') - $billdata->sum('partial_pay');
            @$this->settlementForm['date'] = empty(@$this->settlementForm['date']) ? date('n/j/y') : @$this->settlementForm['date'];
            if (@$this->settlementForm['interest_from'] == "Date of Filing" || @$this->settlementForm['interest_from'] == "Date of Service" || @$this->settlementForm['interest_from'] == "Other") {

                if (@$this->settlementForm['interest_from'] == "Date of Filing") {
                    $filing_date = FilingInformation::where('basic_intake_id', $this->basic_intake_id)->first()?->filing_date;
                    if (empty($filing_date))
                        return '';
                    $date2 = date('Y-m-d', strtotime($filing_date));
                }
                if (@$this->settlementForm['interest_from'] == "Date of Service") {
                    $date_served = FilingInformation::where('basic_intake_id', $this->basic_intake_id)->first()?->date_served;
                    if (empty($date_served))
                        return '';
                    $date2 = date('Y-m-d', strtotime($date_served));
                }
                if (@$this->settlementForm['interest_from'] == "Other") {
                    $interest_from_date =  @$this->settlementForm['interest_from_date'];
                    if (empty($interest_from_date))
                        return '';
                    $date2 = date('Y-m-d', strtotime($interest_from_date));
                }
                $date1 = date('Y-m-d', strtotime(@$this->settlementForm['date']));
                $d1 = new DateTime($date2);
                $d2 = new DateTime($date1);
                $Months = $d1->diff($d2);
                $time = $Months->format("%r%a");
            } else {
                $time = 30;
            }
            $time = $time / 30;
            @$this->settlementForm['interest_amount'] =   round($principle * (float)@$this->settlementForm['interest_percent']   * 0.02 * $time, 2);
        }

        @$this->settlementForm['attorney_fees'] = round((@$this->settlementForm['interest_amount'] + $principle) * 0.2, 2);
        if (@$this->settlementForm['attorney_fees'] > 1360) {
            @$this->settlementForm['attorney_fees'] = 1360;
        }

        $filing_fee = $basicIntake->patient->insuranceCompany?->filing_fees_date_specific;
        if (!empty($basicIntake->trial)) {
            $filing_fee = (int)$filing_fee + 40;
        }
        if (count($basicIntake->appeals) > 0) {
            $filing_fee = (int)$filing_fee + 30;
        }
        @$this->settlementForm['filing_fees'] = $filing_fee;
        if (@$this->settlementForm['type'] == 'Decision' || @$this->settlementForm['type'] == 'Partial Decision') {
            if ($principle + (int)@$this->settlementForm['attorney_fees'] + (int)@$this->settlementForm['filing_fees'] <= 6000) {
                if (empty($basicIntake->trial)) {
                    @$this->settlementForm['costs'] = 20;
                } elseif (count($basicIntake->trial->trialDates) > 0) {
                    @$this->settlementForm['costs'] = 150;
                } else {
                    @$this->settlementForm['costs'] = 55;
                }
            } else {
                if (empty($basicIntake->trial)) {
                    @$this->settlementForm['costs'] = 50;
                } elseif (count($basicIntake->trial->trialDates) > 0) {
                    @$this->settlementForm['costs'] = 300;
                } else {
                    @$this->settlementForm['costs'] = 150;
                }
            }
        } else {
            @$this->settlementForm['costs'] = 0;
        }


        if (!empty(@$this->settlementForm['judgement_appl'])) {
            $billdata = $basicIntake->tableDetails;
            $outstanding = $billdata->sum('amount') - $billdata->sum('partial_pay');
            @$this->settlementForm['date'] = empty(@$this->settlementForm['date']) ? date('n/j/y') : @$this->settlementForm['date'];
            if (@$this->settlementForm['interest_from'] == "Date of Filing" || @$this->settlementForm['interest_from'] == "Date of Service" || @$this->settlementForm['interest_from'] == "Other") {

                if (@$this->settlementForm['interest_from'] == "Date of Filing") {
                    $filing_date = FilingInformation::where('basic_intake_id', $this->basic_intake_id)->first()?->filing_date;
                    if (empty($filing_date))
                        return '';
                    $date2 = date('Y-m-d', strtotime($filing_date));
                }
                if (@$this->settlementForm['interest_from'] == "Date of Service") {
                    $date_served = FilingInformation::where('basic_intake_id', $this->basic_intake_id)->first()?->date_served;
                    if (empty($date_served))
                        return '';
                    $date2 = date('Y-m-d', strtotime($date_served));
                }
                if (@$this->settlementForm['interest_from'] == "Other") {
                    $interest_from_date =  @$this->settlementForm['interest_from_date'];
                    if (empty($interest_from_date))
                        return '';
                    $date2 = date('Y-m-d', strtotime($interest_from_date));
                }
                $date1 = date('Y-m-d', strtotime(@$this->settlementForm['judgement_appl']));
                $d1 = new DateTime($date2);
                $d2 = new DateTime($date1);
                $Months = $d2->diff($d1);
                $time = $Months->format("%r%a");
                $time=abs($time);
            } else {
                $time = 30;
            }
            $time = $time / 30;
            @$this->settlementForm['additional_interest'] = round($principle  * 0.2 * $time, 2);
        }

        @$this->settlementForm['additional_attorney_fees'] = round((@$this->settlementForm['additional_interest'] + $principle) * 0.2,);
        if (@$this->settlementForm['additional_attorney_fees'] > 1360) {
            @$this->settlementForm['additional_attorney_fees'] = 1360;
        }

        if (@$this->settlementForm['type'] == 'Decision' || @$this->settlementForm['type'] == 'Partial Decision') {
            if ($principle + (int)@$this->settlementForm['additional_attorney_fees'] + (int)@$this->settlementForm['additional_interest'] <= 6000) {
                if (empty($basicIntake->trial)) {
                    @$this->settlementForm['additional_costs'] = 20;
                } elseif (count($basicIntake->trial->trialDates) > 0) {
                    @$this->settlementForm['additional_costs'] = 150;
                } else {
                    @$this->settlementForm['additional_costs'] = 55;
                }
            } else {
                if (empty($basicIntake->trial)) {
                    @$this->settlementForm['additional_costs'] = 50;
                } elseif (count($basicIntake->trial->trialDates) > 0) {
                    @$this->settlementForm['additional_costs'] = 300;
                } else {
                    @$this->settlementForm['additional_costs'] = 150;
                }
            }
        } else {
            @$this->settlementForm['additional_costs'] = 0;
        }

        if (max((int)((int)$principle +  (int)@$this->settlementForm['interest_amount'] + (int)@$this->settlementForm['attorney_fees'] + (int)@$this->settlementForm['filing_fees'] + @$this->settlementForm['costs']) - (int)$this->settlementChecks->sum('total'), 0) == "0" && (@$this->settlementForm['type'] == 'Decision' || @$this->settlementForm['type'] == 'Settlement' || @$this->settlementForm['type'] == 'Voluntary Payment')) {
            if (@$this->settlementForm['type'] == 'Decision') {
                $status = CaseStatus::where('status', 'Decision - Paid')->first();
            } elseif (@$this->settlementForm['type'] == 'Settlement') {
                $status = CaseStatus::where('status', 'Settled - Paid')->first();
            } else {
                $status = CaseStatus::where('status', 'Voluntary Payment')->first();
            }
            if (!empty($status)) {
                $basicIntake->status = $status->id;
                $basicIntake->save();
            }
        }
    }
}
