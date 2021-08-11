<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['activity_name','activity_order', 'activity_remark', 'activity_status'];

    public function getActivityStatus()
    {
        return ($this->activity_status)?'Active':'Inactive';
    }
}
