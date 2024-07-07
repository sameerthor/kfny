<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function invoice_intake()
    {
        return $this->hasMany(BasicIntake::class, 'invoice_id', 'id');
    }

    public function invoice_settlement()
    {
        return $this->hasMany(Settlement::class, 'invoice_id', 'id');
    }

    public function invoice_checks()
    {
        return $this->hasMany(FilingInvoiceChecks::class, 'invoice_id', 'id');
    }

    public function provider_invoice_checks()
    {
        return $this->hasMany(ProviderInvoiceChecks::class, 'invoice_id', 'id');
    }

    
}
