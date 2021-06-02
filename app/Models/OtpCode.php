<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    use HasFactory;
    protected $fillable = ['otp_type','email','mobile_no','mobile_otp_code', 'email_otp_code','ip_address','is_used',];
}
