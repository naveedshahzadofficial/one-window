<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RlcoRequiredDocument extends Model
{
    use HasFactory;
    protected $fillable = ['rlco_id', 'required_document_id', 'position', ];

    public function requiredDocument(){
        return $this->belongsTo(RequiredDocument::class);
    }

}
