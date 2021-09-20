<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = ['rlco_id', 'faq_question','faq_answer', 'faq_file', 'faq_order','admin_id','faq_status'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->admin_id = auth()->guard('admin')->id();
        });
    }
}
