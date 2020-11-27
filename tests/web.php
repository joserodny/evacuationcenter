<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
    // get brgy dropdown ajax
    Route::get('getEvacuation/{id}', [App\Http\Controllers\Admin\AccountController::class, 'getEvacuation']);

});



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // ProfileController
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);
    // End ProfileController


     // BrgyEvacuationController
    Route::resource('brgyevacuation', 'App\Http\Controllers\Admin\BrgyEvacuationController');
    Route::post('brgy', [App\Http\Controllers\Admin\BrgyEvacuationController::class, 'store']);
    Route::post('evacuation', [App\Http\Controllers\Admin\BrgyEvacuationController::class, 'storecenter']);
    // End BrgyEvacuationController


    // DashboardController
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('role:admin');
    Route::get('evacuationcenter',  [App\Http\Controllers\Admin\DashboardController::class, 'getbrgyevacuation']);
    // End DashboardController

    // AccountController
    Route::resource('accounts', 'App\Http\Controllers\Admin\AccountController');
    Route::get('accounts', [App\Http\Controllers\Admin\AccountController::class, 'index']);
    Route::get('accountdelete/{id}', [App\Http\Controllers\Admin\AccountController::class, 'destroy']);
    Route::post('createAccount', [App\Http\Controllers\Admin\AccountController::class, 'store']);
    Route::post('updateAccount', [App\Http\Controllers\Admin\AccountController::class, 'update']);

    // End AccountController



});


Route::get('/volunteer_dashboard', 'App\Http\Controllers\Volunteer\DashboardController@index')->middleware('role:volunteer');
