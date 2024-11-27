<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Discovery extends Model
{
    use HasFactory;
    protected $table = 'discovery';
    protected $guarded = [];
    protected $fillable = ['d_demands', 'p_resp', 'p_demands', 'd_resp', 'd_3101', 'p_3101', 'd_notice', 'p_nta_resp', 'p_notice', 'd_nta_resp', 'good_faith_let', 'note_of_issue', 'd_supp_demand', 'p_supp_resp', 'p_supp_demand', 'd_supp_resp', 'party_disc_date', 'party_disc_text', 'subpoena_date', 'subpoena_text', 'notes', 'basic_intake_id'];

    public function basic_intake()
    {
        return $this->belongsTo(BasicIntake::class, 'basic_intake_id');
    }

    public function schedules()
    {
        return $this->hasMany(DiscoverySchedule::class, 'discovery_id', 'id');
    }

    public function appearances()
    {
        return $this->hasMany(DiscoverAppearance::class, 'discovery_id', 'id');
    }

    protected function subpoenaDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function partyDiscDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function dSuppResp(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function pSuppDemand(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function pSuppResp(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function dDemand(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function noteOfIssue(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function goodFaithLet(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function dDemands(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function pResp(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function dResp(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function pDemands(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function d3101(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function p3101(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function dNotice(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function pNtaResp(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function pNotice(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }
    protected function dNtaResp(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }
}
