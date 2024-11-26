<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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


Route::middleware('role:user')->group(function() {
    Route::get('/users/dashboard', function () {
        return view('users.dashboard');
    })->name('users.dashboard');
});
Route::middleware('role:admin')->group(function() {
    Route::get('/admins/dashboard', function() {
        return view('admins.dashboard');
    })->name('admin.dashboard');
});
