// --- BAGIAN 1: DEFINISI KELAS TRANSPORTASI ---

/**
 * Class Kendaraan (Superclass)
 */
class Kendaraan {
    constructor(merk, tahun) {
        this.merk = merk;
        this.tahun = tahun;
    }

    getInfo() {
        return `${this.merk} (${this.tahun})`;
    }

    getBiayaSewa() {
        throw new Error("Method getBiayaSewa() harus diimplementasikan oleh subclass.");
    }
}

/**
 * Class Mobil (Subclass dari Kendaraan)
 */
class Mobil extends Kendaraan {
    constructor(merk, tahun, jumlahPintu) {
        super(merk, tahun);
        this.jumlahPintu = jumlahPintu;
    }

    getInfo() {
        return `Mobil ${super.getInfo()}, Pintu: ${this.jumlahPintu}`;
    }

    getBiayaSewa() {
        return 500000; // Biaya sewa Mobil per hari
    }
}

/**
 * Class Motor (Subclass dari Kendaraan)
 */
class Motor extends Kendaraan {
    constructor(merk, tahun, tipe) {
        super(merk, tahun);
        this.tipe = tipe;
    }

    getInfo() {
        return `Motor ${super.getInfo()}, Tipe: ${this.tipe}`;
    }

    getBiayaSewa() {
        return 150000; // Biaya sewa Motor per hari
    }
}

// --- BAGIAN 2: DEFINISI KELAS PELANGGAN DAN TRANSAKSI ---

/**
 * Class Pelanggan
 */
class Pelanggan {
    constructor(nama, nomorTelepon) {
        this.nama = nama;
        this.nomorTelepon = nomorTelepon;
        this.kendaraanDisewa = []; 
    }

    /**
     * Method untuk mencatat transaksi penyewaan.
     */
    catatPenyewaan(kendaraan, durasiHari) {
        if (!(kendaraan instanceof Kendaraan)) {
            appendToOutput(`[ERROR] Transaksi Gagal untuk ${this.nama}: Objek yang disewa bukan jenis Kendaraan.`, 'error');
            return null;
        }

        const biayaPerHari = kendaraan.getBiayaSewa();
        const totalBiaya = biayaPerHari * durasiHari;

        const transaksi = {
            kendaraan: kendaraan,
            durasi: durasiHari,
            totalBiaya: totalBiaya,
            tanggalSewa: new Date().toLocaleDateString('id-ID'),
        };

        this.kendaraanDisewa.push(transaksi);
        
        appendToOutput(`[SUCCESS] Penyewaan untuk <strong>${this.nama}</strong> berhasil dicatat.`, 'success');
        appendToOutput(`   - Menyewa ${kendaraan.getInfo()} (${durasiHari} hari). Total: Rp${totalBiaya.toLocaleString('id-ID')}`);
        
        return transaksi;
    }

    /**
     * Method untuk mengembalikan detail sewa dalam format HTML string.
     */
    getDetailSewaHTML() {
        if (this.kendaraanDisewa.length === 0) {
            return `<li>Belum menyewa kendaraan.</li>`;
        }

        let detailHTML = ``;
        this.kendaraanDisewa.forEach((sewa, index) => {
            detailHTML += `
                <li>
                    <strong>${sewa.kendaraan.constructor.name} ${sewa.kendaraan.getInfo()}</strong>
                    <br>Durasi: ${sewa.durasi} hari, Biaya Total: 
                    <span class="biaya">Rp${sewa.totalBiaya.toLocaleString('id-ID')}</span>
                </li>`;
        });
        return `<ul>${detailHTML}</ul>`;
    }
}


// --- BAGIAN 3: SISTEM MANAJEMEN GLOBAL DAN FUNGSI UTILITY DOM ---

// Array global untuk menyimpan semua pelanggan yang sedang aktif menyewa
let daftarPelangganAktif = [];
const outputEl = document.getElementById('outputTransaksi');
const daftarPelangganEl = document.getElementById('daftarPelanggan');

/**
 * Fungsi utility untuk menulis pesan ke DOM
 */
function appendToOutput(message, type = 'info') {
    const p = document.createElement('p');
    p.innerHTML = message;
    p.className = type; // Menambahkan kelas untuk styling (success, error)
    outputEl.appendChild(p);
}

/**
 * Fungsi untuk menambahkan pelanggan ke daftar aktif.
 */
function tambahkanPelangganAktif(pelanggan) {
    if (!daftarPelangganAktif.includes(pelanggan)) {
        daftarPelangganAktif.push(pelanggan);
    }
}

/**
 * Fungsi untuk menampilkan daftar semua pelanggan yang sedang menyewa (output ke DOM).
 */
function tampilkanDaftarPelangganAktif() {
    daftarPelangganEl.innerHTML = ''; // Kosongkan daftar sebelum refresh
    
    appendToOutput("\n--- DAFTAR PELANGGAN AKTIF DIPERBARUI ---", 'heading');

    if (daftarPelangganAktif.length === 0) {
        daftarPelangganEl.innerHTML = `<p class="info">Saat ini tidak ada pelanggan yang sedang menyewa.</p>`;
        return;
    }

    daftarPelangganAktif.forEach((pelanggan, index) => {
        const div = document.createElement('div');
        div.className = 'pelanggan-item';
        div.innerHTML = `
            <h3>${index + 1}. ${pelanggan.nama}</h3>
            <p><strong>Nomor Telepon:</strong> ${pelanggan.nomorTelepon}</p>
            <h4>Detail Sewa:</h4>
            ${pelanggan.getDetailSewaHTML()}
        `;
        daftarPelangganEl.appendChild(div);
    });
}

// --- BAGIAN 4: INISIASI DATA DAN EKSEKUSI ---

document.addEventListener('DOMContentLoaded', () => {
    appendToOutput("--- SISTEM DIMULAI ---", 'heading');

    // 1. Inisiasi Kendaraan
    const mobilA = new Mobil("Toyota Avanza", 2022, 4);
    const motorB = new Motor("Honda Vario", 2021, "Matic");
    const mobilC = new Mobil("Suzuki Ertiga", 2020, 5);

    // 2. Inisiasi Pelanggan
    const p1 = new Pelanggan("Budi Santoso", "0812xxxx789");
    const p2 = new Pelanggan("Citra Dewi", "0876xxxx100");

    // 3. Mencatat Transaksi Penyewaan
    appendToOutput("--- PROSES PENCATATAN TRANSAKSI ---", 'heading');
    p1.catatPenyewaan(mobilA, 3); 
    tambahkanPelangganAktif(p1);

    p2.catatPenyewaan(motorB, 5);
    p2.catatPenyewaan(mobilC, 2);
    tambahkanPelangganAktif(p2);

    // 4. Menampilkan Daftar Pelanggan Aktif
    tampilkanDaftarPelangganAktif();
});