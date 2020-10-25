<?php

use Illuminate\Support\Facades\Crypt;
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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::middleware('role:admin')->get('/dashboard', function(){
//     return 'Dashboard';
// })->name('dashboard');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/jumlah', 'DashboardController@laporan');
    Route::get('/users','UsersController@index');
    Route::post('/users/store','UsersController@store');
});

Route::group(['middleware' => ['role:admin|user']], function(){
    Route::get('/', 'PasienController@index');
    Route::get('/pasien', 'PasienController@index');
    Route::get('/persalinan', 'PersalinanController@index');
    Route::get('/imunisasi', 'ImunisasiController@index');
    Route::get('/kb', 'KbController@index');
    Route::get('/pemeriksaan','PeriksaController@index');
    Route::get('/pasien/{id}','PasienController@detail');
    Route::post('/pasien/edit', 'PasienController@edit');
    Route::get('account/password','AccountController@password')->name('password.edit');
    Route::patch('account/password','AccountController@update')->name('password.edit');
    Route::post('/pasien/notification', 'PasienController@notification');
    Route::get('/printkb','KbController@print');
});
    

