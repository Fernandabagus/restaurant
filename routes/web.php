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
use App\Http\Controllers\WebController;
use App\Http\Controllers\Users\AboutUsController;

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

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('aboutUsers');
Route::get('/our-menu', [AboutUsController::class, 'index'])->name('menuUsers');

// Route untuk halaman home dan lainnya
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Middleware untuk auth dan role
Route::middleware(['auth', 'sa'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('layouts.master');
    })->middleware(['auth', 'verified'])->name('dashboard');

    // Rute untuk FoodController
    Route::get('/food', [FoodController::class, 'index'])->name('daftarFoods');
    Route::get('/food/create', [FoodController::class, 'create'])->name('createFoods');
    Route::post('/food/create', [FoodController::class, 'store'])->name('storeFoods');
    Route::get('/food/edit/{id}', [FoodController::class, 'edit'])->name('editFoods');
    Route::post('/food/edit/{id}', [FoodController::class, 'update'])->name('updateFoods');
    Route::get('/food/delete/{id}', [FoodController::class, 'destroy'])->name('deleteFoods');
    Route::get('/food/trash', [FoodController::class, 'trash'])->name('trashFoods');
    Route::get('/food/restore/{id?}', [FoodController::class, 'restore'])->name('restoreFoods');
    Route::delete('/food/deleted/{id?}', [FoodController::class, 'deleted'])->name('deletedFoods');

    // Rute untuk DrinksController
    Route::get('/drink', [DrinksController::class, 'index'])->name('daftarDrinks');
    Route::get('/drink/create', [DrinksController::class, 'create'])->name('createDrinks');
    Route::post('/drink/create', [DrinksController::class, 'store'])->name('storeDrinks');
    Route::get('/drink/edit/{id}', [DrinksController::class, 'edit'])->name('editDrinks');
    Route::post('/drink/edit/{id}', [DrinksController::class, 'update'])->name('updateDrinks');
    Route::get('/drink/delete/{id}', [DrinksController::class, 'destroy'])->name('deleteDrinks');
    Route::get('/drink/trash', [DrinksController::class, 'trash'])->name('trashDrinks');
    Route::get('/drink/restore/{id?}', [DrinksController::class, 'restore'])->name('restoreDrinks');
    Route::delete('/drink/deleted/{id?}', [DrinksController::class, 'deleted'])->name('deletedDrinks');
});

// Rute otentikasi
require __DIR__.'/auth.php';

// Rute resource
Route::resource('/drinks', DrinksController::class);
