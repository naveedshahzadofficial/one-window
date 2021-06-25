<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Statusable extends Model
{
    use HasFactory;
    protected $primaryKey = false;
    protected $fillable = [ 'status_id','statusable_id','statusable_type','user_id','user_type','log_file', 'log_remark'];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function admin(): BelongsTo
    {           $this->where('user_type','App\Models\Admin');
        return $this->belongsTo(Admin::class,'user_id');
    }

    public function user(): BelongsTo
    {       $this->where('user_type','App\Models\User');
        return $this->belongsTo(Admin::class);
    }

    public function registration(): BelongsTo
    {   $this->where('statusable_type', 'App\Models\Registration');
        return $this->belongsTo(Registration::class,'statusable_id');
    }

    public function applications(): BelongsTo
    {
        $this->where('statusable_type', 'App\Models\Application');
        return $this->belongsTo(Application::class,'statusable_id');
    }
}
