<?php

namespace App\Models;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['first_name', 'middle_name', 'last_name',
        'cnic_no', 'mobile_no', 'email', 'password','email_verified_at', 'admin_status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
            $this->notify(new AdminResetPasswordNotification($token));
    }
}
