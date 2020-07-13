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
    return view('auth/login');
});


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['as' => 'super.', 'prefix' => 'admin', 'namespace' => 'Super', 'middleware' => ['auth', 'super']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('driver', 'DriverController');
    Route::resource('car', 'CarController');
});


 Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function () {
     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
 });


Auth::routes();
