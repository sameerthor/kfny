<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class DiscoverySchedule extends Model
{
    use HasFactory;
    protected $table = 'discovery_schedules';
    protected $guarded = [];
    protected $fillable = ['discovery_schedule','demand_due','resp_due','ebt_deadlines','next_desc_conf','noi_due','discovery_id'];
    

   

    protected function demandDue(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('y-n-j', strtotime($value)),
        );
    }
    
    protected function respDue(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('y-n-j', strtotime($value)),
        );
    }
    
    protected function ebtDeadlines(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('y-n-j', strtotime($value)),
        );
    }

    protected function nextDescConf(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('y-n-j', strtotime($value)),
        );
    }

    protected function noiDue(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('y-n-j', strtotime($value)),
        );
    }
}
