<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ApplicationTechnicalEducation extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $fillable = ['application_id', 'certificate_title', ];

    public function generateTags(): array
    {
        return ['Registration','Technical Education'];
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
