<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCalenderRelation extends Model
{
    use HasFactory;
    protected $fillable = ['appearance_type','appearance_model', 'appearance_column', 'appearance_id', 'employee_id'];
}
