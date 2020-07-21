<?php

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

 Route::get('/cl', function() {
     Artisan::call('cache:clear');
     Artisan::call('view:clear');
     Artisan::call('config:clear');
     Artisan::call('route:clear');
     return "All Cache Is Cleared";
 });

Route::get('/', function () {
    return redirect()->route('login');
});


//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['as' => 'super.', 'prefix' => 'super', 'namespace' => 'Super', 'middleware' => ['auth', 'super']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('driver', 'DriverController');
    Route::resource('car', 'CarController');
    Route::resource('user', 'UserController');
    Route::resource('requisition', 'RequestController');
});


 Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function () {
     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
     Route::resource('requisition', 'RequestController');
 });

Auth::routes();


// For jquery Request
Route::get('check-driver', 'ScriptController@checkDriver');
Route::get('check-car', 'ScriptController@checkCar');
