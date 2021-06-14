<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disability extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['disability_name_e', 'disability_name_u', 'disability_order', 'disability_remark', 'disability_status', ];
}
