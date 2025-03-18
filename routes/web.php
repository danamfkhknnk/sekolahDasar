<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class , 'login'])->name('login');
Route::post('/login', [UserController::class , 'aksilogin']);