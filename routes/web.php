<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\journalController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('home');
});
Route::get('/journal',[journalController::class, 'show']);
Route::get('/journal/create',[journalController::class, 'create']);
Route::post('/journal',[journalController::class, 'store']);
Route::get('/journal/{id}',[journalController::class, 'show_insert']);

// });

//Route::get('/journal/create_symbol',[journalController::class, 'create_symbol']);

//store jouranl data

//Route::post('/journal',[journalController::class, 'store_symbol']);

Route::get('/register', function () {
    return view('register');
});
Route::get('/journal/create', function () {
    return view('new_input');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard',[journalController::class, 'show'], function () {
    return view('journal');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
