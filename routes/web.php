<?php

use App\Http\Controllers\{ProfileController, CategoriesController, SubscribeController};
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

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

Route::get('/', function () { return view('welcome'); });

Route::get('/dash', function () { return view('dash');})->name('dash');
Route::get('/courses', [CategoriesController::class, 'categories'])->name('categories');
Route::get('/courses/{id}', [CategoriesController::class, 'courses'])->name('course');
Route::get('courses/lesson/{id}', [CategoriesController::class, 'lessons'])->name('lesson');
/* Route::get('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe'); */
Route::get('subscribe', function (Request $request) {
    
    /* $user = auth()->user(); */
    /* $user = User::where('email', 'oscar@gmail.com')->first();
    Auth::login($user); */
    $user = auth()->user();

    $payLink = $user->newSubscription('default', $month = 42335)
        ->returnTo(route('dash'))
        ->create();

    $payLinkSix = $user->newSubscription('default', $six = 42336)
        ->returnTo(route('dash'))
        ->create();    
 
    return view('subscribe', compact('payLink','payLinkSix'));
});

Route::get('log', function (Request $request) {
    
    /* $user = auth()->user(); */
    $user = User::where('email', 'oscar@gmail.com')->first();
    Auth::login($user); 
    
    return 'logged in';
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
