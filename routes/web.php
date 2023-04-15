<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\TransactionController;
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

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/', function(){
    return redirect()->route('login');
})->name('welcome');

Route::middleware(['auth', 'home.access', 'trans.access'])->group(function(){
    Route::prefix('admin')->group(function(){
            Route::get('/home', [HomeController::class, 'admin'])->name('admin.home');
            Route::resource('/bundle', BundleController::class);
            Route::resource('/trans', TransactionController::class);
    });
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/trans', TransactionController::class);
    Route::resource('/shoe', ShoeController::class);
});
