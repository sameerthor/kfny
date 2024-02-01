<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicIntake extends Model
{
    use HasFactory;
    protected $table = 'basic_intakes';
    protected $guarded = [];

    public function provoiderInformation()
    {
        return $this->hasOne(ProvoiderInformation::class,'id','provider_id');
    }
    public function defenseFirm()
    {
        return $this->hasOne(DefenseFirm::class,'id','defense_firm_id');
    }

    public function venueCounty()
    {
        return $this->hasOne(Venue::class,'id','venue_county');
    }

    public function insuranceCompany()
    {
        return $this->hasOne(InsuranceCompany::class,'id','insurance_company_id');
    }
    
    public function tableDetails()
    {
        return $this->hasMany(BasicIntakeDetails::class,'basic_intake_id','id');
    }
}
