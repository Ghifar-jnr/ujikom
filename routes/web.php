<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ReimbursementController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/login', [AuthController::class, 'showLogin']);

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    Route::get('/daftar', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/daftar', [AuthController::class, 'register'])
        ->name('register.process');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])
    ->name('dashboard');

    Route::resource('master', KaryawanController::class);

    Route::get('/transaksi', function () {
        return view('transaksi.index');
    })->name('transaksi.index');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::get('/master', [KaryawanController::class, 'index'])
    ->name('master.index');

Route::get('/master/create', [KaryawanController::class, 'create'])
    ->name('master.create');

Route::post('/master', [KaryawanController::class, 'store'])
    ->name('master.store');

Route::get('/master/{master}/edit', [KaryawanController::class, 'edit'])
    ->name('master.edit');

Route::put('/master/{master}', [KaryawanController::class, 'update'])
    ->name('master.update');

Route::delete('/master/{master}', [KaryawanController::class, 'destroy'])
    ->name('master.destroy');

Route::get('/transaksi', [
    ReimbursementController::class,
    'index'
])->name('transaksi.index');

Route::get('/transaksi/create', [
    ReimbursementController::class,
    'create'
])->name('transaksi.create');

Route::post('/transaksi', [
    ReimbursementController::class,
    'store'
])->name('transaksi.store');

Route::get('/transaksi/{reimbursement}/edit', [
    ReimbursementController::class, 'edit'
])->name('transaksi.edit');

Route::put('/transaksi/{reimbursement}', [
    ReimbursementController::class, 'update'
])->name('transaksi.update');

Route::delete('/transaksi/{reimbursement}', [
    ReimbursementController::class, 'destroy'
])->name('transaksi.destroy');

Route::put('/user/{user}/password', [UserController::class, 'resetPassword'])
    ->name('user.reset-password');