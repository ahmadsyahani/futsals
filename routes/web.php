<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RiwayatController;
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
    return view('home');
})->name('home');

Route::get('/regis', [AuthController::class, 'regisView'])->name('regis.view');
Route::post('/regis', [AuthController::class, 'regis'])->name('regis.post');

Route::get('/login', [AuthController::class, 'loginView'])->name('login.view');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::get('/booking/checkout', [BookingController::class, 'checkout'])->name('booking.checkout');
Route::post('/booking/checkout', [BookingController::class, 'booking']);

Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
