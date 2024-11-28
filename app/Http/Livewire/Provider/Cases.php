<?php

namespace App\Http\Livewire\Provider;

use App\Models\BasicIntake;
use Livewire\Component;
use Auth;
use Livewire\WithPagination;

class Cases extends Component
{
    public $searchID;
    public function render()
    {

        if (!empty($searchquery)) {
            $res =  BasicIntake::where("provider_id", Auth::user()->provider?->id)->where('id', $this->searchID)->paginate(10);
        } else {
            $res =  BasicIntake::where("provider_id", Auth::user()->provider?->id)->paginate(10);
        }
        return view('livewire.provider.cases', [
            'cases' => $res,
        ])->extends('layouts.app')->section('content');;
    }
}
