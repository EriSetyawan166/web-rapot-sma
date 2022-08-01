<?php

use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiSiswaController;
use App\Http\Controllers\RaporController;
use App\Http\Controllers\RaporDetailController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\UpdatePasswordController;
use Illuminate\Support\Facades\App;
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
    Route::resource('rapor-detail', RaporDetailController::class);
    Route::resource('tahun-ajaran', TahunAjaranController::class);
    Route::delete('rapor-detail/{matpelId}/{siswaId}/{tahunId}/{semId}', [
        'as' => 'rapor-detail.destroy',
        'uses' => 'App\Http\Controllers\RaporDetailController@destroy',
    ]);

    Route::put('rapor-detail/{matpelId}/{siswaId}/{tahunId}/{semId}', [
        'as' => 'rapor-detail.update',
        'uses' => 'App\Http\Controllers\RaporDetailController@update',
    ]);

    Route::resource('nilai-siswa', NilaiSiswaController::class);
    Route::get('nilai-siswa/{matpelId}/{siswaId}', [
        'as' => 'nilai-siswa.destroy',
        'uses' => 'App\Http\Controllers\NilaiSiswaController@destroy',
    ]);
    Route::put('nilai-siswa/{matpelId}/{siswaId}', [
        'as' => 'nilai-siswa.update',
        'uses' => 'App\Http\Controllers\NilaiSiswaController@update',
    ]);
    Route::get('input-nilai', 'App\Http\Controllers\RaporController@input' )->name('input-nilai');
    
   
});

Route::group(['middleware' => ['auth','cekleveluser', 'sweetalert'], 'prefix' => 'user'], function(){
    Route::get('dashboard', 'App\Http\Controllers\DashboardUserController@index')->name('dashboard');
    Route::resource('password', UpdatePasswordController::class);
    Route::get('rapor', 'App\Http\Controllers\LihatRaporController@index')->name('rapor');
    Route::get('lihat-rapor', 'App\Http\Controllers\LihatRaporController@rapor')->name('lihat-rapor');
});


