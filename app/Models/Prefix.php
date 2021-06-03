<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prefix extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['prefix_name', 'fbr_code_id', 'prefix_remark', 'prefix_status'];

}
