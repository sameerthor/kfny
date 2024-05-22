<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class TrialDate extends Model
{
    use HasFactory;
    protected $fillable=['trial_id','trial_date','time_on','calender','prima_facie','judge','plaintiff_witness','defence_witness'];
    
    protected function trialDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }
    public function judgeData()
    {
        return $this->hasOne(Judge::class,'id','judge');
    }
}
