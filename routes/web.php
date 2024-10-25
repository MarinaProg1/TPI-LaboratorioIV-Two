<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;

Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    return view('dashtest'); // Muestra la vista dashtest sin requerir autenticación
})->name('home'); // Cambié el nombre a 'home' por claridad

Route::get('/dashtest', function () {
    return view('dashtest');
})->middleware(['auth', 'verified'])->name('dashtest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
     
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rutas de productos
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create'); // Cambiado a products.create
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store'); // Ruta para guardar el producto
    Route::resource('products', ProductsController::class);

    
    //Rutas de carrito
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::put('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Rutas de categorías
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');



require __DIR__.'/auth.php';
