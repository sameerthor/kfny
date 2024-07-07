<?php

namespace App\Http\Livewire\Invoices;


use Livewire\Component;
use App\Models\Invoice;
use App\Models\Settlement;
use App\Models\ProvoiderInformation;

class ProviderInvoice extends Component
{
    public $provider_settlements = [];
    public $provider_ids;
    public $selected_settlements = [];
    protected $listeners = ['providerChange'];
    public function render()
    {
        $providers = ProvoiderInformation::all();
        return view('livewire.invoices.provider-invoice',compact('providers'));
    }

    public function providerChange($pro)
    {
        if (!empty($pro)) {
            $this->provider_ids = $pro;
            $this->provider_settlements = Settlement::whereHas('basic_intake', function ($query) use ($pro) {
                return $query->where('provider_id', '=', $pro);
            })->get();
        } else {
            $this->provider_ids = null;
            $this->provider_settlements = [];
        }
        $this->selected_settlements = [];
    }

    public function select($k)
    {
        if (in_array($k, $this->selected_settlements)) {
            if (($key = array_search($k, $this->selected_settlements)) !== false) {
                unset($this->selected_settlements[$key]);
            }
        } else {
            $this->selected_settlements[] = $k;
        }
    }

    public function addAll()
    {
        $this->selected_settlements = $this->provider_settlements->pluck('id')->toArray();
    }

    public function generate()
    {
        $invoice = new Invoice;
        $invoice->type = 2;
        $invoice->save();
        Settlement::whereIn('id', $this->selected_settlements)->update(['invoice_id' => $invoice->id]);
        $this->dispatchBrowserEvent('providerPaymentTab');
        $this->emit('providerInvoicesAdded', $invoice->id);
        $this->reset();
    }
}
