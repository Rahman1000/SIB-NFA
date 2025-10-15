// **Data Produk** (Diperluas menjadi minimal 5)
let produklist = [
    { id: 1, nama: "Laptop", harga: 12000000 },
    { id: 2, nama: "Smartphone", harga: 5000000 },
    { id: 3, nama: "Headset", harga: 750000 },
    { id: 4, nama: "Powerbank", harga: 300000 },
    { id: 5, nama: "Monitor", harga: 3500000 }
];

// Variabel untuk output ke DOM
const outputLogEl = document.getElementById('outputLog');
const daftarProdukEl = document.getElementById('daftarProduk');

/**
 * Utility function untuk menulis pesan ke DOM
 * @param {string} message - Pesan yang akan ditulis.
 * @param {string} type - Jenis pesan untuk styling (info, success, error).
 */
function appendToLog(message, type = 'info') {
    const p = document.createElement('p');
    p.innerHTML = message;
    p.className = type;
    outputLogEl.appendChild(p);
    // Scroll ke bawah agar log terbaru terlihat
    outputLogEl.scrollTop = outputLogEl.scrollHeight; 
}


// ----------------------------------------------------------------------

// **Menambahkan Produk dengan Spread Operator**
/**
 * Menambahkan produk baru. Harga diterima sebagai bagian dari Rest Parameter.
 * @param {number} id - ID produk.
 * @param {string} nama - Nama produk.
 * @param {number[]} hargaRest - Array berisi harga produk (menggunakan Rest Parameter).
 */
function tambahProduk(id, nama, ...hargaRest) {
    // Memastikan harga ada (mengambil elemen pertama dari Rest Parameter)
    const harga = hargaRest[0]; 

    // Validasi sederhana
    if (!id || !nama || !harga || typeof harga !== 'number') {
        appendToLog(`[ERROR] Gagal menambahkan produk: Data tidak lengkap atau tidak valid.`, 'error');
        return;
    }

    const produkBaru = { id, nama, harga };

    // Menggunakan Spread Operator (...) untuk membuat array baru yang berisi
    // elemen lama dan produk baru, meningkatkan imutabilitas (meski di sini kita langsung menimpanya)
    produklist = [
        ...produklist,
        produkBaru 
    ];
    
    appendToLog(`[SUCCESS] Produk "${nama}" (ID: ${id}) berhasil ditambahkan.`, 'success');
}

// **Menghapus Produk**
/**
 * Menghapus produk berdasarkan ID. Menggunakan filter.
 * @param {number} id - ID produk yang akan dihapus.
 */
function hapusProduk(id) {
    const initialLength = produklist.length;
    const namaProduk = produklist.find(p => p.id === id)?.nama || `ID ${id}`;
    
    // Filter array untuk membuat array baru tanpa produk dengan ID yang cocok
    produklist = produklist.filter(produk => produk.id !== id);
    
    if (produklist.length < initialLength) {
        appendToLog(`[SUCCESS] Produk "${namaProduk}" (ID: ${id}) berhasil dihapus.`, 'success');
    } else {
        appendToLog(`[ERROR] Gagal menghapus: Produk dengan ID: ${id} tidak ditemukan.`, 'error');
    }
}

// **Menampilkan Produk dengan Destructuring**
/**
 * Menampilkan daftar produk ke elemen DOM dengan menggunakan Destructuring.
 */
function tampilkanProduk() {
    daftarProdukEl.innerHTML = ''; // Bersihkan tampilan
    
    if (produklist.length === 0) {
        daftarProdukEl.innerHTML = '<p class="info">Tidak ada produk tersedia.</p>';
        return;
    }

    const table = document.createElement('table');
    table.innerHTML = `
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="produkBody">
        </tbody>
    `;
    const tbody = table.querySelector('#produkBody');
    
    produklist.forEach(produk => {
        // Menggunakan Destructuring untuk mengekstrak properti produk
        const { id, nama, harga } = produk; 

        const row = tbody.insertRow();
        row.dataset.id = id; // Simpan ID di baris
        row.innerHTML = `
            <td>${id}</td>
            <td>${nama}</td>
            <td>Rp${harga.toLocaleString('id-ID')}</td>
            <td><button class="btn-hapus" data-id="${id}">Hapus</button></td>
        `;
    });
    
    daftarProdukEl.appendChild(table);
    appendToLog(`[INFO] Daftar produk berhasil ditampilkan. Jumlah: ${produklist.length}`);
}


// ----------------------------------------------------------------------
// **Event Listener & Handler**

// Nama fungsi bebas
const eventHandler = {
    // Fungsi untuk menangani penambahan produk dari form
    handleTambah: (e) => {
        e.preventDefault();
        const form = e.target;
        const id = parseInt(form.idProduk.value);
        const nama = form.namaProduk.value;
        const harga = parseInt(form.hargaProduk.value);

        if (isNaN(id) || isNaN(harga) || !nama) {
            appendToLog('[ERROR] Input tidak valid. Pastikan ID dan Harga adalah angka.', 'error');
            return;
        }

        // Cek ID duplikat
        if (produklist.some(p => p.id === id)) {
             appendToLog(`[ERROR] Produk dengan ID ${id} sudah ada. Gunakan ID lain.`, 'error');
             return;
        }
        
        // Panggil fungsi utama dengan Rest Parameter (harga adalah elemen pertama)
        tambahProduk(id, nama, harga, 'ekstra data diabaikan'); 
        tampilkanProduk();
        form.reset();
    },

    // Fungsi untuk menangani penghapusan (menggunakan Event Delegation)
    handleAksi: (e) => {
        const target = e.target;
        // Hanya proses jika elemen yang diklik memiliki kelas 'btn-hapus'
        if (target.classList.contains('btn-hapus')) {
            const id = parseInt(target.dataset.id);
            if (!isNaN(id)) {
                hapusProduk(id);
                tampilkanProduk();
            }
        }
    }
};

// ----------------------------------------------------------------------
// **EKSEKUSI & EVENT LISTENER PADA DOMContentLoaded**

document.addEventListener('DOMContentLoaded', () => {
    appendToLog("--- SISTEM MANAJEMEN PRODUK DIMUAT ---", 'heading');

    // 1. Tampilkan produk awal
    appendToLog("--- Status Awal ---", 'heading');
    tampilkanProduk();
    
    // 2. Pasang Event Listener ke formulir tambah produk
    const formTambah = document.getElementById('formTambah');
    if (formTambah) {
        formTambah.addEventListener('submit', eventHandler.handleTambah);
    }

    // 3. Pasang Event Listener untuk delegasi penghapusan pada container daftar produk
    // Menggunakan Event Delegation untuk menangani tombol hapus yang dinamis
    if (daftarProdukEl) {
        daftarProdukEl.addEventListener('click', eventHandler.handleAksi);
    }
});