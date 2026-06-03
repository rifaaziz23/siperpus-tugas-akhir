<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//kelola buku (pustakawan)
Route::middleware(['auth', 'role:pustakawan'])->group(function(){
    Route::view('/kelolabuku', 'kelolabuku');
    Route::view('/kelolarak', 'kelolarak');
});

// middleware -> memastikan user yg akses itu yg sudah login
Route::middleware('auth')->group(function(){
    // lihat
    Route::get('/books', [BookController::class, 'index'])->name('books.index');

    //create
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');

    //edit
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

    //delete
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

});

require __DIR__.'/auth.php';
