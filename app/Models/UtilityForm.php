<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UtilityForm extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ 'form_name', 'fbr_code_id', 'form_remark', 'form_status'];
}
