<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UtilityServiceProvider extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ 'utility_form_id', 'provider_name', 'fbr_code_id',
        'provider_remark', 'provider_status'];
    
}
