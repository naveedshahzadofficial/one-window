<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationUtilityConnection extends Model
{
    use HasFactory;
    protected $fillable = ['application_id', 'connection_ownership_id', 'utility_type_id', 'utility_consumer_number',
        'utility_form_id', 'utility_service_provider_id', 'utility_provider_other', 'connection_date', 'bill_file' ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function connectionOwnership()
    {
        return $this->belongsTo(ConnectionOwnership::class);
    }

    public function utilityType()
    {
        return $this->belongsTo(UtilityType::class);
    }

    public function utilityForm()
    {
        return $this->belongsTo(UtilityForm::class, 'utility_form_id');
    }

    public function utilityServiceProvider()
    {
        return $this->belongsTo(UtilityServiceProvider::class);
    }
}
