<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
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
//landing page
Route::get('/', LandingController::class)->middleware("guest")->name("landing");

//classroom
Route::controller(ClassroomController::class)->group(function () {
    Route::get('/home', "home")->middleware(['auth', 'verified'])->name('home');
    Route::get('/classroom/create', 'create')->middleware("auth")->name('classroom.create');
    Route::post("/classroom", "store")->middleware("auth")->name("classroom.store");
    Route::post("/classroom/join", "join")->middleware("auth")->name("classroom.join");
});

//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//auth
require __DIR__ . '/auth.php';
