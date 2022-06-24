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
    return (redirect()->intended('login'));
});

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

// Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function(){
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});
