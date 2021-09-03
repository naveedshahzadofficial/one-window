<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/rlco/search', [\App\Http\Controllers\HomeController::class, 'search'])->name('searching');
Route::get('/rlco/{rlco}/detail', [\App\Http\Controllers\HomeController::class, 'show'])->name('rlco.detail');
Route::group(['middleware' => 'auth', 'prefix'=>'applicant', 'as'=>'applicant.'], function () {
   Route::get('dashboard', [ Applicant\DashboardController::class,'index'])->name('dashboard');
});
