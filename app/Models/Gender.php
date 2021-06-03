<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['gender_name', 'fbr_code_id', 'gender_remark', 'gender_status'];
}
