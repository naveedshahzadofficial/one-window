<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['province_name', 'province_remark', 'province_status'];

    public function applications()
    {
        return $this->hasMany(Application::class,'business_province_id');
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
