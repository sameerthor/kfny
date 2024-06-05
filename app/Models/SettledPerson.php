<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettledPerson extends Model
{
    use HasFactory;
    protected $fillable=['name','email_fax','phone_number'];
}
