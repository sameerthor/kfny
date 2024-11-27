<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\Models\BasicIntake;

class AnswerDue extends Component
{
    public $date_from;

    public function render()
    {
        if (!empty($this->date_from)) {
            $res = BasicIntake::whereHas('filingInfo', function ($query) {
                $query->whereDate('ans_due_by', '>=', date('Y-m-d', strtotime($this->date_from)));
            });
            $search_results = $res->get();
        } else {
            $search_results = [];
        }
        return view('livewire.reports.answer-due', compact('search_results'));
    }

    public function clearData()
    {

        $this->date_from = "";
        $this->emitSelf('$refresh');
    }
}
