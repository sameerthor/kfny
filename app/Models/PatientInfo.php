<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class PatientInfo extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','phone_number','city','state','zip_code','doa','claim_number','policy_number','address','self_insh','insured','eip','insurance_company_id'];
    public function insuranceCompany()
    {
        return $this->hasOne(InsuranceCompany::class, 'id', 'insurance_company_id');
    }



      protected function doa(): Attribute
{
    return Attribute::make(
        get: fn ($value) => empty($value)?"":date('m/d/Y', strtotime($value)),
        set: fn ($value) => empty($value)?"":date('Y-m-d', strtotime($value)),
    );
}
}
