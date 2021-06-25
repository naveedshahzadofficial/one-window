<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'prefix'=>'applicant', 'as'=>'applicant.'], function () {
   Route::post('registrations/index-ajax', [Applicant\RegistrationController::class,'indexAjax'])->name('registrations.index-ajax');
   Route::resource('registrations', Applicant\RegistrationController::class);
   Route::resource('registrations.applications', Applicant\ApplicationController::class);
});
