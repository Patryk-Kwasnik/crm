<?php

use Illuminate\Support\Facades\Route;

Route::get('/changeLanguage', [LanguageController::class, 'change'])->name('session.change.language');

Route::view('/about', 'about')->name('about');

Route::view('/order-realisation', 'order-realisation')->name('order-realisation');

require __DIR__ . '/user-auth.php';
require __DIR__ . '/admin-auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
