<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','applicant'], 'prefix'=>'applicant', 'as'=>'applicant.'], function () {
   Route::resource('applications', Applicant\ApplicationController::class);
   Route::post('applications/index-ajax', [Applicant\ApplicationController::class,'indexAjax'])->name('applications.index-ajax');
});
