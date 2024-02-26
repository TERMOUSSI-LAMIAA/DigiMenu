<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\abonnementController;
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

Route::middleware(['auth', 'verified','role:operator'])->group(function () {
    Route::get('/dashboard_oper', function () {
        return view('dashboard_oper');
    })->name('dashboard_oper');
    
   
});

Route::middleware(['auth', 'verified','role:owner'])->group(function () {
    Route::get('/dashboard_oner',[UserController::class, 'OWNER'] )->name('dashboard_oner');
    Route::get('/resturant',[UserController::class, 'AddResturant'] )->name('resturant.create');
    Route::post('/resturant.store',[UserController::class, 'storeResturant'] )->name('resturant.store');
    Route::get('/plan',[abonnementController::class,'plan_owner'])->name('plan.plan_owner');
    Route::post('/plan/{abo}',[abonnementController::class,'shows_plan'])->name('plan.shows_plan');
    Route::get('/operator/GetOperator', [UserController::class, 'GetOwnerOperators'])->name('operators.GetOpera');
    Route::get('/operator/addOperator', [UserController::class, 'Addoperator_own'])->name('Addoperator_own');
    Route::post('/operator/storeOperator', [UserController::class, 'storeoperator'])->name('storeOperator');
    Route::resource('/menus',MenuController::class);

});
Route::middleware(['auth', 'verified','role:Admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
   Route::resource('/abonnements',abonnementController::class);
    Route::get('/operators/GetOperators', [UserController::class, 'GetOperators'])->name('operators.GetOperators');
    Route::get('/operators/Addoperator', [UserController::class, 'Addoperator'])->name('operators.Addoperator');
    Route::post('/operators/{item}', [UserController::class, 'deleteUser'])->name('Users.deleteUser');
    Route::post('/Users.store', [UserController::class, 'storeoperator'])->name('Users.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
