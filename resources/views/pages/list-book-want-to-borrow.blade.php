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
    </style>
</head>

<body>

    <h2>Permintaan Peminjaman</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Buku</th>
                <th>Nama Peminjam</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{$book->book_name}}</td>
                    <td>{{$book->user_name}}</td>
                    <td>
                        <div class="button-group" style="display: flex; gap: 10px;">

                            <form action="{{ route('approve-borrowing', $book->borrowing_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="edit-btn">Terima</button>
                            </form>

                            <form action="{{ route('cancel-borrowing', $book->borrowing_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Tolak</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>