<?php

namespace App\Http\Livewire\Invoices;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\FilingInvoiceChecks;
use \PDF;

class FilingPayment extends Component
{
    protected $listeners = ['invoicesAdded', 'rerender' => '$refresh'];
    public $invoice_id = '';
    public $check_id;
    public $checkForm;
    public $invoice_data = '';
    public function render()
    {

        if (!empty($this->invoice_id)) {
            $this->invoice_data = Invoice::where(['id'=>$this->invoice_id,'type'=>1])->first();
        } else {
            $this->reset();
        }
        return view('livewire.invoices.filing-payment');
    }

    public function invoicesAdded($id)
    {
        $this->invoice_id = $id;
    }



    public function editCheck($id)
    {
        $this->check_id = $id;
        $this->checkForm = FilingInvoiceChecks::where('id', $id)->first()?->toArray();
        $this->dispatchBrowserEvent('editCheck');
    }


    public function addNewCheck()
    {
        $this->check_id = null;
        $this->checkForm = null;
        $this->dispatchBrowserEvent('addCheck');
    }

    public function deleteCheck($id)
    {
        FilingInvoiceChecks::where('id', $id)->delete();
        $this->emit('rerender');
    }

    public function submitCheckForm()
    {

        $data = $this->checkForm;
        $id = $this->check_id;
        $data['invoice_id'] = $this->invoice_id;

        if (empty($id)) {

            FilingInvoiceChecks::create($data);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            FilingInvoiceChecks::where('id', $id)->update($data);
        }

        $this->dispatchBrowserEvent('saveCheck');
        $this->emit('rerender');
    }

    public function print()
    {
        $data = $this->invoice_data;
        $pdf = PDF::loadView('admin.PDF.invoice', compact('data'));

        return response()->streamDownload(function () use ($pdf) {
            echo  $pdf->stream();
        }, 'invoice.pdf');
    }
}
