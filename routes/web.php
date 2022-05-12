<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

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

// Route socialite
Route::get('sign-in-google', [UserController::class, 'google'])
        ->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleCallback'])
        ->name('user.google.callback');




Route::middleware(['auth'])->group(function () {

    // Checkout route
    Route::get('checkout/success}', [CheckoutController::class, 'success'])
            ->name('checkout.success')
            ->middleware('UserRole:user');

    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])
            ->name('checkout.create')
            ->middleware('UserRole:user');

    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])
            ->name('checkout.store')
            ->middleware('UserRole:user');

    // Dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('user.checkout.invoice');

    // User dashboard
    Route::prefix('user/dashboard')
            ->namespace('User')
            ->name('user.')
            ->middleware('UserRole:user')
            ->group(function () {
                Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
    });

    // Admin dashboard
    Route::prefix('admin/dashboard')
            ->namespace('Admin')
            ->name('admin.')
            ->middleware('UserRole:admin')
            ->group(function () {
                Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
    });

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';