<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TaskAssigned extends Model
{
    use HasFactory;
    protected  $fillable=['employee_id','file_no','task_type','task_notes','task_deadline','assigned_calender','task_status'];

    protected function taskDeadline(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    public function employee()
    {
        return $this->hasOne(User::class,'id','employee_id');
    }

}
