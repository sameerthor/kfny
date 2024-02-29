<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicIntakeBilling extends Model
{
    use HasFactory;
    protected $table = 'basic_intake_billings';
    protected $fillable = ['basic_intake_id','dos_from','dos_to','amount','partial_pay','out_st','pom','ver_req','ver_resp','denial_date','denial_reason'];
    protected $guarded = [];
}
