<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class BasicIntakeBilling extends Model
{
    use HasFactory;
    protected $table = 'basic_intake_billings';
    protected $fillable = ['basic_intake_id','dos_from','dos_to','amount','partial_pay','out_st','pom','ver_req','ver_resp','denial_date','denial_reason'];
    protected $guarded = [];

    public function DenialReason()
    {
        return $this->hasOne(DenialReason::class, 'id', 'denial_reason');
    }


    protected function dosFrom(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('d/m/Y', strtotime($value)),
            set: fn ($value) => date('Y-m-d', strtotime(str_replace('/','-',$value))),
        );
    }

    protected function dosTo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('d/m/Y', strtotime($value)),
            set: fn ($value) => date('Y-m-d', strtotime(str_replace('/','-',$value))),
        );
    }

    protected function verResp(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('d/m/Y', strtotime($value)),
            set: fn ($value) => date('Y-m-d', strtotime(str_replace('/','-',$value))),
        );
    }
    protected function verReq(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('d/m/Y', strtotime($value)),
            set: fn ($value) => date('Y-m-d', strtotime(str_replace('/','-',$value))),
        );
    }
    protected function pom(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('d/m/Y', strtotime($value)),
            set: fn ($value) => date('Y-m-d', strtotime(str_replace('/','-',$value))),
        );
    }
    protected function denialDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value)?"":date('d/m/Y', strtotime($value)),
            set: fn ($value) => date('Y-m-d', strtotime(str_replace('/','-',$value))),
        );
    }


}
