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

    Route::post('/{id}/daftar-hadir', 'PertemuanController@daftarHadir')->name('pertemuan.daftarHadir');

    Route::group(['prefix' => 'deskripsi'], function () {
        Route::get('/{id}/create', 'DeskripsiController@create')->name('deskripsi.create');
        Route::post('/{id}/store', 'DeskripsiController@store')->name('deskripsi.store');
        Route::get('/{id}/softDestroy', 'DeskripsiController@softDestroy')->name('deskripsi.softDestroy');
    });

    Route::group(['prefix' => 'link-video'], function () {
        Route::get('/{id}/create', 'LinkVideoController@create')->name('linkVideo.create');
        Route::post('/{id}/store', 'LinkVideoController@store')->name('linkVideo.store');
        Route::get('/{id}/softDestroy', 'LinkVideoController@softDestroy')->name('linkVideo.softDestroy');
    });

    Route::group(['prefix' => 'dokumen'], function () {
        Route::get('/{id}/create', 'PertemuanController@dokumenCreate')->name('dokumen.create');
        Route::post('/{id}/store', 'PertemuanController@dokumenStore')->name('dokumen.store');
        
    });

    Route::group(['prefix' => 'link-kuis'], function () {
        Route::get('/{id}/create', 'LinkKuisController@create')->name('linkKuis.create');
        Route::post('/{id}/store', 'LinkKuisController@store')->name('linkKuis.store');
        Route::get('/{id}/destroy', 'LinkKuisController@destroy')->name('linkKuis.destroy');
        
    });


    Route::group(['prefix' => 'komentar'], function () {
        Route::get('/{id}/create', 'PertemuanController@komentarCreate')->name('komentar.create');
        Route::post('/{id}/store', 'PertemuanController@komentarStore')->name('komentar.store');
        Route::get('/{id}/destroy', 'PertemuanController@komentarDestroy')->name('komentar.destroy');
    });

    Route::group(['prefix' => 'balasan'], function () {
        Route::get('/{id}/create', 'PertemuanController@balasanCreate')->name('balasan.create');
        Route::post('/{id}/store', 'PertemuanController@balasanStore')->name('balasan.store');
        Route::get('/{id}/destroy', 'PertemuanController@balasanDestroy')->name('balasan.destroy');
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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'KontakController@index')->name('kontak.index');
    
    
});


