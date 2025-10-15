{{-- resources/views/genres/index.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Genre</title>
</head>
<body>

    <h1>Daftar Genre Buku</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Genre</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop melalui data $genres --}}
            @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre['id'] }}</td>
                    <td>{{ $genre['name'] }}</td>
                    <td>{{ $genre['description'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><a href="/">Kembali ke Home</a></p>

</body>
</html>