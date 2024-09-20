<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Menampillkan halaman daftar buku
     */
    public function index()
    {
        $section = [
            'block',
            'none',
            'none',
        ];


        $books = Book::select('id', 'amount', 'name')
            ->get();
        $data['books'] = $books;
        $data['viewFile'] = 'pages.list-book';
        $data['section'] = $section;
        return view('home', $data);
    }
    /**
     * Menampillkan halaman daftar permintaan peminjaman
     */
    public function wantToBorrow()
    {
        if (!Gate::allows('admin')) {
            abort(401);
        }

        $section = [
            'none',
            'block',
            'none',
        ];

        $books = Book::select('borrowings.id as borrowing_id', 'books.name as book_name', 'users.name as user_name')->join('borrowings', 'borrowings.id_book', 'books.id')->join('users', 'users.id', 'borrowings.id_borrower')->whereNull('id_admin')
            ->get();
        $data['books'] = $books;
        $data['viewFile'] = 'pages.list-book-want-to-borrow';
        $data['section'] = $section;
        return view('home', $data);
    }/**
     * Menampillkan halaman daftar buku yang dipinjam
     */
    public function borrowedBook()
    {
        $section = [
            'none',
            'none',
            'block',
        ];
        $books = null;
        if (Auth::user()->role == 'admin') {
            $books = Book::select('books.id', 'books.name as book_name', 'users.name as user_name', 'borrowings.start_date', 'borrowings.end_date')->join('borrowings', 'borrowings.id_book', 'books.id')->join('users', 'users.id', 'borrowings.id_borrower')->whereNotNull('id_admin')
                ->get();
        } else {
            $books = Book::select('books.id', 'books.name as book_name', 'users.name as user_name', 'borrowings.start_date', 'borrowings.end_date')->join('borrowings', 'borrowings.id_book', 'books.id')->join('users', 'users.id', 'borrowings.id_borrower')
                ->where('id_borrower', Auth::user()->id)
                ->whereNotNull('id_admin')
                ->get();
        }
        $data['books'] = $books;
        $data['viewFile'] = 'pages.list-book-borrowed';
        $data['section'] = $section;
        return view('home', $data);
    }
    /**
     * Menampilkan halaman add-book
     *
     *
     */
    public function showAddBookView()
    {
        if (!Gate::allows('admin')) {
            abort(401);
        }
        return view('add-book');
    }
    /**
     * Menambah data buku
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addBook(Request $request)
    {
        if (!Gate::allows('admin')) {
            abort(401);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $book = Book::create([
            'name' => $request->name,
            'amount' => $request->amount,
        ]);

        if ($book) {
            return redirect('/');
        }
        return back()->withErrors(['add-error' => 'Data gagal disimpan']);
    }

    /**
     * Menampilkan halaman edit-book
     *
     *
     */
    public function showEditBookView($book_id)
    {

        if (!Gate::allows('admin')) {
            abort(401);
        }
        $book = Book::find($book_id);
        return view('edit-book', ['book' => $book]);
    }
    /**
     * Mengubah data buku
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function editBook(Request $request, $book_id)
    {

        if (!Gate::allows('admin')) {
            abort(401);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $book = Book::find($book_id);
        $book->name = $request->name;
        $book->amount = $request->amount;

        if ($book->save()) {
            return redirect('/');
        }
        return back()->withErrors(['edit-error' => 'Data gagal disimpan']);
    }

    /**
     * menghapus data buku
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteBook($book_id)
    {

        if (!Gate::allows('admin')) {
            abort(401);
        }
        $book = Book::find($book_id);

        if ($book->delete()) {
            return redirect('/');
        }
        return back()->withErrors(['delete-error' => 'Data gagal dihapus']);
    }


}
