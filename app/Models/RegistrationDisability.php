<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrationDisability extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = ['registration_id', 'disability_id', 'disability_other', 'disability_certificate_file', ];

    public function generateTags(): array
    {
        return ['Registration','Disability'];
    }

    public function disability(): BelongsTo
    {
        return $this->belongsTo(Disability::class);
    }
}
