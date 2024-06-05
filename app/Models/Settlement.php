<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Settlement extends Model
{
    use HasFactory;
    protected $fillable = ['basic_intake_id','date','type','person_settled','email_fax','phone_number','judgement_appl','judgement_date','noe_judgement','sent_to_marshal','marshal_fees','principle_percent','principle_amount','new_principle','interest_percent','interest_amount','interest_from','interest_from_date','additional_interest','additional_attorney_fees','additional_costs','notes','attorney_fees','filing_fees','costs','new_total'];


    public function checks()
    {
        return $this->hasMany(SettlementCheck::class, 'settlement_id', 'id');
    }

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function interestFromDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function judgementAppl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function judgementDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }
    protected function noeJudgement(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }
}
