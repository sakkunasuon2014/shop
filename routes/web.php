<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

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
    // You cannot directly call another route's closure, but you can reuse the same data logic.
    $users = ['Alice', 'Bob', 'Charlie'];
    return response()->json($users); // Return the same data as JSON
});
