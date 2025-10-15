<?php

$nama = "Agam";
$nilai = 75;

//ifelse multi kondisi
if ($nilai >= 85 && $nilai <= 100) $grade = "A";
elseif ($nilai >= 75 && $nilai < 85) $grade = "B";
elseif ($nilai >= 60 && $nilai < 75) $grade = "C";
elseif ($nilai >= 30 && $nilai < 60) $grade = "D";
elseif ($nilai >= 0 && $nilai < 30) $grade = "E";
else $grade = "Tidak Valid";

// A = Memuaskan
// B = Bagus
// C = Cukup
switch ($grade) {
    case "A":
        $keterangan = "Memuaskan";
        break;
    case "B":
        $keterangan = "Bagus";
        break;
    case "C":
        $keterangan = "Cukup";
        break;
    case "D":
        $keterangan = "Kurang";
        break;
    case "E":
        $keterangan = "Sangat Kurang";
        break;
    default:
        $keterangan = "Tidak Valid";
        break;
}

echo "Nama siswa: $nama <br>";
echo "Nilai: $nilai <br>";
echo "Grade: $grade <br>";
echo "Keterangan: $keterangan <br>";

?>