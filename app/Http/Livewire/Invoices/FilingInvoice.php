<?php

namespace App\Http\Livewire\Invoices;

use Livewire\Component;
use App\Models\ProvoiderInformation;
use App\Models\BasicIntake;
use App\Models\Invoice;

class FilingInvoice extends Component
{
    public $provider_filings = [];
    public $provider_ids;
    public $selected_filing = [];
    protected $listeners = ['providerChange'];


    public function render()
    {
        $providers = ProvoiderInformation::all();
        return view('livewire.invoices.filing-invoice', compact('providers'));
    }

    public function providerChange($pro)
    {
        if (!empty($pro)) {
            $this->provider_ids = $pro;
            $this->provider_filings = BasicIntake::whereIn('provider_id', $pro)->get();
        } else {
            $this->provider_ids = null;
            $this->provider_filings = [];
        }
        $this->selected_filing = [];
    }

    public function select($k)
    {
        if (in_array($k, $this->selected_filing)) {
            if (($key = array_search($k, $this->selected_filing)) !== false) {
                unset($this->selected_filing[$key]);
            }
        } else {
            $this->selected_filing[] = $k;
        }
    }

    public function addAll()
    {
        $this->selected_filing = $this->provider_filings->pluck('id')->toArray();
    }

    public function generate()
    {
        $invoice = new Invoice;
        $invoice->type==1;
        $invoice->save();
        BasicIntake::whereIn('id', $this->selected_filing)->update(['invoice_id' => $invoice->id]);
        $this->dispatchBrowserEvent('filingPaymentTab');
        $this->emit('invoicesAdded', $invoice->id);
        $this->reset();

    }
}
