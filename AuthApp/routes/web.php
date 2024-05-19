<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
 
// Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});
 
// Routes for registration and login, accessible to guests only
Route::group(['middleware' => 'guest'], function () {
    // Registration routes
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    // Login routes
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
// Routes for authenticated users, accessible after login
Route::group(['middleware' => 'auth'], function () {
    // Home page route
    Route::get('/home', [HomeController::class, 'index']);
    // Logout route
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
