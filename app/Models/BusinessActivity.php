<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessActivity extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['business_category_id','section_code', 'section_name', 'division_id',
        'division_name', 'group_id', 'group_name', 'class_code', 'class_name',
        'sub_class_code', 'sub_class_name','activity_remark', 'activity_status'];
}
