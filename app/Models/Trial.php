<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Trial extends Model
{
    use HasFactory;
    protected $fillable=['basic_intake_id','not_filed','not_received','deadline','sjm_deadline','trial_decision','trial_noe_date'];
    public function trialDates()
    {
        return $this->hasMany(TrialDate::class);
    }

    public function judgeData()
    {
        return $this->hasOne(Judge::class,'id','judge');
    }

    protected function notFiled(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('y-n-j', strtotime($value)),
        );
    }

    protected function notReceived(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('y-n-j', strtotime($value)),
        );
    }

    protected function deadline(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('y-n-j', strtotime($value)),
        );
    }

    protected function sjmDeadline(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('y-n-j', strtotime($value)),
        );
    }

    protected function trialNoeDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('y-n-j', strtotime($value)),
        );
    }
}
