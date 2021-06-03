<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressCapacity extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['capacity_name', 'fbr_code_id', 'capacity_remark', 'capacity_status', ];
}
