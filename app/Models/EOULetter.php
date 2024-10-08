<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class EOULetter extends Model
{
    use HasFactory;
    protected $fillable = [
        'eou_id', 'eou_letter_date', 'date_requested', 'eou_response_letter', 'adjourned_date'
    ];
    
    public function eou()
    {
      return $this->belongsTo(EOU::class,'eou_id','id');
    }
    
    public function assignedTo($type, $column)
    {
      return $this->hasMany(EmployeeCalenderRelation::class, 'appearance_id', 'id')->where(['appearance_type' => $type, 'appearance_column' => $column]);
    }
    
    protected function eouLetterDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function dateRequested(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }
    protected function eouResponseLetter(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }
    protected function adjournedDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }
}
