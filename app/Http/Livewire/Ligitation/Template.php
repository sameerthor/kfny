<?php

namespace App\Http\Livewire\Ligitation;

use App\Models\BasicIntakeTemplate;
use App\Models\Templates;
use Livewire\Component;
use NcJoes\OfficeConverter\OfficeConverter;
use File;
use App\Models\BasicIntake;

class Template extends Component
{
    public $templates;
    public $basic_intake_id;
    public $template_id;
    public $template_type;
    protected $listeners = ['formdataChange'];
    protected $rules = [
        'template_id' => 'required',
        'template_type' => 'required',
    ];

    protected $messages = [
        'template_id.required' => 'Please select template.',
        'template_type.required' => 'Please select template type.',
    ];

    public function mount()
    {
        $this->templates = Templates::OrderBy("template_name")->get();
    }

    public function render()
    {
        $basic_intake_templates = BasicIntakeTemplate::where('basic_intake_id', $this->basic_intake_id)->OrderBy("title")->get();
        return view('livewire.ligitation.template', compact('basic_intake_templates'));
    }

    public function formdataChange($id)
    {
        $this->basic_intake_id = $id;
    }

    public function submitForm()
    {
        $validatedData = $this->validate();
        $selected_template = Templates::find($this->template_id);
        $data = BasicIntake::find($this->basic_intake_id);
        $output_path = storage_path("app/public/") . "#" . $this->basic_intake_id . "_templates/";
        $template_name = $selected_template->template_name;
        File::isDirectory($output_path) or File::makeDirectory($output_path, 0777, true, true);
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/public/' . $selected_template->file_path));
        $templateProcessor->setValue('{{index_number}}', $data['index_number']);
        $templateProcessor->setValue('{{provider_name}}', !empty($data) ? @$data['provoiderInformation']['name'] : 'N/A');
        $templateProcessor->setValue('{{assignor}}', $data['patient_id']);
        $templateProcessor->setValue('{{insurance_name}}', $data['patient']['insured']);
        $templateProcessor->setValue('{{file_no}}', $this->basic_intake_id);
        $templateProcessor->setValue('{{created_time}}', date('F d,Y'));

        if ($this->template_type == "pdf") {
            $templateProcessor->saveAs($output_path . "/temp.docx");
            $converter = new OfficeConverter($output_path . "/temp.docx", $output_path, 'soffice');
            $converter->convertTo($output_path .'/'.$template_name . ".pdf");
            unlink($output_path . "/temp.docx");
        } elseif ($this->template_type == "docx") {
            $templateProcessor->saveAs($output_path . "/" . $template_name . ".docx");
        }
        BasicIntakeTemplate::create(["basic_intake_id" => $this->basic_intake_id, "title" => $template_name . "." . $this->template_type, "path" => asset('storage/' . "#" . $this->basic_intake_id . "_templates/" . $template_name . "." . $this->template_type)]);
        $this->dispatchBrowserEvent("TemplateGenerated");
        $this->emitSelf('$refresh');
    }

    public function deleteTemplate($id)
    {
        $f = BasicIntakeTemplate::find($id);
        unlink(storage_path("app/public/") . "#" . $this->basic_intake_id . "_templates/" . $f->title);
        $f->delete();
        $this->emitSelf('$refresh');
    }

    public function downloadTemplate($id)
    {
        $f = BasicIntakeTemplate::find($id);

        return response()->download(storage_path("app/public/") . "#" . $this->basic_intake_id . "_templates/" . $f->title);
    }
}
