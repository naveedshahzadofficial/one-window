<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['rlco_id', 'rating', 'feedback', 'ip_address'];

    public function rlco(){
        return $this->belongsTo(Rlco::class);
    }
}
