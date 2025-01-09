<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\auth\LoginAdminController;

Route::prefix('/admin')->middleware(['guest:admin'])->group(function () {
  Route::get('/login', [LoginAdminController::class, 'login'])->name('login');
  Route::post('/login/submit', [LoginAdminController::class, 'submit'])->name('submit');
});

Route::prefix('/dashboard')->middleware('auth:admin')->group(function () {
  Route::get('/', [DashboardController::class, 'showDashboard'])->name('showDashboard');
  Route::get('/users', [DashboardController::class, 'showTabelUser'])->name('showTabelUser');
  Route::post('/delete_user/{id}', [DashboardController::class, 'deleteUser'])->name('deleteUser');
  Route::post('/logout', [LoginAdminController::class, 'logout'])->name('logoutAdmin');
});

