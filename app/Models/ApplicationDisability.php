<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationDisability extends Model
{
    use HasFactory;
    protected $fillable = ['application_id', 'disability_id', 'disability_other', 'disability_certificate_file', ];
}
