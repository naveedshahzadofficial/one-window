<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','applicant'], 'prefix'=>'applicant', 'as'=>'applicant.'], function () {
   Route::resource('applications', Applicant\ApplicationController::class);
   Route::post('applications/index-ajax', [Applicant\ApplicationController::class,'indexAjax'])->name('applications.index-ajax');
});


Route::group([ 'prefix'=>'admin', 'as'=>'admin.'],function(){
   Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login');
   Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');
  
   Route::get('/password/reset', [App\Http\Controllers\Admin\Auth\AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
  
   Route::post('/password/email', [App\Http\Controllers\Admin\Auth\AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

   Route::group(['middleware' => \App\Http\Middleware\IsAdmin::class], function () {

      Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class,'logout'])->name('logout');
      Route::resource('applications', App\Http\Controllers\Admin\ApplicationController::class);
      Route::post('applications/index-ajax', [ App\Http\Controllers\Admin\ApplicationController::class,'indexAjax'])->name('applications.index-ajax');

 });

});