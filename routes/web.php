<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,"show_post"])->name("home");

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class,"show_post"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(["auth"])->group(function(){
    // Route::get("/post",[PostController::class,"index"])->middleware(["can:isAdmin"])->name("post_index");
    Route::get("/post",[PostController::class,"index"])->name("post_index");

    Route::post("/post",[PostController::class,"create"])->name("post_create");

    Route::get("/post/edit/{id}",[PostController::class,"edit"])->name("post_edit");
    Route::put("/post/edit/{id}",[PostController::class,"update"])->name("post_update");
    Route::get("/post/delete/{id}",[PostController::class,"destroy"])->name("post_destroy");
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
