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

Route::get('/', 'BerandaController@index')->name('beranda.index');
Route::get('/mata-pelajaran/create', 'BerandaController@create')->name('mata-pelajaran.create');
Route::post('/mata-pelajaran/store', 'BerandaController@store')->name('mata-pelajaran.store');  

Route::group(['prefix' => 'pertemuan'], function () {
    Route::get('/{id}', 'PertemuanController@index')->name('pertemuan.index');
    Route::get('/{id}/create', 'PertemuanController@create')->name('pertemuan.create');
    Route::post('/{id}/store', 'PertemuanController@store')->name('pertemuan.store');
    Route::get('/{id}/show', 'PertemuanController@show')->name('pertemuan.show');

    Route::group(['prefix' => 'deskripsi'], function () {
        Route::get('/{id}/create', 'DeskripsiController@create')->name('deskripsi.create');
        Route::post('/{id}/store', 'DeskripsiController@store')->name('deskripsi.store');
    });
});

Route::group(['prefix' => 'panduan'], function () {
    Route::get('/', 'PanduanController@index')->name('panduan.index');
});

Route::group(['prefix' => 'tentang-kami'], function () {
    Route::get('/', 'TentangKamiController@index')->name('tentang-kami.index');
});

Route::group(['prefix' => 'kontak'], function () {
    Route::get('/', 'KontakController@index')->name('kontak.index');
    Route::post('/store', 'KontakController@store')->name('kontak.store');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


