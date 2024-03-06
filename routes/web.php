<?php

use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\SocialliteController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();


// google
Route::get('login/google/redirect', [SocialliteController::class, 'redirect'])
    ->middleware(['guest'])
    ->name('redirect');
// Untuk callback dari Google
Route::get('login/google/callback', [SocialliteController::class, 'callback'])
    ->middleware(['guest'])
    ->name('callback');

Route::get('payment/success', [CheckoutController::class, 'midtransCallback']);
Route::post('payment/success', [CheckoutController::class, 'midtransCallback']);

// Admin
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('checkout.invoice');
    // Password
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [UserController::class, 'updatePassword'])->name('update-password');
    // Profile
    Route::get('/change-profile', [UserController::class, 'changeProfile'])->name('change-profile');
    Route::patch('/change-profile/{id}', [UserController::class, 'updateProfile'])->name('update-profile');

    // Transaction
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction.index');
    // setpaid transaction
    Route::post('/transactions/{checkout}', [TransactionController::class, 'update'])->name('admin.checkout.update');
    // Discount
    Route::resource('discounts', DiscountController::class);
    // Resource
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
// Route::group(['middleware' => ['role:Superadmin|Admin'], 'prefix' => 'Admin' , 'as' => 'admin.'], function () {
// Route::group(['prefix' => 'car-type', 'as' => 'car-type.'], function () {
//     /* beberapa route di dalam group */
// });
// });
