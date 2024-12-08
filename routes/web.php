<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\Dashboard\GejalaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\PenyakitController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('register', [RegisterController::class, 'register'])->name('register.process');
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'login'])->name('login.process');
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('diagnosa-penyakit', [DiagnoseController::class, 'index'])->name('diagnose.index');
    Route::post('diagnosa-penyakit/process', [DiagnoseController::class, 'diagnose'])->name('diagnose.process');

    Route::get('diagnosa-penyakit/hasil-diagnosa', [DiagnoseController::class, 'result'])->name('diagnose.result');
    Route::get('riwayat-diagnosa/{username}', [DiagnoseController::class, 'history'])->name('diagnose.history');
});

Route::group(['middleware' => ['canAccessDashboard'], 'prefix' => 'dashboard'], function() {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');
    
    Route::get('gejala', [DashboardController::class, 'gejala'])->name('dashboard.gejala');
    Route::get('tambah-gejala', [GejalaController::class, 'addGejala'])->name('add.gejala');
    Route::post('tambah-gejala/process', [GejalaController::class, 'createGejala'])->name('create.gejala');
    Route::get('edit-gejala/{gejalaId}', [GejalaController::class, 'editGejala'])->name('edit.gejala');
    Route::put('update-gejala/{gejalaId}', [GejalaController::class, 'updateGejala'])->name('update.gejala');
    Route::delete('delete-gejala/{gejalaId}', [GejalaController::class, 'deleteGejala'])->name('delete.gejala');
    
    Route::get('penyakit', [DashboardController::class, 'penyakit'])->name('dashboard.penyakit');
    Route::get('tambah-penyakit', [PenyakitController::class, 'addPenyakit'])->name('add.penyakit');
    Route::post('tambah-penyakit/process', [PenyakitController::class, 'createPenyakit'])->name('create.penyakit');
    Route::get('edit-penyakit/{penyakitId}', [PenyakitController::class, 'editPenyakit'])->name('edit.penyakit');
    Route::put('update-penyakit/{penyakitId}', [PenyakitController::class, 'updatePenyakit'])->name('update.penyakit');
    Route::delete('delete-penyakit/{penyakitId}', [PenyakitController::class, 'deletePenyakit'])->name('delete.penyakit');

    Route::get('tambah-solusi-penyakit/{penyakitId}', [PenyakitController::class, 'addPenyakitSolution'])->name('add.penyakit.solution');
    Route::post('tambah-solusi-penyakit/{penyakitId}/proses', [PenyakitController::class, 'addPenyakitSolutionProcess'])->name('add.penyakit.solution.process');

    Route::get('pengguna', [DashboardController::class, 'pengguna'])->name('dashboard.pengguna');
    Route::delete('delete-pengguna/{userId}', [UserController::class, 'deleteUser'])->name('delete.user');
});