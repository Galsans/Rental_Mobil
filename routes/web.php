<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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



Route::get('/', [ComponentController::class, 'welcome'])->name('welcome');
Route::post('/message', [ComponentController::class, 'message'])->name('message.store');
Auth::routes();

Route::middleware('auth')->prefix('dash')->group(function () {

    // Component
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // Page Awal Dashboard
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit'); // Page Profile
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update'); // Edit Profile

    // RouteUser
    Route::middleware('user')->prefix('user')->group(function () {
        // Sidebar Kendaraan Role User
        Route::get('/kendaraan', [BookingController::class, 'index'])->name('booking.index');
        Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
        Route::get('/booking/{kendaraan_id}', [BookingController::class, 'create'])->name('booking.create');

        // Sidebar Booking Role User
        Route::get('/book', [BookingController::class, 'book'])->name('booking.book');
        Route::get('/boking/${id}', [BookingController::class, 'show'])->name('booking.show');
        Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
        Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
        Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
    });

    // RouteAdmin
    Route::middleware('admin')->prefix('admin')->group(function () {
        // Sidebar User or Pegawai Role Admin
        Route::get('/pegawai', [UserController::class, 'pegawai'])->name('admin.user.pegawai');
        Route::get('/create', [UserController::class, 'create'])->name('admin.create.index');
        Route::post('/store', [UserController::class, 'store'])->name('admin.store.index');
        // Route::get('/user', [UserController::class, 'user'])->name('admin.user.index');

        // Sidebar Category
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/edit/${id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/update/${id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/destroy/${id}', [CategoryController::class, 'destroy'])->name('category.destroy');

        // Sidebar Kendaraan
        Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
        Route::get('/kendaraan/show/${id}', [KendaraanController::class, 'show'])->name('kendaraan.show');
        Route::get('/kendaraan/create', [KendaraanController::class, 'create'])->name('kendaraan.create');
        Route::post('/kendaraan/store', [KendaraanController::class, 'store'])->name('kendaraan.store');
        Route::get('/kendaraan/edit/${id}', [KendaraanController::class, 'edit'])->name('kendaraan.edit');
        Route::put('/kendaraan/update/${id}', [KendaraanController::class, 'update'])->name('kendaraan.update');
        Route::delete('/kendaraan/destroy/${id}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy');
    });

    // ADMIN DAN PEGAWAI BISA MELIHAT
    Route::middleware('pegawai')->group(function () {
        // Sidebar Booking
        Route::get('/booking', [ComponentController::class, 'bookingAdmin'])->name('admin.booking.index');
        Route::get('/booking/${id}', [ComponentController::class, 'show'])->name('admin.booking.show');
        Route::put('/booking/confirm/${id}', [ComponentController::class, 'confirm'])->name('admin.booking.confirm');
        Route::put('/booking/batal/${id}', [ComponentController::class, 'batal'])->name('admin.booking.batal');
        Route::delete('/booking/delete/${id}', [ComponentController::class, 'destroy'])->name('admin.booking.destroy');

        // Chat
        Route::get('/chat', [ComponentController::class, 'chat'])->name('chat.index');
        Route::delete('/chat-destroy/${id}', [ComponentController::class, 'chat_destroy'])->name('chat.destroy');
    });
});
