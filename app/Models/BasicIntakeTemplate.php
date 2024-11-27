<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicIntakeTemplate extends Model
{
    use HasFactory;
    protected $fillable=["basic_intake_id","title","path"];
}
