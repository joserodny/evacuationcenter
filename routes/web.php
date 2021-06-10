<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\DashboardController as AdminController;
use App\Http\Controllers\Admin\TyphoonController;

use App\Http\Controllers\Volunteer\ConstituentsController;
use App\Http\Controllers\Volunteer\DashboardController as VolunteerController;
use App\Http\Controllers\Volunteer\EvacueesController;


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
    Route::get('/familyhead',                   [VolunteerController::class, 'familyHead'])->name('dashboard.familyhead');
    Route::get('/individual',                   [VolunteerController::class, 'individual'])->name('dashboard.individual');
    Route::get('/evacueeshead',                 [VolunteerController::class, 'evacueeshead'])->name('dashboard.evacueeshead');

    
    Route::post('dashboard/create',             [VolunteerController::class, 'store'])->name('dashboard.create');
    Route::post('dashboard/createindi',         [VolunteerController::class, 'storeindi'])->name('dashboard.createindi');
    Route::get('dashboard/action',              [VolunteerController::class, 'action'])->name('dashboard.action');
    // End DashboardController

    // ConstituentsController  
    Route::get('familymember/{id}',             [ConstituentsController::class, 'show']);
    Route::get('familymember/edit/{id}',        [ConstituentsController::class, 'index']);
    Route::get('familymember/edit/delete/{id}', [ConstituentsController::class, 'destroy']);
    Route::get('familymember/edit/remove/{id}', [ConstituentsController::class, 'removeAll']);
    Route::post('familymember/insert',          [ConstituentsController::class, 'store'])->name('familymember.store');
    //indi
    Route::put('individual/update',             [ConstituentsController::class, 'update'])->name('individual.update');
    Route::get('remove/{id}',                   [ConstituentsController::class, 'destroyindi']);
    Route::resource('constituents',             ConstituentsController::class);
    // End ConstituentsController


    //EvacueesController
    Route::post('evacuees/insert',              [EvacueesController::class, 'strore'])->name('evacuees.store');
    Route::get('evacuees/update/{id}',          [EvacueesController::class, 'update']);
    Route::resource('evacuees',                 EvacueesController::class);
    //End EvacueesController

});
