<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

     protected $redirectTo = 'admin/applications';
     public function __construct()
    {
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    public function login(Request $request)
    {
          $v = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
    
        if ($v->fails())
        {

            return redirect()->back()->withErrors($v->errors());
        }

          if($request->isMethod('post')){
            $data = $request->input();
           
             if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']  , 'is_admin' => 1]  )) {

                 return redirect(route('admin.applications.index'));
            }else{
                
                 return redirect()->back()->withErrors('Invailed Username and Password');
            }
        }

         return view('admin.auth.login');

    }

    
    

}
