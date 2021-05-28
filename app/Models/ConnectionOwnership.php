<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConnectionOwnership extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ 'ownership_name','ownership_remark', 'ownership_status'];
}
