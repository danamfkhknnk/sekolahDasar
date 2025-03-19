<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class , 'login'])->name('login');
Route::post('/login', [UserController::class , 'aksilogin']);
Route::get('/logout', [UserController::class , 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class , 'dashboard'])->name('dashboard');


    Route::get('/admin/kelas', [KelasController::class , 'index'])->name('kelas');
    Route::post('/admin/kelas/add', [KelasController::class , 'store'])->name('kelas.store');


    Route::get('/admin/guru', [GuruController::class , 'index'])->name('guru');
    Route::post('admin/guru/add', [GuruController::class, 'store'])->name('guru.store');
    Route::post('admin/guru/{id}/update', [GuruController::class, 'update'])->name('guru.update');
    Route::get('/admin/guru/{id}/delete', [GuruController::class, 'delete'])->name('guru.delete');

});