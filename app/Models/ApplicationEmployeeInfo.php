<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationEmployeeInfo extends Model
{
    use HasFactory;
    protected $fillable = ['application_id', 'employee_type_id', 'male', 'female', 'transgender'];

    public function employeeType()
    {
        return $this->belongsTo(EmployeeType::class);
    }
}
