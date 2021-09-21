<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fos extends Model
{
    use HasFactory;
    protected $fillable = ['rlco_id', 'fos_observation','fos_solution', 'fos_file','fos_order','admin_id','fos_status'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->admin_id = auth()->guard('admin')->id();
        });
    }
}
