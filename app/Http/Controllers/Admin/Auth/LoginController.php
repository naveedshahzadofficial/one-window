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

    public function __construct()
    {
        $this->middleware("guest:admin", ['except' => ['logout']]);
    }

    protected $redirectTo = 'admin/applications';

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->admin_status) {
            Auth::guard('admin')->logout();
            return back()->with('error_message', 'Your account is inactive, please contact your administrator.');
        }
        return redirect()->intended($this->redirectPath());
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

}
