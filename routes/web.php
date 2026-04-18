<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/pengaduan', [DashboardController::class, 'storePengaduan'])->name('pengaduan.store');
    Route::patch('/pengaduan/{pengaduan}/status', [DashboardController::class, 'updateStatus'])->name('pengaduan.status');
    Route::patch('/pengaduan/{pengaduan}/feedback', [DashboardController::class, 'updateFeedback'])->name('pengaduan.feedback');
    Route::delete('/pengaduan/{pengaduan}', [DashboardController::class, 'destroy'])->name('pengaduan.destroy');
});
