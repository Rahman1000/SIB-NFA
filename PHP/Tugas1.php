<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Penilaian Ujian</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .result { margin-top: 20px; padding: 15px; border-radius: 5px; }
        .lulus { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .remedial { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .info { background-color: #e9ecef; color: #495057; border: 1px solid #ced4da; }
    </style>
</head>
<body>

    <h1>Form Penilaian Ujian</h1>
    <hr>

    <form method="post" action="">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai Ujian:</label>
            <input type="number" id="nilai" name="nilai" min="0" max="100" required>
        </div>
        <button type="submit" name="submit">Cek Hasil</button>
    </form>

    <?php
    // STRUKTUR KENDALI PHP UNTUK PEMROSESAN
    if (isset($_POST['submit'])) {
        // Ambil dan bersihkan data input
        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        // Pastikan nilai adalah angka dan di-cast ke integer
        $nilai_ujian = (int)$_POST['nilai'];

        // Tentukan batas kelulusan
        $batas_lulus = 70;

        echo "<div class='result info'>";
        echo "<h2>Hasil Ujian</h2>";
        echo "<p><strong>Nama:</strong> $nama</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Nilai Ujian:</strong> $nilai_ujian</p>";
        echo "</div>";

        // STRUKTUR KENDALI IF-ELSE
        if ($nilai_ujian > $batas_lulus) {
            // Jika nilai ujian lebih dari 70
            echo "<div class='result lulus'>";
            echo "<h3>Selamat, $nama!</h3>";
            echo "<p>Anda **LULUS** ujian.</p>";
            echo "</div>";
        } else {
            // Jika nilai ujian kurang dari atau sama dengan 70
            echo "<div class='result remedial'>";
            echo "<h3>Maaf, $nama.</h3>";
            echo "<p>Anda **REMEDIAL**. Nilai Anda tidak mencapai batas kelulusan ($batas_lulus).</p>";
            echo "</div>";
        }
    }
    ?>

    <?php
            if (isset($_POST['submit'])) {
            // ... Pemrosesan data
            $nilai_ujian = (int)$_POST['nilai'];
            $batas_lulus = 70;

            // STRUKTUR KENDALI IF-ELSE
            if ($nilai_ujian > $batas_lulus) {
                // Blok kode dieksekusi jika kondisi BENAR (TRUE)
                // Nilai > 70
                echo "<div class='result lulus'>...";
                echo "<p>Anda **LULUS** ujian.</p>";
                echo "</div>";
            } else {
                // Blok kode dieksekusi jika kondisi SALAH (FALSE)
                // Nilai <= 70
                echo "<div class='result remedial'>...";
                echo "<p>Anda **REMEDIAL**.</p>";
                echo "</div>";
            }
        }
    ?>
</body>
</html>