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
    Route::get("/classroom/{id}", "show")->middleware("auth")->name("classroom.show");
    Route::get("/classroom/{id}/edit", "edit")->middleware("auth")->name("classroom.edit");
    Route::get("/classroom/{id}/lessons", "lessons")->middleware("auth")->name("classroom.lessons");
    Route::get("/classroom/{id}/tickets", "tickets")->middleware("auth")->name("classroom.tickets");
    Route::get("/classroom/{id}/homeworks", "homeworks")->middleware("auth")->name("classroom.homeworks");

    Route::put("/classroom/{id}", "update")->middleware("auth")->name("classroom.update");
    Route::delete("/classroom/{id}", "destroy")->middleware(["auth", "password.confirm"])->name("classroom.destroy");
});

//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//auth
require __DIR__ . '/auth.php';
