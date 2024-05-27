<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MenuController;
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


Route::get('/', function () {
    return view('welcome');
});


Route::get('/awa', function () {
    return view('hello word');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home' , [DashboardController::class, 'index']);
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

// Route::resource('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('dashboard', DashboardController::class);

Route::get('/tony', function () {
    return view('branch tony');
});