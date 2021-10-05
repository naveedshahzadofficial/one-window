<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RlcoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'v1'],function() {
    Route::get('department_list', [RlcoController::class, 'departmentList']);
    Route::get('business_list', [RlcoController::class, 'businessList']);
    Route::get('activity_list', [RlcoController::class, 'activityList']);
    Route::get('rlcos_search', [RlcoController::class, 'searchRlcos']);
    Route::get('rlco-detail/{rlco}', [RlcoController::class, 'rlcoDetail']);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
