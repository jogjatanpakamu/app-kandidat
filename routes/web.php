<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

#auth
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('candidate')->middleware('auth');
Route::get('new-candidate', [HomeController::class, 'create'])->name('candidate.new');
Route::post('candidate', [HomeController::class, 'store'])->name('candidate.store');


Route::get('candidate/{id}', [HomeController::class, 'show'])->name('candidate.show');
Route::get('candidate/{id}/edit', [HomeController::class, 'edit'])->name('candidate.edit');
Route::post('candidate/update/{id}', [HomeController::class, 'update'])->name('candidate.update');
Route::delete('candidate/{id}', [HomeController::class, 'destroy'])->name('candidate.destroy');
