<?php

use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\GenresController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\BookController as ClientBookController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/contacts', [MainController::class, 'sendEmail'])->name('contacts.send');
Route::get('/reviews', [MainController::class, 'reviews'])->name('reviews');
Route::controller(ClientBookController::class, '')->group(function () {
  Route::get('/book/{book}', [ClientBookController::class, 'show'])->name('book.show');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
  Route::resource('/genres', GenresController::class);
  Route::resource('/reviews', ReviewsController::class);
  Route::resource('/books', AdminBookController::class);
});
Auth::routes();


// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);
