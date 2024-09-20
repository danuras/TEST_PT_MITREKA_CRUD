<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;

Route::get(
    '/',
    function () {
        return redirect('/daftar-buku');
    }
);
Route::get('/daftar-buku', [BookController::class, 'index']);
Route::get('/daftar-buku-yang-ingin-dipinjam', [BookController::class, 'wantToBorrow']);
Route::get('/daftar-buku-yang-sedang-dipinjam', [BookController::class, 'borrowedBook']);


Route::middleware('guest')->group(function () {
    Route::get('masuk', [UserController::class, 'showLoginView'])->name('login'); //clear
    Route::post('masuk', [UserController::class, 'login']); //clear
    Route::get('daftar', [UserController::class, 'showRegisterView'])->name('register'); //clear
    Route::post('daftar', [UserController::class, 'register']); //clear
});
Route::middleware('auth')->group(function () {
    Route::prefix('buku')->group(function () {
        Route::get('tambah-buku', [BookController::class, 'showAddBookView'])->name('add-book'); //clear
        Route::post('tambah-buku', [BookController::class, 'addBook']); //clear
        Route::get('ubah-buku/{book_id}', [BookController::class, 'showEditBookView'])->name('edit-book'); //clear
        Route::post('ubah-buku/{book_id}', [BookController::class, 'editBook']); //clear
        Route::delete('hapus-buku/{book_id}', [BookController::class, 'deleteBook'])->name('delete-book'); //clear
        Route::put('terima-peminjaman/{borrowing_id}', [BorrowingController::class, 'approveBorrowing'])->name('approve-borrowing'); //clear
        Route::delete('tolak-peminjaman/{borrowing_id}', [BorrowingController::class, 'cancelBorrowing'])->name('cancel-borrowing'); //clear
        Route::post('ajukan-peminjaman/', [BorrowingController::class, 'createBorrowing'])->name('create-borrowing'); //clear

    });
    Route::get('keluar', [UserController::class, 'logout']); //clear
});
