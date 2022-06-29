<?php

use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\RaporController;
use App\Http\Controllers\SiswaController;
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

Route::group(['middleware' => ['auth', 'cekleveladmin', 'sweetalert'], 'prefix' => 'admin'], function(){
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::resource('siswa', SiswaController::class);
    Route::resource('matpel', MataPelajaranController::class);
    Route::resource('rapor', RaporController::class);
});

Route::group(['middleware' => ['auth','cekleveluser', 'sweetalert'], 'prefix' => 'user'], function(){
    Route::get('dashboard', 'App\Http\Controllers\DashboardUserController@index')->name('dashboard');
});
