<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class RegistrationOtherDocument extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $fillable = ['registration_id', 'document_title', 'document_file' ];

    public function generateTags(): array
    {
        return ['Registration','Other Document'];
    }
}
