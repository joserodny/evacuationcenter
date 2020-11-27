<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::resource('accounts', 'App\Http\Controllers\Admin\API\AccountController');

    Route::get('accounts', [App\Http\Controllers\Admin\API\AccountController::class, 'index'])->middleware('auth:api');


});


