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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::middleware('role:admin')->get('/dashboard', function(){
//     return 'Dashboard';
// })->name('dashboard');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', 'DashboardController@index');
});

Route::group(['middleware' => ['role:admin|user']], function(){
    Route::get('/pasien', 'PasienController@index');
    Route::get('/persalinan', 'PersalinanController@index');
    Route::get('/imunisasi', 'ImunisasiController@index');
    Route::get('/kb', 'KbController@index');
    Route::get('/test','KbController@relation');
    Route::get('/pemeriksaan','PeriksaController@index');
});
    

