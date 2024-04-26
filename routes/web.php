<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\stripeController;
use App\Http\Controllers\StripeController as ControllersStripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get("/organizator", [AdminController::class, "index"])->name('admin')->middleware('role:organizator');

// 
Route::post("/calendar/store", [AdminController::class, "store"]);
Route::get("/calendar/show", [AdminController::class, "show"]);


// Route::post('/event/{event}/buy', [AdminController::class, 'buy'])->name('events.buy');

Route::get("/event/buy/{event}", [AdminController::class, "buy"])->name("event.buy");

Route::get('/attendee', function () {
    return view('attendee');
})->middleware("role:attendee");


Route::get('/organizator', function () {
    return view('organizator');
})->middleware("role:organizer");

Route::get('/session', [StripeController::class, 'session']);
Route::get('/session', [StripeController::class, 'session'])->name('session');


Route::put("/event/update/{event}", [AdminController::class, "update"])->name("home.update");
Route::post("/event/store", [AdminController::class, "store"])->name("home.store");

Route::delete("/event/delete/{event}", [AdminController::class, "destroy"])->name("home.destroy");


require __DIR__ . '/auth.php';
