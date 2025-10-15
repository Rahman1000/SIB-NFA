// main.js
import { index, store, destroy } from "./controller.js";

const main = () => {
    // Data tambahan (minimal 2 data)
    const user1 = { nama: 'Joko Widodo', umur: 45, alamat: 'Jl. Merdeka', email: 'joko.w@example.com' };
    const user2 = { nama: 'Susi Susanti', umur: 38, alamat: 'Jl. Prestasi', email: 'susi.s@example.com' };

    // 1. Tampilkan data awal
    index();

    // 2. Tambah dua data
    store(user1);
    store(user2);
    
    // 3. Tampilkan data setelah penambahan
    index();

    // 4. Hapus satu data
    destroy();

    // 5. Tampilkan data setelah penghapusan
    index();
};

// Pastikan DOM sudah dimuat sebelum menjalankan main()
document.addEventListener('DOMContentLoaded', main);