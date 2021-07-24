<?php

use App\Http\Controllers\CompaniController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return redirect()->route('home');
});

// Dashboard admin
Route::prefix('home')
    ->middleware(['auth:sanctum','verified'])
    ->group(function() {
        Route::get('/', [HomeController::class,'index'])
            ->name('home');
            Route::resource('compani', CompaniController::class);
            Route::resource('employe', EmployeController::class);
 });


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
