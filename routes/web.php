<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('/dashboard/profile', [DashboardController::class, 'updateProfile'])->name('dashboard.profile.update');
    Route::get('/dashboard/address/create', [DashboardController::class, 'createAddress'])->name('dashboard.address.create');
    Route::post('/dashboard/address/store', [DashboardController::class, 'storeAddress'])->name('dashboard.address.store');
    Route::get('/dashboard/address/{address}/edit', [DashboardController::class, 'editAddress'])->name('dashboard.address.edit');
    Route::patch('/dashboard/address/{address}', [DashboardController::class, 'updateAddress'])->name('dashboard.address.update');



});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
