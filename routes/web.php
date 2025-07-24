<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('contacts/trashed', [ContactController::class, 'deletedContacts'])->name('contact.trashed');
    Route::post('contacts/{contact}/toggle-favorite', [ContactController::class, 'toggleFavorite'])->name('contacts.toggleFavorite');
    Route::post('contacts/{contact}/restore', [ContactController::class, 'restore'])->name('contacts.restore');
    Route::post('contacts/{contact}/force-delete', [ContactController::class, 'forceDelete'])->name('contacts.forceDelete');
    Route::post('contacts/empty-trash', [ContactController::class, 'emptyTrash'])->name('contacts.emptyTrash');
    Route::resource('contacts', ContactController::class);
    Route::resource('categories', CategoryController::class);

});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('loginForm');
    Route::get('/register', function () {
        return view('auth.register');
    })->name('registerForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});
