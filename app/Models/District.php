<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ 'district_name_e', 'district_name_u','division_id','province_id','region_id','district_is_business','district_status','district_remark',];
}
