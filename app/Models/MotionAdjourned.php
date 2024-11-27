<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MotionAdjourned extends Model
{
    use HasFactory;
    protected $fillable=['motion_id','adj_date','time_on','calender','x_mot_due','x_mot_filed','opp_due','opp_filed','reply_due','reply_filed','x_mot_reply_due'];

 
    public function assignedTo($type, $column)
    {
      return $this->hasMany(EmployeeCalenderRelation::class, 'appearance_id', 'id')->where(['appearance_type' => $type, 'appearance_column' => $column]);
    }

    
    public function motion()
    {
        return $this->belongsTo(Motion::class, 'motion_id');
    }

    protected function adjDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function xMotDue(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function xMotFiled(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function oppDue(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function oppFiled(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function replyDue(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function replyFiled(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    protected function xMotReplyDue(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }
}
