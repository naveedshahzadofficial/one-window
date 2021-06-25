<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Application extends Model implements Auditable
{
    use HasFactory, SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $fillable = ['application_id', 'is_applied', 'certification_remark', 'certification_status', 'status_id'];

    public function generateTags(): array
    {
        return ['Registration','Certification'];
    }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }

    public function statuses(): MorphToMany
    {
        return $this->morphToMany(Status::class, 'statusable')->withTimestamps()->withPivot(['log_remark','log_file']);
    }
}
