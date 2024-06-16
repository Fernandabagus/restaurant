<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Users\FoodUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrinksController;
use App\Http\Controllers\FoodController;

use App\Http\Controllers\MenuController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\OrdersController;

use App\Http\Controllers\ReviewsController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\WebController;
use App\Http\Controllers\Users\AboutUsController;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Users\OurMenuController;


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

Route::get('/our-menu', [OurMenuController::class, 'index'])->name('menuUsers');

Route::get('/product', [ProductController::class, 'index'])->name('product-list');

// Route::get('/test', [OrdersController::class, 'test'])->name('test');

Route::get('/menuUser', [FoodUsController::class, 'index'])->name('menuUser');
Route::get('/foodUser', [FoodUsController::class, 'indexFood'])->name('foodUser');
Route::get('/drinkUser', [FoodUsController::class, 'indexDrink'])->name('drinkUser');
Route::get('/dasAdmin', [DashboardController::class, 'indexAdm'])->name('dasAdmin');
Route::get('/myprofile', [ProfileController::class, 'index'])->name('myprofileUsers');

// MENU
Route::get('/our-menu', [MenuController::class, 'index'])->name('our-menu');


Route::middleware(['auth'])->group(function () {
    Route::get('/myprofile/edit', [ProfileController::class, 'edit'])->name('myprofile.edit');
    Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('update.profile');
    Route::delete('/myprofile', [ProfileController::class, 'destroy'])->name('myprofile.destroy');


    Route::get('/review', [ReviewsController::class, 'index'])->name('reviewUsers');
    Route::post('/review', [ReviewsController::class, 'store'])->name('review.store');

    Route::get('/order-food/{id}', [OrdersController::class, 'order'])->name('order-food');
    Route::put('/process-my-order/{id}', [OrdersController::class, 'processOrder'])->name('process-my-order');
    Route::put('update-order/{id}', [OrdersController::class, 'updateOrder'])->name('update-order');
});

// Route::get('/search', [SearchController::class, 'index'])->name('search');


// Route untuk halaman home dan lainnya
// Route::get('/about', [AboutController::class, 'index'])->name('about.index');
// Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
// Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
// Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
// Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
// Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Middleware untuk auth dan role
Route::middleware(['auth', 'sa'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product
    Route::get('products', [AdminProductController::class, 'index'])->name('product-admin');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('create-product');
    Route::post('/products/store', [AdminProductController::class, 'store'])->name('store-product');
    Route::delete('delete-product/{id}', [AdminProductController::class, 'destroy'])->name('delete-product');
    Route::get('/products/edit/{id}', [AdminProductController::class, 'edit'])->name('edit-product');
    Route::post('/products/update/{id}', [AdminProductController::class, 'update'])->name('update-product');

// Profil admin
    Route::get('/profil-admin', [ProfileController::class, 'index'])->name('profiladmin.index');
    Route::get('/profil-admin/edit', [ProfileController::class, 'edit'])->name('profiladmin.edit');
    Route::patch('/profil-admin', [ProfileController::class, 'update'])->name('profiladmin.update');
    Route::delete('/profil-admin', [ProfileController::class, 'destroy'])->name('profiladmin.destroy');

    Route::get('order-list', [AdminOrderController::class, 'index'])->name('order-list');
    Route::get('order/{order}/edit', [AdminOrderController::class, 'edit'])->name('orders.edit');
    Route::put('order/{order}', [AdminOrderController::class, 'update'])->name('orders.update');
    Route::delete('order/{order}', [AdminOrderController::class, 'destroy'])->name('orders.delete');
    


    // Route::get('/dashboard', function () {
    //     return view('layouts.master');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    // tblTransaction
    Route::get('/trans', function () {
        return view('mytransaction.tblTransaction');
    })->name('tblTransaction');

    // dashboard admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute untuk FoodController
    Route::get('/food', [FoodController::class, 'index'])->name('daftarFoods');
    Route::get('/food/create', [FoodController::class, 'create'])->name('createFoods');
    Route::post('/food/create', [FoodController::class, 'store'])->name('storeFoods');
    Route::get('/food/edit/{id}', [FoodController::class, 'edit'])->name('editFoods');
    Route::post('/food/edit/{id}', [FoodController::class, 'update'])->name('updateFoods');
    Route::get('/food/delete/{id}', [FoodController::class, 'destroy'])->name('deleteFoods');
    Route::get('foods/trash', [FoodController::class, 'trash'])->name('foods.trash');
    Route::post('foods/restore/{id}', [FoodController::class, 'restore'])->name('foods.restore');
    Route::delete('foods/force-delete/{id}', [FoodController::class, 'forceDelete'])->name('foods.forceDelete');
    Route::post('foods/restore-all', [FoodController::class, 'restoreAll'])->name('foods.restoreAll');
    Route::delete('foods/force-delete-all', [FoodController::class, 'forceDeleteAll'])->name('foods.forceDeleteAll');

    // Rute untuk DrinksController
    Route::get('/drink', [DrinksController::class, 'index'])->name('daftarDrinks');
    Route::get('/drink/create', [DrinksController::class, 'create'])->name('createDrinks');
    Route::post('/drink/create', [DrinksController::class, 'store'])->name('storeDrinks');
    Route::get('/drink/edit/{id}', [DrinksController::class, 'edit'])->name('editDrinks');
    Route::post('/drink/edit/{id}', [DrinksController::class, 'update'])->name('updateDrinks');
    Route::get('/drink/deleste/{id}', [DrinksController::class, 'destroy'])->name('deleteDrinks');
    Route::get('drinks/trash', [DrinksController::class, 'trash'])->name('drinks.trash');
    Route::post('drinks/restore/{id}', [DrinksController::class, 'restore'])->name('drinks.restore');
    Route::delete('drinks/force-delete/{id}', [DrinksController::class, 'forceDelete'])->name('drinks.forceDelete');
    Route::post('drinks/restore-all', [DrinksController::class, 'restoreAll'])->name('drinks.restoreAll');
    Route::delete('drinks/force-delete-all', [DrinksController::class, 'forceDeleteAll'])->name('drinks.forceDeleteAll');

    Route::get('/user', [UserController::class, 'index'])->name('daftarUsers');
    // Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('deleteUsers');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('deleteUsers');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('editUsers');
    Route::post('/user/edit/{id}', [UserController::class, 'update'])->name('updateUsers');
    Route::get('/user/create', [UserController::class, 'create'])->name('createUsers');
    Route::post('/user/create', [UserController::class, 'store'])->name('storeUsers');
    Route::get('/users/trash', [UserController::class, 'trash'])->name('user.trash');
Route::post('/users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
Route::delete('/users/force-delete/{id}', [UserController::class, 'forceDelete'])->name('users.forceDelete');
Route::post('/users/restore-all', [UserController::class, 'restoreAll'])->name('users.restoreAll');
Route::delete('/users/force-delete-all', [UserController::class, 'forceDeleteAll'])->name('users.forceDeleteAll');

    // Rute untuk Orders
    // Route::resource('/orders', OrderController::class);

    Route::get('/admin/reviews', [ReviewsController::class, 'reviewsAdmin'])->name('tableReviews');
});

// Rute otentikasi
require __DIR__ . '/auth.php';

// Rute resource
Route::resource('/drinks', DrinksController::class);
