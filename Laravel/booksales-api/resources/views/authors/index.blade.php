{{-- resources/views/authors/index.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Author</title>
</head>
<body>

    <h1>Daftar Author</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Author</th>
                <th>Kebangsaan</th>
                <th>Tahun Lahir</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop melalui data $authors --}}
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author['id'] }}</td>
                    <td>{{ $author['name'] }}</td>
                    <td>{{ $author['nationality'] }}</td>
                    <td>{{ $author['birth_year'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><a href="/">Kembali ke Home</a></p>

</body>
</html>