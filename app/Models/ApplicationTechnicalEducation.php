<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationTechnicalEducation extends Model
{
    use HasFactory;
    protected $fillable = ['application_id', 'certificate_title', ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
