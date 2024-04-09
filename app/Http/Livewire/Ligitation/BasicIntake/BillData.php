<?php

namespace App\Http\Livewire\Ligitation\BasicIntake;

use Livewire\Component;
use App\Models\BasicIntake;
use App\Models\BasicIntakeBilling;
use App\Models\DenialReason;

class BillData extends Component
{
    public $basic_intake_id;
    public $modalData;
    public $bill_id;
    protected $listeners = ['formdataChange'];
    public function render()
    {
        $basic_intake_billings = [];
        if (!empty($this->basic_intake_id)) {
            $basic_intake_billings = BasicIntake::find($this->basic_intake_id)?->tableDetails;
        }
        $denial_reasons=DenialReason::all();
        return view('livewire.ligitation.basic-intake.bill-data', ['billing_data' => $basic_intake_billings,'denial_reasons'=>$denial_reasons]);
    }

    public function formdataChange($id)
    {
        $this->basic_intake_id = $id;

    }
    public function submitForm(){
        $data = $this->modalData;
        $id = $this->bill_id;
        $data['basic_intake_id']=$this->basic_intake_id;
        $data['out_st']=@$data['amount']-@$data['partial_pay'];
        if (empty($id)) {
            BasicIntakeBilling::create($data);
          
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            BasicIntakeBilling::where('id', $id)->update($data);
        }
        $this->dispatchBrowserEvent('billSaved');
        $this->bill_id=null;
        $this->modalData=null;
        $this->emit('formdataAdded',$this->basic_intake_id);
    }

    public function addBill()
    {
        $this->bill_id=null;
        $this->dispatchBrowserEvent('addbill');
    }

    public function editBill($id)
    {
        $this->bill_id=$id;
        $this->dispatchBrowserEvent('editbill');
        $this->modalData=BasicIntakeBilling::find($id)->toArray();
    }
}
