<?php

namespace App\Http\Livewire\Ligitation;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUpload extends Component
{
    use WithFileUploads;

    public $documents = [];
    public $basic_intake_id;

    protected $listeners = ['formdataChange'];

    public function render()
    {
        $files = UploadedFile::where('basic_intake_id', $this->basic_intake_id)->OrderBy("updated_at")->get();
        return view('livewire.ligitation.file-upload', compact('files'));
    }

    public function formdataChange($id)
    {
        $this->basic_intake_id = $id;
    }

    public function submitForm()
    {
        foreach ($this->documents as $document) {

            if (!empty($this->basic_intake_id)) {
                $directory_name = "#" . $this->basic_intake_id . "_documents";
                $file_name = $document->getClientOriginalName();
            } else {
                $bi_id = explode('_', $document->getClientOriginalName())[0];
                $directory_name = $bi_id . "_documents";
                $file_name = str_replace($bi_id . "_", '', $document->getClientOriginalName());
            }

            $document->storeAs($directory_name, $file_name);
            UploadedFile::create(['basic_intake_id'=>!empty($this->basic_intake_id)?$this->basic_intake_id:$bi_id,'name'=>$file_name]);
        }
        $this->dispatchBrowserEvent("fileUploaded");
    }

    public function downloadFile($id)
    {
       $f = UploadedFile::find($id);
       return Storage::download("#" . $f->basic_intake_id . "_documents/".$f->name);
    }

    public function deleteFile($id)
    {
       $f = UploadedFile::find($id);
       Storage::delete("#" . $f->basic_intake_id . "_documents/".$f->name);
       $f->delete();
       $this->emitSelf('$refresh');
    }

    
}
