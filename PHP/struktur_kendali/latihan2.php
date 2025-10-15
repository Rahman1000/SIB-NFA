<?php

$nama = "Agam";
$nilai = 75;

//jika $nilai .= 60 = lulus
//jika $nilai < 60 = tidak lulus
$keterangan = ($nilai >= 60) ? "Lulus" : "Tidak Lulus";

echo "Nama siswa: $nama <br>";
echo "Nilai: $nilai <br>";
?>