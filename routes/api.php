<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/get-business/{id}', [BusinessController::class, 'getBusiness']);
// Route::get('/get-businesses', [BusinessController::class, 'getBusinesses']);
// Route::get('/store-businesses',  [BusinessController::class, 'storeBusiness']);
// Route::put('/update-business',  [BusinessController::class, 'updateBusiness']);
// Route::delete('/delete-business',  [BusinessController::class, 'deleteBusinesses']);


Route::get('/get-business/{id}', [BusinessController::class, 'getBusiness']);
Route::get('/get-businesses', [BusinessController::class, 'getBusinesses']);
Route::get('/store-business',  [BusinessController::class, 'storeBusiness']);
Route::get('/update-business/{id}',  [BusinessController::class, 'updateBusiness']);
Route::get('/delete-business/{id}',  [BusinessController::class, 'deleteBusinesses']);
