<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\JenisPegawaiController;
use App\Http\Controllers\StatusPegawaiController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\JenisKelaminController;
use App\Http\Controllers\PegawaiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/agama', [AgamaController::class, 'indexapi']);
Route::get('/agama/{id}', [AgamaController::class, 'showapi']);
Route::post('/agama', [AgamaController::class, 'storeapi']);
Route::put('/agama/{id}', [AgamaController::class, 'updateapi']);
Route::delete('/agama/{id}', [AgamaController::class, 'destroyapi']);

Route::get('/jenispegawai', [JenisPegawaiController::class, 'indexapi']);
Route::get('/jenispegawai/{id}', [JenisPegawaiController::class, 'showapi']);
Route::post('/jenispegawai', [JenisPegawaiController::class, 'storeapi']);
Route::put('/jenispegawai/{id}', [JenisPegawaiController::class, 'updateapi']);
Route::delete('/jenispegawai/{id}', [JenisPegawaiController::class, 'destroyapi']);

Route::get('/statuspegawai', [StatusPegawaiController::class, 'indexapi']);
Route::get('/statuspegawai/{id}', [StatusPegawaiController::class, 'showapi']);
Route::post('/statuspegawai', [StatusPegawaiController::class, 'storeapi']);
Route::put('/statuspegawai/{id}', [StatusPegawaiController::class, 'updateapi']);
Route::delete('/statuspegawai/{id}', [StatusPegawaiController::class, 'destroyapi']);

Route::get('/pendidikan', [PendidikanController::class, 'indexapi']);
Route::get('/pendidikan/{id}', [PendidikanController::class, 'showapi']);
Route::post('/pendidikan', [PendidikanController::class, 'storeapi']);
Route::put('/pendidikan/{id}', [PendidikanController::class, 'updateapi']);
Route::delete('/pendidikan/{id}', [PendidikanController::class, 'destroyapi']);

Route::get('/jeniskelamin', [JenisKelaminController::class, 'indexapi']);
Route::get('/jeniskelamin/{id}', [JenisKelaminController::class, 'showapi']);
Route::post('/jeniskelamin', [JenisKelaminController::class, 'storeapi']);
Route::put('/jeniskelamin/{id}', [JenisKelaminController::class, 'updateapi']);
Route::delete('/jeniskelamin/{id}', [JenisKelaminController::class, 'destroyapi']);

Route::get('/pegawai', [PegawaiController::class, 'indexapi']);
Route::get('/pegawai/{id}', [PegawaiController::class, 'showapi']);
Route::post('/pegawai', [PegawaiController::class, 'storeapi']);
Route::put('/pegawai/{id}', [PegawaiController::class, 'updateapi']);
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroyapi']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
