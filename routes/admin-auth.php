<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\auth\LoginAdminController;
use App\Http\Controllers\user\TaskController;

Route::prefix('/admin')->middleware(['guest:admin'])->group(function () {
  Route::get('/login', [LoginAdminController::class, 'login'])->name('login');
  Route::post('/login/submit', [LoginAdminController::class, 'submit'])->name('submit');
});

Route::prefix('/dashboard')->middleware('auth:admin')->group(function () {
  Route::get('/', [DashboardController::class, 'showDashboard'])->name('showDashboard');
  Route::get('/users', [DashboardController::class, 'showTabelUser'])->name('showTabelUser');
  Route::get('/tasks', [DashboardController::class, 'showTabelTugas'])->name('showTabelTugas');
  Route::post('/delete_user/{id}', [DashboardController::class, 'deleteUser'])->name('deleteUser');

  // ekspor pdf
  Route::get('/download-pdf', [TaskController::class, 'exportPDF'])->name('exportPDF');
  Route::get('/view-pdf', [TaskController::class, 'viewPDF'])->name('viewPDF');

  // ekspor csv
  Route::get('download-csv', [TaskController::class, 'exportCSV'])->name('exportCSV');

  // ekspor xml
  Route::get('download-xml', [TaskController::class, 'exportXML'])->name('exportXML');


  Route::post('/logout', [LoginAdminController::class, 'logout'])->name('logoutAdmin');
});

