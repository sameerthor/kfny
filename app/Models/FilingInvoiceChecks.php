<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class FilingInvoiceChecks extends Model
{
    use HasFactory;
    protected $fillable=['invoice_id','check_number','check_date','amount','issued_by','date_received'];


    protected function checkDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime( $value)),
        );
    }
    
    protected function dateReceived(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => empty($value) ? "" : date('m/d/Y', strtotime($value)),
            set: fn ($value) => empty($value) ? "" : date('Y-m-d', strtotime( $value)),
        );
    }
}
