<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\DrinksController;

use App\Http\Controllers\FoodController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.master');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home' , [DashboardController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/food', [FoodController::class, 'index'])->name('daftarFoods');
Route::get('/food/create', [App\Http\Controllers\FoodController::class, 'create'])->name('createFoods');
Route::post('/food/create', [App\Http\Controllers\FoodController::class, 'store'])->name('storeFoods');

require __DIR__.'/auth.php';

//route resource
Route::resource('/drinks', \App\Http\Controllers\DrinksController::class);
