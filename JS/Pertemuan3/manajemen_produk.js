// Array produkToko untuk menyimpan daftar produk
let produkToko = [
   {id: 1, nama: "Laptop", harga: 7000000, stok: 5},
   {id: 2, nama: "Mouse", harga: 200000, stok: 10},
   {id: 3, nama: "Keyboard", harga: 350000, stok: 7}
];

// Variabel untuk elemen DOM (Didefinisikan di JS karena digunakan oleh fungsi)
const daftarProdukEl = document.getElementById('daftarProduk');
const messageDisplayEl = document.getElementById('messageDisplay');

// Fungsi utilitas untuk menampilkan pesan
function displayMessage(msg, isSuccess = true) {
    messageDisplayEl.textContent = msg;
    messageDisplayEl.className = isSuccess ? 'success-msg' : 'error-msg';
    setTimeout(() => {
        messageDisplayEl.textContent = ''; // Hapus pesan setelah 3 detik
    }, 3000);
}

/**
 * Fungsi untuk mengembalikan daftar semua produk dalam format string untuk ditampilkan di DOM.
 */
function tampilkanProduk() {
    let output = "ID | Nama | Harga | Stok\n";
    output += "---|---|---|---\n";
    if (produkToko.length === 0) {
        output = "Tidak ada produk tersedia.";
    } else {
        produkToko.forEach(produk => {
            // Gunakan toLocaleString untuk format harga yang lebih baik
            output += `${produk.id} | ${produk.nama} | Rp${produk.harga.toLocaleString('id-ID')} | ${produk.stok}\n`;
        });
    }
    return output; 
}

/**
 * Fungsi pembungkus untuk dipanggil dari tombol HTML dan memperbarui DOM.
 */
function tampilkanDaftar() {
    daftarProdukEl.textContent = tampilkanProduk();
}

/**
 * Fungsi untuk menambahkan produk baru ke dalam array produkToko.
 */
function tambahProduk(nama, harga, stok) {
    const newId = produkToko.length > 0 ? produkToko[produkToko.length - 1].id + 1 : 1;
    
    if (!nama || typeof harga !== 'number' || typeof stok !== 'number' || harga <= 0 || stok < 0) {
        displayMessage("Gagal menambahkan produk: Data tidak valid.", false);
        return;
    }
    
    const produkBaru = {
        id: newId,
        nama: nama,
        harga: harga,
        stok: stok
    };
    
    produkToko.push(produkBaru);
    displayMessage(`Produk baru "${nama}" berhasil ditambahkan dengan ID: ${newId}.`, true);
    tampilkanDaftar(); // Perbarui tampilan
}

/**
 * Fungsi untuk menghapus produk dari array produkToko berdasarkan ID.
 */
function hapusProduk(id) {
    const initialLength = produkToko.length;
    
    // Cari nama produk yang akan dihapus untuk pesan yang lebih baik
    const produkDihapus = produkToko.find(produk => produk.id === id);

    produkToko = produkToko.filter(produk => produk.id !== id);
    
    if (produkToko.length < initialLength) {
        // Pastikan produkDihapus ditemukan sebelum mengakses .nama
        const namaDihapus = produkDihapus ? produkDihapus.nama : 'Unknown';
        displayMessage(`Produk (ID: ${id}, Nama: ${namaDihapus}) berhasil dihapus.`, true);
    } else {
        displayMessage(`Gagal menghapus: Produk dengan ID: ${id} tidak ditemukan.`, false);
    }
    tampilkanDaftar(); // Perbarui tampilan
}

// --- Event Listeners untuk Formulir ---

// Handle form Tambah Produk
document.getElementById('formTambahProduk').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const nama = document.getElementById('namaProduk').value;
    // Mengambil nilai dan mengkonversinya ke integer
    const harga = parseInt(document.getElementById('hargaProduk').value); 
    const stok = parseInt(document.getElementById('stokProduk').value);

    tambahProduk(nama, harga, stok);
    
    this.reset(); // Reset form setelah sukses
});

// Handle form Hapus Produk
document.getElementById('formHapusProduk').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Mengambil nilai dan mengkonversinya ke integer
    const idHapus = parseInt(document.getElementById('idHapus').value); 

    hapusProduk(idHapus);

    this.reset(); // Reset form setelah aksi
});

// Tampilkan daftar produk saat halaman dimuat
document.addEventListener('DOMContentLoaded', tampilkanDaftar);