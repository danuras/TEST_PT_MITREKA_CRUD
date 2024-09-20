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

    <h2>Buku yang dipinjam</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Buku</th>
                <th>Nama Peminjam</th>
                <th>Tanggal awal</th>
                <th>Tanggal akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{$book->book_name}}</td>
                    <td>{{$book->user_name}}</td>
                    <td>{{$book->start_date}}</td>
                    <td>{{$book->end_date}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>