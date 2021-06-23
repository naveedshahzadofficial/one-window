<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ 'status_name','status_type','status_order_no','status_color_class','status_remark','status_status'];

    public function applications(): MorphToMany
    {
        return $this->morphedByMany(Application::class, 'statusable')->withTimestamps()->withPivot(['log_remark','log_file']);
    }

    public function certification(): MorphToMany
    {
        return $this->morphedByMany(ApplicationCertification::class, 'statusable')->withTimestamps()->withPivot(['log_remark','log_file']);
    }
}
