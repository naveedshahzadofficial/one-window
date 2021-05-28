<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessSubSector extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['business_sector_id','sub_sector_name_e', 'sub_sector_name_u', 'sub_sector_remark', 'sub_sector_status'];
}
