<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ApplicationDisability extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = ['application_id', 'disability_id', 'disability_other', 'disability_certificate_file', ];

    public function generateTags(): array
    {
        return ['Registration','Disability'];
    }

    public function disability(){
        return $this->belongsTo(Disability::class);
    }
}
