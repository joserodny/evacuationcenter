<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
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
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // ProfileController
    Route::get('profile',          ['as' => 'profile.edit',     'uses' => 'ProfileController@edit']);
    Route::put('profile',          ['as' => 'profile.update',   'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    // End ProfileController

    // DashboardController
    Route::resource('brgyevacuation',  'DashboardController');
    Route::get('dashboard',             [DashboardController::class, 'index'])->middleware('role:admin');
    Route::get('evacuationcenter',      [DashboardController::class, 'getbrgyevacuation']);
    Route::post('brgy',                 [DashboardController::class, 'storebrgy']);
    Route::post('evacuation',           [DashboardController::class, 'storeevacuation']);
    // End DashboardController

    // AccountController
    Route::resource('accounts',        'AccountController');
    Route::get('accounts',              [AccountController::class, 'index']);
    Route::get('getEvacuation/{id}',    [AccountController::class, 'getEvacuation']);
    Route::get('accountdelete/{id}',    [AccountController::class, 'destroy']);
    Route::post('createAccount',        [AccountController::class, 'store']);
    Route::post('updateAccount',        [AccountController::class, 'update']);
    // End AccountController

});


Route::get('/volunteer_dashboard', 'App\Http\Controllers\Volunteer\DashboardController@index')->middleware('role:volunteer');

