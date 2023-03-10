<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::post('/logout', [LoginController::class, 'logout']);


route::get('/dashboard', [DashboardController::class, 'tampil'])->middleware(['auth','verified']);
route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit'])->middleware(['auth','verified']);
route::put('/dashboard/{id}', [DashboardController::class, 'update'])->middleware(['auth','verified']);
route::delete('/dashboard/{id}', [DashboardController::class, 'delete'])->middleware(['auth','verified']);

route::get('/pendataan', [BarangController::class, 'index'])->middleware(['auth','verified']);
// route::get('/pendataan/create', [BarangController::class, 'create'])->middleware(['auth','verified']);
route::post('/pendataan/store', [BarangController::class, 'store'])->middleware(['auth','verified']);



require __DIR__.'/auth.php';
