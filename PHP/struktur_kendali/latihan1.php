<?php

// variabel
$nama = "Agam";
$totalBelanja = 150000;
$keterangan = "";

// if-else
if ($totalBelanja >= 100000) {
    $keterangan = "Selamat $nama, Anda mendapatkan hadiah";
} else {
    $keterangan = "Terima kasih $nama, sudah berbelanja";
}

echo "Nama Pelanggan: $nama <br>";
echo "Total Belanja: Rp $totalBelanja <br>";
echo "Keterangan: $keterangan <br>";

?>