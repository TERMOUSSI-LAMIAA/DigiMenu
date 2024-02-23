<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\providerController;

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
// Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});Route::middleware(['web'])->group(function () {
    Route::get('/auth/{provider}/redirect', [providerController::class, 'redirect']);
    Route::get('/auth/{provider}/callback', [providerController::class, 'callback']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified','role:Admin'])->group(function () {
   
    Route::get('/Users', [UserController::class, 'GetUsers'])->name('Users.GetUsers');
    Route::get('/operators', [UserController::class, 'GetOperators'])->name('operators.GetOperators');
    Route::post('/Users/{item}', [UserController::class, 'asignOperator'])->name('Users.asignOperator');
    Route::post('/Users/{item}', [UserController::class, 'deleteUser'])->name('Users.deleteUser');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
