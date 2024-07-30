<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class EOU extends Model
{
    use HasFactory;
    protected $fillable = [
        'insurance_company', 'provider', 'carrier_attorney', 'eou_status', 'amount_dispute', 'date_service',
        'assigner', 'claim_number', 'eou_date', 'eou_time', 'eou_location', 'eou_witness', 'eou_attorney', 'witness_fee_demanded', 'witness_fee_agreed', 'witness_fee_received', 'eou_withdrawl_date', 'witness_fee_outstanding', 'eou_transcript_received', 'eou_transcript_deadline', 'eou_transcript_sent', 'first_post_eou_verification', 'response_deadline', 'second_post_eou_verification', 'response_post_eou_verification', 'denial_date', 'person_settled', 'settlement_date', 'email_contact', 'phone_contact', 'principle_settled', 'attorney_fees_settled', 'principle_settled_outstanding', 'attorney_fees_settled_outstanding', 'principle_received', 'principle_received_date', 'attorney_fees_received', 'attorney_fees_received_date','notes'
    ];

    public function insuranceCompany()
    {
        return $this->hasOne(InsuranceCompany::class, 'id', 'insurance_company');
    }

    public function provoiderInformation()
    {
        return $this->hasOne(ProvoiderInformation::class, 'id', 'provider');
    }

    public function EOULetter()
    {
        return $this->hasMany(EOULetter::class, 'id', 'eou_id');
    }

    protected function dateService(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function eouDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }


    protected function eouWithdrawlDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function eouTranscriptReceived(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function eouTranscriptDeadline(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function eouTranscriptSent(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function firstPostEouVerification(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function responseDeadline(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function secondPostEouVerification(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function responsePostEouVerification(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function denialDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function settlementDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function principleReceivedDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }

    protected function attorneyFeesReceivedDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime($value)),
        );
    }
}
