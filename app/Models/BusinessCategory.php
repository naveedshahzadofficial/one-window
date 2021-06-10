<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['category_name', 'category_remark', 'category_status'];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
