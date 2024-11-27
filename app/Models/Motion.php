<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Motion extends Model
{
    use HasFactory;
    protected $fillable=['basic_intake_id','motion_type','x_motion_type','return_date','decisions','decision_date','prima_facie','judge','part','noe_date'];

    public function assignedTo($type, $column)
    {
      return $this->hasMany(EmployeeCalenderRelation::class, 'appearance_id', 'id')->where(['appearance_type' => $type, 'appearance_column' => $column]);
    }

    
    public function adjourneds()
    {
        return $this->hasMany(MotionAdjourned::class);
    }
    
    public function basic_intake()
    {
        return $this->belongsTo(BasicIntake::class, 'basic_intake_id');
    }


    public function judgeData()
    {
        return $this->hasOne(Judge::class,'id','judge');
    }

    protected function returnDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function decisionDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function noeDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }
}
