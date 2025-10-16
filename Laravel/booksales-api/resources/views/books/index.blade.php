{{-- resources/views/books/index.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
</head>
<body>

    <h1>Daftar Buku dan Penulis</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Kebangsaan Penulis</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    {{-- Mengakses data Author melalui relasi Eloquent --}}
                    <td>{{ $book->author->name ?? 'N/A' }}</td>
                    <td>{{ $book->author->nationality ?? 'N/A' }}</td>
                    <td>Rp {{ number_format($book->price, 2, ',', '.') }}</td>
                    <td>{{ $book->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>