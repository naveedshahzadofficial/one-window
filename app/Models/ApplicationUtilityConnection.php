<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationUtilityConnection extends Model
{
    use HasFactory;
    protected $fillable = ['application_id', 'connection_ownership_id', 'utility_type_id', 'utility_consumer_number',
        'utility_form_id', ];
}
