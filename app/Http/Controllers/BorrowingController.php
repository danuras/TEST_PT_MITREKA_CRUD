<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowingController extends Controller
{

    /**
     * terima permintaan peminjaman
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function approveBorrowing($borrowing_id)
    {
        if (!Gate::allows('admin')) {
            abort(401);
        }
        $borrowing = Borrowing::find($borrowing_id);
        $borrowing->id_admin = Auth::user()->id;
        $book = Book::find($borrowing->id_book);
        $book->amount -= 1;

        if ($borrowing->save() && $book->save()) {
            return redirect('/daftar-buku-yang-ingin-dipinjam');
        }
        return back()->withErrors(['edit-error' => 'Data gagal disimpan']);
    }

    /**
     * tolak permintaan peminjaman
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function cancelBorrowing($borrowing_id)
    {
        if (!Gate::allows('admin')) {
            abort(401);
        }
        $borrowing = Borrowing::find($borrowing_id);

        if ($borrowing->delete()) {
            return redirect('/daftar-buku-yang-ingin-dipinjam');
        }
        return back()->withErrors(['borrowing-error' => 'Data gagal disimpan']);
    }

    /**
     * membuat permintaan peminjaman
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createBorrowing(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_book' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $borrowing = Borrowing::create([
            'id_book' => $request->id_book,
            'id_borrower' => Auth::user()->id,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDay(),
        ]);

        if ($borrowing) {
            return redirect('/');
        }
        return back()->withErrors(['create-error' => 'Data gagal disimpan']);
    }
}
