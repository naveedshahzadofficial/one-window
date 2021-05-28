<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessSector extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['sector_name_e','sector_name_u', 'sector_remark', 'sector_status'];

}
