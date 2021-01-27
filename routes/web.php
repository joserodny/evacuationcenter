<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\DashboardController as AdminController;
use App\Http\Controllers\Admin\EvacuationController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TyphoonController;
use App\Http\Controllers\Volunteer\ConstituentsController;
use App\Http\Controllers\Volunteer\DashboardController as VolunteerController;
use App\Models\Admin\Evacuation;
use App\Models\Volunteer\Constituents;

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
    return redirect('login');
});

Route::fallback(function() {
    return view('layouts.404');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
    // ProfileController'
   // Route::resource('profile',      'App\Http\Controllers\Admin\ProfileController');
    Route::get('profile',                       ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);
    Route::put('profile',                       ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);
    Route::put('profile/password',              ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);
    // End ProfileController

    // DashboardController
    Route::get('dashboard',                     [AdminController::class, 'index']);
    Route::post('dashboard/brgy',               [AdminController::class, 'storebrgy'])         ->name('dashboard.brgy');
    Route::post('dashboard/evacuation',         [AdminController::class, 'storeevacuation'])   ->name('dashboard.evacuation');
    Route::resource('dashboard',                AdminController::class, ['only'=>['index','storebrgy', 'storeevacuation']]);
    // End DashboardController

    // AccountController
    Route::resource('account',                  AccountController::class, ['except'=>['show', 'create', 'edit']] );
    Route::get('account',                       [AccountController::class, 'index']);
    Route::get('account/getevacuation/{id}',    [AccountController::class, 'getEvacuation']);
    Route::get('account/delete/{id}',           [AccountController::class, 'destroy']);
    Route::post('account/create',               [AccountController::class, 'store'])->name('account.create');
    Route::post('account/update',               [AccountController::class, 'update'])->name('account.update');
   
    // End AccountController

    // TyphoonController
    Route::resource('typhoon',                  TyphoonController::class);
    Route::get('typhoon',                       [TyphoonController::class, 'index']);
    Route::get('typhoon/update/{id}',           [TyphoonController::class, 'statupdate']);
    Route::get('typhoon/delete/{id}',           [TyphoonController::class, 'destroy']);
    Route::post('typhoon/create',               [TyphoonController::class, 'store'])->name('typhoon.create');
    Route::post('typhoon/update',               [TyphoonController::class, 'update'])->name('typhoon.update');
    // End TyphoonController

    // EvacuationController
    // Route::resource('evacuationcenter',         EvacuationController::class);
    // Route::get('evacuationcenter',              [EvacuationController::class, 'index']);
    // End EvacuationController

});

Route::group(['prefix' => 'volunteer', 'middleware' => 'role:user'], function () {
    // ProfileController'
   Route::get('profile',                        ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);
   Route::put('profile',                        ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);
   Route::put('profile/password',               ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);
   // End ProfileController

    // DashboardController
    Route::resource('dashboard',                VolunteerController::class);
    Route::get('dashboard',                     [VolunteerController::class, 'index'])->name('dashboard.home');
    Route::post('dashboard/create',             [VolunteerController::class, 'store'])->name('dashboard.create');
    // End DashboardController

    // ConstituentsController  
    Route::get('familymember/{id}',            [ConstituentsController::class, 'index']);
    Route::post('familymember/insert',         [ConstituentsController::class, 'store'])->name('familymember.store');
    Route::patch('familyhead/update',           [ConstituentsController::class, 'update'])->name('familyhead.update');
    Route::resource('constituents',             ConstituentsController::class);
    // End ConstituentsController
});
