<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class DiscoverAppearance extends Model
{
    use HasFactory;
    protected $fillable = ['discovery_id','appearance_type','date','time','location','inperson_vertual'];
    
    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('n/j/y', strtotime($value)),
            set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
        );
    }
}
