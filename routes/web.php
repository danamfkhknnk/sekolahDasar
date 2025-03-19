<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RuangkelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class , 'login'])->name('login');
Route::post('/login', [UserController::class , 'aksilogin']);
Route::post('/register', [UserController::class , 'aksiregis'])->name('aksiregis');
Route::get('/register', [UserController::class , 'regis'])->name('register');
Route::get('/logout', [UserController::class , 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class , 'dashboard'])->name('dashboard');

    Route::get('/admin/kelas/{id}', [KelasController::class , 'index'])->name('kelas');
    Route::post('/admin/kelas/add', [KelasController::class , 'store'])->name('kelas.store');
    Route::post('/admin/kelas/{id}/update', [KelasController::class, 'update'])->name('kelas.update');
    Route::get('/admin/kelas/{id}/delete', [KelasController::class, 'delete'])->name('kelas.delete');
    Route::post('/admin/kelas/{id}/updatewali', [KelasController::class, 'updatewali'])->name('wali.update');
    Route::post('/admin/kelas/{id}/updateketua', [KelasController::class, 'updateketua'])->name('ketua.update');
    Route::post('/admin/kelas/{id}/gurukelas', [RuangkelasController::class, 'storeguru'])->name('store.gurukelas');
    Route::post('/admin/kelas/{id}/siswakelas', [RuangkelasController::class, 'storesiswa'])->name('store.siswakelas');
    Route::get('/admin/kelas/{id}/deleteguru', [RuangkelasController::class, 'deleteguru'])->name('delete.gurukelas');
    Route::get('/admin/kelas/{id}/deletesiswa', [RuangkelasController::class, 'deletesiswa'])->name('delete.siswakelas');
    
    Route::get('/admin/guru', [GuruController::class , 'index'])->name('guru');
    Route::post('admin/guru/add', [GuruController::class, 'store'])->name('guru.store');
    Route::post('admin/guru/{id}/update', [GuruController::class, 'update'])->name('guru.update');
    Route::get('/admin/guru/{id}/delete', [GuruController::class, 'delete'])->name('guru.delete');

    Route::get('/admin/siswa', [SiswaController::class , 'index'])->name('siswa');
    Route::post('admin/siswa/add', [SiswaController::class, 'store'])->name('siswa.store');
    Route::post('admin/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::get('/admin/siswa/{id}/delete', [SiswaController::class, 'delete'])->name('siswa.delete');

});