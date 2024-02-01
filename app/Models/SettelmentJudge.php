<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettelmentJudge extends Model
{
    use HasFactory;
    protected $table = 'settlement_judges';
    protected $guarded = [];

    public function tableDetails()
    {
        return $this->hasMany(SettelmentJudgeDetail::class,'set_id','id');
    }

    public function basicIntake()
    {
        return $this->belongsTo(BasicIntake::class,'basic_intake_id');
    }
}
