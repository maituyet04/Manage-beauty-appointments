<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;

// Định nghĩa route mặc định để chuyển hướng tới danh sách dịch vụ hoặc trang chủ
//Route::get('/', function () {
    //return redirect()->route('services.index'); // Chuyển hướng đến danh sách dịch vụ
//});

Route::get('/', [ServiceController::class, 'index']);
// Các route quản lý dịch vụ
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');

// Các route quản lý lịch hẹn
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
