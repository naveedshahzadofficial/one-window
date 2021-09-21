<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class OtherDocument extends Model
{
    use HasFactory, Userstamps;
    protected $fillable = ['rlco_id', 'document_title', 'document_file', 'document_order', ];
}
