<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'index']);

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/users', [AdminController::class, 'users']);

Route::get('/foodmenu', [AdminController::class, 'foodmenu']);

Route::get('/delete_food/{id}', [AdminController::class, 'delete_food']);

Route::get('/delete_chef/{id}', [AdminController::class, 'delete_chef']);

Route::post('/add_food', [AdminController::class, 'add_food']);

Route::post('/add_chef', [AdminController::class, 'add_chef']);

Route::get('/viewchef', [AdminController::class, 'viewchef']);

Route::get('/viewreservation', [AdminController::class, 'viewreservation']);

Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);

Route::get('/update_view/{id}', [AdminController::class, 'update_view']);

Route::get('/updatechef_view/{id}', [AdminController::class, 'updatechef_view']);

Route::post('/update_food/{id}', [AdminController::class, 'update_food']);

Route::post('/update_chef/{id}', [AdminController::class, 'update_chef']);

Route::post('/reservation', [HomeController::class, 'reservation']);

Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

Route::get('/show_cart/{id}', [HomeController::class, 'show_cart']);


Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
