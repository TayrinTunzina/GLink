<?php

use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DitemsController;

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

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/donors', [DonorsController::class, 'index'])->name('donors');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [DonorsController::class, 'logout'])->name('logout');

Route::post('/donors', [DonorsController::class, 'store'])->name('donation.store');

Route::get('/payment/{camp_id}/{user_id}', [PaymentController::class, 'index'])->name('payment');
// SSLCOMMERZ Start
Route::get('/payment', [SslCommerzPaymentController::class, 'payment']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::get('/ditems', [DitemsController::class, 'index'])->name('ditems');
Route::post('/handle-button-click', [DitemsController::class, 'handleButtonClick'])->name('handle.button.click');

Route::get('/mydonations', [DonorsController::class, 'mydonations'])->name('mydonations');
Route::get('/transactions', [DonorsController::class, 'transactions'])->name('transactions');
Route::get('/pets', [DonorsController::class, 'pets'])->name('pets');

Route::get('/itemDetails/{itemId}', [DonorsController::class, 'getItemDetails'])->name('itemDetails');
Route::get('/itemDetails/{donation_id}', [DonationController::class, 'getItemDetails2']);

