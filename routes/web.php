<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('home', 'App\Http\Controllers\HomeController');
Route::resource('/', 'App\Http\Controllers\HomeController');
Route::get('registration', [AuthController::class, 'index'])->name('registration');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('register-user', [AuthController::class, 'registerUser'])->name('register.custom');
Route::post('login-user', [AuthController::class, 'loginUser'])->name('login.custom');
Route::get('signout', [AuthController::class, 'signout'])->name('signout');


Route::middleware(['auth'])->group(function(){
    Route::get('/addBlog', [App\Http\Controllers\HomeController::class, 'create']);
    Route::post('/addBlog/store', [App\Http\Controllers\HomeController::class, 'store']);
});


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::resource('blogs', 'App\Http\Controllers\BlogController');

    // Category Route
    Route::resource('category',  'App\Http\Controllers\CategoryController');

    // all users
    Route::resource('users', 'App\Http\Controllers\UserController');
});