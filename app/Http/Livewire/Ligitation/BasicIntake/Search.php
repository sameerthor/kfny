<?php

namespace App\Http\Livewire\Ligitation\BasicIntake;

use Livewire\Component;
use App\Models\BasicIntake;
use App\Models\Templates;
use \PDF;
use SebastianBergmann\Template\Template;

class Search extends Component
{
    public $search = '';

    public $basic_intake_id = '';
    protected $listeners = ['formdataAdded','advanceSearchEmit'];
    public $templates;
    public function mount()
    {
        $this->templates=Templates::select("id","title")->get();
    }

    public function render()
    {
        $basicIntake = BasicIntake::find($this->search);
        $sibling_data=[];
        $this->emit('formdataChange',$basicIntake?->id);
        $this->basic_intake_id = $basicIntake?->id;
        if(!empty($basicIntake)) 
        {
            $sibling_data=BasicIntake::where('patient_id',$basicIntake->patient_id)->whereNot('id',$basicIntake->id)->get();
        }
        
        return view('livewire.ligitation.basic-intake.search', ['data' => $basicIntake,'siblings'=>$sibling_data]);
    }

    public function formdataAdded($id)
    {
        $this->search = $id;
    }   

    public function changeFile($no){
       $this->search= $no;
    }

    public function updateIndex($in)
    {
       $found= BasicIntake::where('index_number',$in)->first();
       if(!empty($found)){
        $this->search= $found->id;
       }else{
        $this->search= "";
       }
    }
    
    public function updateNotes($column,$value){
        BasicIntake::where('id',$this->basic_intake_id)->update([$column=>$value]);
    }

    public function advanceSearchEmit($id)
    {
        $this->search = $id;
    }

    public function generatePDF($value)
    {
        $data = BasicIntake::find($this->search);

        $html=Templates::find($value)->content;
        $html = str_replace("{{index_number}}",$data['index_number'],$html);
        $html = str_replace("{{provider_name}}",!empty($data)?@$data['provoiderInformation']['name']:'N/A',$html);
        $html = str_replace("{{assignor}}",$data['patient_id'],$html);
        $html = str_replace("{{insurance_name}}",$data['patient']['insured'],$html); 
        $html = str_replace("{{file_no}}",$this->basic_intake_id,$html);
        $html = str_replace("{{created_time}}",date('F d,Y'),$html); 

        $pdf = PDF::loadHTML($html);
        return response()->streamDownload(function () use($pdf) {
            echo  $pdf->stream();
        }, Templates::find($value)->title.".pdf");
    }
}
