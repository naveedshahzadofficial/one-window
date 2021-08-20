<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RlcoKeyword extends Model
{
    use HasFactory;
    protected $fillable = ['rlco_id', 'keyword_name'];
}
