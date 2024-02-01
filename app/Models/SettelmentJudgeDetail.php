<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettelmentJudgeDetail extends Model
{

    use HasFactory;
    protected $table = 'settlement_judge_details';
    protected $guarded = [];
   
    public function basicIntake()
    {
        return $this->belongsTo(BasicIntake::class,'basic_intake_id');
    }

    public function provider()
    {
        return $this->belongsTo(ProvoiderInformation::class,'provider_id');
    }

  
    
}

