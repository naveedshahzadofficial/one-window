<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scope extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['scope_title', 'scope_order', 'scope_remarks', 'scope_status'];

    public function rlcos()
    {
        return $this->belongsToMany(Rlco::class);
    }


}
