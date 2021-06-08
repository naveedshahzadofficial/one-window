<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserResetPasswordNotification;
use App\Notifications\AdminResetPasswordNotification;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['prefix_id', 'first_name', 'middle_name', 'last_name',
        'cnic_no', 'telecom_company_id', 'mobile_code_id', 'mobile_no',
        'email', 'password','email_verified_at', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function isAdmin()
    {
        if (Auth::user()->is_admin == 1) {
            return true;
        }
        return false;
    }

    public function sendPasswordResetNotification($token)
    {
         $is_admin =  User::where('email',$this->email)->first()->is_admin;
        if($is_admin){
            $this->notify(new AdminResetPasswordNotification($token));
        }else{
            $this->notify(new UserResetPasswordNotification($token));
        }
    }

}
