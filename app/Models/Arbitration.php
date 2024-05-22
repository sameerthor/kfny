<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Arbitration extends Model
{
    use HasFactory;
    protected $fillable=['basic_intake_id','arbitration_date','arbitrator','rebutal_uploaded','arbitration_status'];

    protected function arbitrationDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
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
