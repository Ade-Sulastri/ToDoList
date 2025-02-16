<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\TaskController;
use App\Http\Controllers\user\auth\AuthController;

Route::middleware('guest')->group(function () {
  Route::get('/registrasi', [AuthController::class, 'showRegistration'])->name('showRegistration');
  Route::post('/registrasi/submit', [AuthController::class, 'submitRegistration'])->name('submitRegistration');

  Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
  Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('submitLogin');

  Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('redirectToGoogle');
  Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('handleGoogleCallback');
});


// EnsureUserIsAuthenticated merupakan middleware custom untuk mengecek apakah user sudah login atau belum
Route::middleware(['isAuth'])->group(function () {
  Route::get('/', [TaskController::class, 'showTasks'])->name('showTasks');
  Route::get('/add_task', [TaskController::class, 'addTask'])->name('addTask');
  Route::post('/add_task', [TaskController::class, 'saveTask'])->name('saveTask');
  Route::get('/edit_task/{id}', [TaskController::class, 'editTask'])->name('editTask');
  Route::post('/edit_task/{id}', [TaskController::class, 'updateTask'])->name('updateTask');
  Route::post('/delete_task/{id}', [TaskController::class, 'deleteTask'])->name('deleteTask');

  // sort by date
  Route::get('/sort-task-asc', [TaskController::class, 'orderTasksByDate'])->name('orderTasksByDate');
  Route::get('/sort-task-desc', [TaskController::class, 
  'orderTaskByDateDesc'])->name('orderTaskByDateDesc');
  
  // sort by priority
  Route::get('/sort-task-priority', [TaskController::class, 
  'orderTaskByPriority'])->name('orderTaskByPriority');

  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Authentication
require __DIR__.'/admin-auth.php';