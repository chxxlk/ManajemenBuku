<?php

use App\Http\Controllers\Admins\DashboardController as AdminsDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Admins\BooksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'create'])->name('user_login');

Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'create'])->name('users_register');

Route::get('auth/logout', [LoginController::class, 'destroy'])->name('logout');

Route::middleware('role:user')->group(function() {
    Route::get('/users/dashboard', [DashboardController::class, 'index'])->name('users_dashboard');
});
Route::middleware('role:admin')->group(function() {
    Route::get('/admins/dashboard', [AdminsDashboardController::class, 'index'])->name('admins_dashboard');
    Route::resource('/admins/books', BooksController::class);
});
