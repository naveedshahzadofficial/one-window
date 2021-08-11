<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['category_id','department_name','department_display_name', 'department_id', 'department_scope', 'province_id', 'department_remarks', 'department_status'];
}
