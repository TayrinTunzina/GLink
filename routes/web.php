<?php


use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorsController;
use App\Http\Controllers\PaymentController;
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

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/donors', [DonorsController::class, 'index'])->name('donors');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [DonorsController::class, 'logout'])->name('logout');

// SSLCOMMERZ Start

//Route::get('/payment/{camp_id}/{user_id}', [SslCommerzPaymentController::class, 'payment'])->name('payment');
Route::get('/payment', [SslCommerzPaymentController::class, 'payment']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

// Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


// Route::get('/payment/{camp_id}', function ($camp_id) {
//     $campaign = App\Models\Campaign::find($camp_id);
//     return view('payment', ['campaign' => $campaign]);
// })->name('payment');

//Route::get('/payment/camp_id={camp_id}/user_id={user_id}', [PaymentController::class, 'index'])->name('payment');
Route::get('/payment/{camp_id}/{user_id}', [PaymentController::class, 'index'])->name('payment');
