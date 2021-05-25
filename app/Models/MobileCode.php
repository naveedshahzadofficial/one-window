<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileCode extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['code_number', 'telecom_company_id', 'code_remark', 'code_status'];
}
