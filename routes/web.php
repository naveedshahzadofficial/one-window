<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant;

Route::get('/', function () {
    return view('admin.auth.login');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'prefix'=>'applicant', 'as'=>'applicant.'], function () {
   Route::get('dashboard', [ Applicant\DashboardController::class,'index'])->name('dashboard');
});
