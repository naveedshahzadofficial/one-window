<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fos extends Model
{
    use HasFactory;
    protected $fillable = ['rlco_id', 'fos_observation','fos_solution','fos_order','admin_id','fos_status'];
}
