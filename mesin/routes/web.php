<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\PegawaiController;

// Middleware
$middleware = ['auth'];

// Grouping
Route::middleware($middleware)->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/data-agama', 'AgamaController@index')->name('data-agama');
    Route::get('/data-jenispegawai', 'JenisPegawaiController@index')->name('data-jenispegawai');
    Route::get('/data-statuspegawai', 'StatusPegawaiController@index')->name('data-statuspegawai');
    Route::get('/data-pendidikan', 'PendidikanController@index')->name('data-pendidikan');
    Route::get('/data-jeniskelamin', 'JenisKelaminController@index')->name('data-jeniskelamin');
    Route::get('/data-pegawai', 'PegawaiController@index')->name('data-pegawai');
    
    // AgamaController
    Route::get('/agama', 'AgamaController@index')->name('agama.index');
    Route::get('/agamacreate', 'AgamaController@create')->name('agama.create');
    Route::post('/agama', 'AgamaController@store')->name('agama.store');
    Route::get('/agama/{id}/edit', 'AgamaController@edit')->name('agama.edit');
    Route::put('/agama/{id}', 'AgamaController@update')->name('agama.update');
    Route::delete('/agama/{id}', 'AgamaController@destroy')->name('agama.destroy');
    
    // JenisPegawaiController
    Route::get('/jenispegawai', 'JenisPegawaiController@index')->name('jenispegawai.index');
    Route::get('/jenispegawaicreate', 'JenisPegawaiController@create')->name('jenispegawai.create');
    Route::post('/jenispegawai', 'JenisPegawaiController@store')->name('jenispegawai.store');
    Route::get('/jenispegawai/{id}/edit', 'JenisPegawaiController@edit')->name('jenispegawai.edit');
    Route::put('/jenispegawai/{id}', 'JenisPegawaiController@update')->name('jenispegawai.update');
    Route::delete('/jenispegawai/{id}', 'JenisPegawaiController@destroy')->name('jenispegawai.destroy');
    
    // StatusPegawaiController
    Route::get('/statuspegawai', 'StatusPegawaiController@index')->name('statuspegawai.index');
    Route::get('/statuspegawaicreate', 'StatusPegawaiController@create')->name('statuspegawai.create');
    Route::post('/statuspegawai', 'StatusPegawaiController@store')->name('statuspegawai.store');
    Route::get('/statuspegawai/{id}/edit', 'StatusPegawaiController@edit')->name('statuspegawai.edit');
    Route::put('/statuspegawai/{id}', 'StatusPegawaiController@update')->name('statuspegawai.update');
    Route::delete('/statuspegawai/{id}', 'StatusPegawaiController@destroy')->name('statuspegawai.destroy');
    
    // PendidikanController
    Route::get('/pendidikan', 'PendidikanController@index')->name('pendidikan.index');
    Route::get('/pendidikancreate', 'PendidikanController@create')->name('pendidikan.create');
    Route::post('/pendidikan', 'PendidikanController@store')->name('pendidikan.store');
    Route::get('/pendidikan/{id}/edit', 'PendidikanController@edit')->name('pendidikan.edit');
    Route::put('/pendidikan/{id}', 'PendidikanController@update')->name('pendidikan.update');
    Route::delete('/pendidikan/{id}', 'PendidikanController@destroy')->name('pendidikan.destroy');
    
    // JenisKelaminController
    Route::get('/jeniskelamin', 'JenisKelaminController@index')->name('jeniskelamin.index');
    Route::get('/jeniskelamincreate', 'JenisKelaminController@create')->name('jeniskelamin.create');
    Route::post('/jeniskelamin', 'JenisKelaminController@store')->name('jeniskelamin.store');
    Route::get('/jeniskelamin/{id}/edit', 'JenisKelaminController@edit')->name('jeniskelamin.edit');
    Route::put('/jeniskelamin/{id}', 'JenisKelaminController@update')->name('jeniskelamin.update');
    Route::delete('/jeniskelamin/{id}', 'JenisKelaminController@destroy')->name('jeniskelamin.destroy');
    
    // PegawaiController
    Route::get('/pegawai', 'PegawaiController@index')->name('pegawai.index');
    Route::get('/pegawaicreate', 'PegawaiController@create')->name('pegawai.create');
    Route::post('/pegawai', 'PegawaiController@store')->name('pegawai.store');
    Route::get('/pegawai/{id}/edit', 'PegawaiController@edit')->name('pegawai.edit');
    Route::post('/pegawai/{id}', 'PegawaiController@update')->name('pegawai.update');
    Route::delete('/pegawai/{id}', 'PegawaiController@destroy')->name('pegawai.destroy');
    
    // Lainnya
    Route::post('/logout', 'AuthController@logout')->name('logout');
});

Route::get('/register', 'AuthController@showRegisterForm')->name('register.form');
Route::post('/register', 'AuthController@register')->name('register');
Route::get('/login', 'AuthController@showLoginForm')->name('login.form');
Route::post('/login', 'AuthController@login')->name('login');