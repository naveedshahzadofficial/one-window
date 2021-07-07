<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeSequence extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ 'sequence_name', 'sequence_type', 'sequence_remark', 'sequence_status'];

}
