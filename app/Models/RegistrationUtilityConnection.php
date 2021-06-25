<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable;

class RegistrationUtilityConnection extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $fillable = ['registration_id', 'connection_ownership_id', 'utility_type_id', 'utility_consumer_number',
        'utility_form_id', 'utility_service_provider_id', 'utility_provider_other', 'connection_date', 'bill_file' ];

    public function generateTags(): array
    {
        return ['Registration','Utility Connection'];
    }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }

    public function connectionOwnership(): BelongsTo
    {
        return $this->belongsTo(ConnectionOwnership::class);
    }

    public function utilityType(): BelongsTo
    {
        return $this->belongsTo(UtilityType::class);
    }

    public function utilityForm(): BelongsTo
    {
        return $this->belongsTo(UtilityForm::class, 'utility_form_id');
    }

    public function utilityServiceProvider(): BelongsTo
    {
        return $this->belongsTo(UtilityServiceProvider::class);
    }
}
