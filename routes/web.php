<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;

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
Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/donation', [DonationController::class, 'index'])->name('donation.index');
Route::get('/edit/{id}', [CampaignController::class, 'edit'])->name('campaigns.edit');
Route::get('/donationEdit/{id}', [DonationController::class, 'edit'])->name('donation.edit');


Route::delete('/campaigns/{id}', [CampaignController::class, 'destroy'])->name('campaigns.destroy');
Route::delete('/donation/{id}', [DonationController::class, 'destroy'])->name('donation.destroy');



Route::post('/submit-campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [DonorsController::class, 'logout'])->name('logout');


Route::put('/campaigns/{id}', [CampaignController::class, 'update'])->name('campaigns.update');
Route::put('/donation/{id}', [DonationController::class, 'update'])->name('donation.update');



