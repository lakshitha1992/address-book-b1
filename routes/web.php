<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Contact Routes
Route::get('/contact/create', function () {
    return view('contact.create');
})->name('contact.create');

// Remove duplicate store route and keep one for storing contacts
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// Search contact by name
Route::get('/search-contact/{name}', [ContactController::class, 'search']);