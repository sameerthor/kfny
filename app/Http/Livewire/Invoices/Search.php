<?php

namespace App\Http\Livewire\Invoices;

use App\Models\Invoice;
use App\Models\ProvoiderInformation;
use Livewire\Component;
use DB;

class Search extends Component
{
    public $Search;
    public $searchResults;
    public function render()
    {
        $providers = ProvoiderInformation::orderBy('id', 'desc')->get();

        return view('livewire.invoices.search', compact('providers'));
    }

    public function invoiceSearch()
    {
        $filtered = array_filter($this->Search);
        DB::enableQueryLog();

        if (!empty($filtered)) {
            $obj = new Invoice;
            $this->searchResults =    $obj->where(
                function ($query) use ($filtered, $obj) {
                    $query->orWhereHas('invoice_intake', function ($query1) use ($filtered) {
                         $query1->where('provider_id', $filtered['provider_id']);
                    });
                    $query->orWhereHas('invoice_settlement.basic_intake', function ($query1) use ($filtered) {
                        return $query1->where('provider_id', $filtered['provider_id']);
                    });
                }
            )->get();
       
        } else {
            $this->searchResults = [];
        }
    }

    public function resetForm()
    {
        $this->dispatchBrowserEvent('resetInvoice');
        $this->searchResults = [];
        $this->Search = [];
    }
}
