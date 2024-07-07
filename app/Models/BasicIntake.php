<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicIntake extends Model
{
    use HasFactory;
    protected $table = 'basic_intakes';
    protected $fillable = ['patient_id','provider_id','dj_judge_id','venue_county','venue','is_ligitation','carrier_attorney','index_number','appeal_docket','status','attorney_notes','notes'];
    protected $guarded = [];
   
    public function statusData()
    {
        return $this->hasOne(CaseStatus::class, 'id', 'status');
    }

    public function provoiderInformation()
    {
        return $this->hasOne(ProvoiderInformation::class, 'id', 'provider_id');
    }
    public function defenseFirm()
    {
        return $this->hasOne(DefenseFirm::class, 'id', 'carrier_attorney');
    }

    public function judge()
    {
        return $this->hasOne(Judge::class, 'id', 'dj_judge_id');
    }

    public function venueCounty()
    {
        return $this->hasOne(Venue::class, 'id', 'venue_county');
    }

   

    public function tableDetails()
    {
        return $this->hasMany(BasicIntakeBilling::class, 'basic_intake_id', 'id');
    }

    public function trial()
    {
        return $this->hasOne(Trial::class, 'basic_intake_id', 'id');
    }

    public function settlements()
    {
        return $this->hasOne(Settlement::class, 'basic_intake_id', 'id');
    }

    public function appeals()
    {
        return $this->hasMany(Appeal::class, 'basic_intake_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(PatientInfo::class, 'patient_id');
    }
}
