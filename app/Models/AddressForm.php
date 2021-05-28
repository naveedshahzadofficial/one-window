<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressForm extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['form_name', 'form_remark', 'form_status', ];
}
