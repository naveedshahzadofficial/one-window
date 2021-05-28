<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConnectionProvider extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ 'provider_name','provider_remark', 'provider_status'];
}
