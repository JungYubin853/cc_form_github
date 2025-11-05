<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Show the contact form page
Route::get('/', function () {
    return view('welcome');
});

// Handle form submission (POST)
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
