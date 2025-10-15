<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>

    <form method="get">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="fullname"><br>

        <label>Alamat Rumah:</label><br>
        <textarea name="alamat"></textarea><br>

        <input type="submit" name="proses" value="Kirim">
    </form>

    <?php
        if (isset($_GET['proses'])) {
            $fname = $_GET['fullname'];
            $alamat = $_GET['alamat'];
            $tombol = $_GET['proses'];

            echo "Nama Lengkap: $fname <br>Alamat Rumah: $alamat <br>";
        }
    ?>
</body>
</html>