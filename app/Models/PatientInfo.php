<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientInfo extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','phone_number','city','state','zip_code','doa','claim_number','policy_number','address','self_insh','insured','eip','insurance_company_id'];
    public function insuranceCompany()
    {
        return $this->hasOne(InsuranceCompany::class, 'id', 'insurance_company_id');
    }
}
