<?php

use App\Http\Controllers\{ProfileController, CategoriesController, SubscribeController};
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/', function () { return view('jahari.home'); })->name('home');
Route::get('/contact', function () { return view('jahari.contact'); })->name('contact');
Route::get('/gallery', function () { return view('jahari.gallery'); })->name('gallery');

Route::get('/dash', function () { return view('dash');})->name('dash');
Route::get('/courses', [CategoriesController::class, 'categories'])->name('categories');
Route::get('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');

Route::middleware('subscribed')->group(function () {
    Route::get('/courses/{id}', [CategoriesController::class, 'courses'])->name('course');
    Route::get('courses/lesson/{id}', [CategoriesController::class, 'lessons'])->name('lesson');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
