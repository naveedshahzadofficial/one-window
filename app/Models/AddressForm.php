<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressForm extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['form_name', 'address_type_id', 'fbr_code_id', 'form_remark', 'form_status', ];
}
