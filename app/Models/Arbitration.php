<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Arbitration extends Model
{
    use HasFactory;
    protected $fillable=['basic_intake_id','arbitration_date','arbitrator','rebutal_uploaded','arbitration_status'];


    public function basic_intake()
    {
        return $this->belongsTo(BasicIntake::class, 'basic_intake_id');
    }
    
    
    protected function arbitrationDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }
    
    public function assignedTo($type, $column)
    {
      return $this->hasMany(EmployeeCalenderRelation::class, 'appearance_id', 'id')->where(['appearance_type' => $type, 'appearance_column' => $column]);
    }

    protected function rebutalUploaded(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }

    public function arbitratorData()
    {
        return $this->hasOne(Arbitrator::class,'id','arbitrator');
    }
    
}
