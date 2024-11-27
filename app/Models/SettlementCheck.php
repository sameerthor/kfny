<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class SettlementCheck extends Model
{
    use HasFactory;
    protected  $fillable=['settlement_id','date_received','total','principle','interest','attorney_fees','filing_fees','costs','other','check','date'];


    
    public function settlement()
    {
        return $this->belongsTo(Settlement::class, 'settlement_id');
    }

    protected function dateReceived(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }
}
