<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/changeLanguage', [LanguageController::class, 'change'])->name('session.change.language');


Route::get('/images/images_ajax', [ImageController::class, 'index'])->name('images.index');
Route::post('/images/upload', [ImageController::class, 'store'])->name('images.store');
Route::patch('/images/{id}/rotate', [ImageController::class, 'rotate']);
Route::post('/images/{id}/crop', [ImageController::class, 'crop']);
Route::delete('/images/{id}/delete', [ImageController::class, 'delete']);

require __DIR__ . '/user-auth.php';
require __DIR__ . '/admin-auth.php';
require __DIR__ . '/api.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
