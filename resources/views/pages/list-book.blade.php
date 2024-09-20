<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Buku</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-btn {
            background-color: #2196F3;
            /* Biru */
            color: white;
            padding: 10px 15px;
            /* Padding lebih besar untuk tombol tambah */
            border-radius: 5px;
            margin-bottom: 20px;
            /* Spasi di bawah tombol */
        }

        .edit-btn {
            background-color: #4CAF50;
            /* Hijau */
            color: white;
        }


        .delete-btn {
            background-color: #f44336;
            /* Merah */
            color: white;
        }

        .borrow-btn {
            background-color: #2196F3;
            /* Biru */
            color: white;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            /* Memisahkan judul dan tombol */
            align-items: center;
            /* Memastikan semua elemen rata secara vertikal */
        }
    </style>
</head>

<body>

    <div class="header-container">
        <h2>Daftar Buku</h2>
        @if(Auth::check())
            @if(Auth::user()->role == 'admin')
                <button class="add-btn" onclick="window.location.href='/buku/tambah-buku'">Tambah Buku</button>
            @endif
        @endif
        <!-- Tombol tambah -->
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama Buku</th>
                <th>Jumlah Buku</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{$book->name}}</td>
                    <td>{{$book->amount}}</td>
                    <td>
                        @if(Auth::check())
                            @if(Auth::user()->role == 'admin')
                                <div class="button-group" style="display: flex; gap: 10px;">
                                    <button class="edit-btn"
                                        onclick="window.location.href='{{route('edit-book', $book->id)}}'">Ubah</button>
                                    <form action="{{ route('delete-book', $book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE') <!-- Spoofing metode DELETE -->
                                        <button type="submit" class="delete-btn">Hapus</button>
                                    </form>
                                </div>
                            @elseif(Auth::user()->role == 'basic')
                                <form action="{{ route('create-borrowing') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_book" value="{{ $book->id }}"> <!-- Parameter id tersembunyi -->
                                    <button type="submit" class="borrow-btn">Pinjam</button>
                                </form>
                            @endif
                        @else
                            <form action="{{ route('create-borrowing') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_book" value="{{ $book->id }}"> <!-- Parameter id tersembunyi -->
                                <button type="submit" class="borrow-btn">Pinjam</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>