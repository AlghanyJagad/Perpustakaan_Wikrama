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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@show');
/*
Route::get('/user', 'UserController@index');
Route::get('/user-register', 'UserController@create');
Route::post('/user-register', 'UserController@store');
Route::get('/user-edit/{id}', 'UserController@edit');
*/
Route::resource('user', 'UserController');

Route::resource('anggota', 'AnggotaController');

Route::resource('buku', 'BukuController');

Route::post('transaksi/hilang/{id}', 'TransaksiController@hilang')->name('transaksi.hilang');
Route::get('transaksi/hilang/{id}', 'TransaksiController@hilang');

Route::post('transaksi/rusak/{id}', 'TransaksiController@rusak')->name('transaksi.rusak');
Route::get('transaksi/rusak/{id}', 'TransaksiController@rusak');

Route::post('transaksi/diganti/{id}', 'TransaksiController@diganti')->name('transaksi.diganti');
Route::get('transaksi/diganti/{id}', 'TransaksiController@diganti');
Route::resource('transaksi', 'TransaksiController');

Route::get('/laporan/trs', 'LaporanController@transaksi');
Route::get('/laporan/trs/pdf', 'LaporanController@transaksiPdf');
Route::get('/laporan/trs/excel', 'LaporanController@transaksiExcel');

Route::get('/laporan/buku', 'LaporanController@buku');
Route::get('/laporan/buku/pdf', 'LaporanController@bukuPdf');
Route::get('/laporan/buku/excel', 'LaporanController@bukuExcel');

