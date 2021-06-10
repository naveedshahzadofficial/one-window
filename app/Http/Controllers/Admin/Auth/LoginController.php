<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = 'admin/applications';

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

     public function findUsername()
    {
        $fieldValue = request()->input('email');

        $login_type = filter_var($fieldValue, FILTER_VALIDATE_EMAIL )
            ? 'email'
            : 'username';

        request()->merge([$login_type => $fieldValue]);

        return $login_type;
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }

}
