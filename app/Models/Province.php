<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['province_name', 'province_remark', 'province_status'];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class,'business_province_id');
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
