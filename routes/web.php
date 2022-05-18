<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SalesRepresentativeController;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);

Route::post('logout', [LogoutController::class, 'store'])->name('logout');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('routes', [RouteController::class, 'index'])->name('route.index');
Route::get('routes/create', [RouteController::class, 'create'])->name('route.create');
Route::post('routes', [RouteController::class, 'store'])->name('route.store');

Route::get('sales-rep', [SalesRepresentativeController::class, 'index'])->name('sales-rep.index');
Route::get('sales-rep/create', [SalesRepresentativeController::class, 'create'])->name('sales-rep.create');
Route::get('sales-rep/{id}', [SalesRepresentativeController::class, 'show'])->name('sales-rep.show');
Route::post('sales-rep', [SalesRepresentativeController::class, 'store'])->name('sales-rep.store');
Route::get('sales-rep/{salesrepresentative}/edit', [SalesRepresentativeController::class, 'edit']);
Route::put('sales-rep/{salesrepresentative}', [SalesRepresentativeController::class, 'update'])->name('sales-rep.update');
Route::delete('sales-rep/{id}', [SalesRepresentativeController::class, 'destroy'])->name('sales-rep.delete');
