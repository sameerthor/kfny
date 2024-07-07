<?php

namespace App\Http\Livewire\Invoices;

use App\Models\Invoice;
use App\Models\ProviderInvoiceChecks;
use Livewire\Component;
use PDF;

class ProviderPayment extends Component
{
    protected $listeners = ['invoicesAdded', 'rerender' => '$refresh'];
    public $invoice_id = '';
    public $check_id;
    public $providerCheckForm;
    public $invoice_data = '';

    public function render()
    {
        if (!empty($this->invoice_id)) {
            $this->invoice_data = Invoice::where(['id'=>$this->invoice_id,'type'=>2])->first();
        } else {
            $this->reset();
        }
        return view('livewire.invoices.provider-payment');
    }

    public function invoicesAdded($id)
    {
        $this->invoice_id = $id;
    }



    public function editCheck($id)
    {
        $this->check_id = $id;
        $this->providerCheckForm = ProviderInvoiceChecks::where('id', $id)->first()?->toArray();
        $this->dispatchBrowserEvent('editCheck');
    }


    public function addNewCheck()
    {
        $this->check_id = null;
        $this->providerCheckForm = null;
        $this->dispatchBrowserEvent('addCheck');
    }

    public function deleteCheck($id)
    {
        ProviderInvoiceChecks::where('id', $id)->delete();
        $this->emit('rerender');
    }

    public function submitproviderCheckForm()
    {

        $data = $this->providerCheckForm;
        $id = $this->check_id;
        $data['invoice_id'] = $this->invoice_id;

        if (empty($id)) {

            ProviderInvoiceChecks::create($data);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            ProviderInvoiceChecks::where('id', $id)->update($data);
        }

        $this->dispatchBrowserEvent('saveCheck');
        $this->emit('rerender');
    }

    public function print()
    {
        $data = $this->invoice_data;
        $pdf = PDF::loadView('admin.PDF.provider-invoice', compact('data'));

        return response()->streamDownload(function () use ($pdf) {
            echo  $pdf->stream();
        }, 'invoice.pdf');
    }
}
