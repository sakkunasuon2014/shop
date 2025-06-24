<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TodolistController;
use App\Models\Book;

Route::get('/welcome', function () {;
    return view('welcome'); // welcome.blade.php
});

Route::get('/', function () {
    return "Welcome to Laravel!";
});

Route::get('/user/{name}', function ($name) {
    return "Hello, " . $name;
});

Route::get('/profile', function () {
    return "User Profile";
})->name('profile');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return "Admin Dashboard";
    });
    Route::get('/settings', function () {
        return "Admin Settings";
    });
});

Route::get('/user/{name}', [UserController::class, 'showProfile']);

Route::get('/greeting', function () {
    return view('greet', ['name' => 'Admin']);
});

Route::get('/hello1', function () {
    return view('hello');
});

Route::get('/user', function () {
    $users = ['Alice', 'Bob', 'Charlie',];
    return view('users', compact('users'));
});

Route::get('/profile', function () {
    return view('profile', ['name' => 'John', 'age' => 25]);
});

Route::get('/dashboard', function () {
    $username = 'Alice';
    return view('dashboard', compact('username'));
});

Route::get('/settings', function () {
    return view('settings')->with('theme', 'dark mode');
});

// Route::get('basic', function () {
//     return view('basic');
// });

Route::get('/basic', function () {
    return view('basic', ['role' => 'user']);
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/users', function () {
    return User::all(); // Fetch all users
});
Route::get('/user/{id}/profile', function ($id) {
    return User::find($id)->profile;
});

// Route::get('/category', function () {
//     return Category::all(); // Fetch all users
// });

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");

Route::post('/category', [CategoryController::class, 'store'])->name("category.store");

Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');

Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');

Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");

Route::prefix('book')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('book.index');
    Route::get('/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/', [BookController::class, 'store'])->name('book.store');
    Route::get('/{book}', [BookController::class, 'show'])->name('book.show');
    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('book.destroy');
});
Route::resource('/product', ProductController::class);
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');

Route::prefix('todolists')->group(function () {
    Route::get('/', [TodolistController::class, 'index'])->name('todolists.index');
    Route::get('/create', [TodolistController::class, 'create'])->name('todolists.create');
    Route::post('/', [TodolistController::class, 'store'])->name('todolists.store');
    Route::get('/{todolists}', [TodolistController::class, 'show'])->name('todolists.show');
    Route::get('/{todolists}/edit', [TodolistController::class, 'edit'])->name('todolists.edit');
    Route::put('/{todolists}', [TodolistController::class, 'update'])->name('todolists.update');
    Route::delete('/{todolists}', [TodolistController::class, 'destroy'])->name('todolists.destroy');
});
