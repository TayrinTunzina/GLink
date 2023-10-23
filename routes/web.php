<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorsController;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/donors', [DonorsController::class, 'index'])->name('donors');

Route::post('/admin', [LoginController::class, 'login'])->name('admin.auth');
Route::post('/login', [LoginController::class, 'login'])->name('donors.auth');

// Redirect users to the donor dashboard.
Route::get('/donors', [DonorDashboardController::class, 'index'])->middleware('auth', 'role:donor');

// Redirect users to the admin dashboard.
Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware('auth', 'role:admin');
