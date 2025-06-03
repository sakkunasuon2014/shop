<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

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
