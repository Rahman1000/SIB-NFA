// controller.mjs
import users from "./data.js"; // Import data dari data.mjs

// Utility function untuk menampilkan output ke DOM
const appendToLog = (message, className = 'info') => {
    const logEl = document.getElementById('log');
    if (logEl) {
        const p = document.createElement('p');
        p.className = className;
        p.innerHTML = message;
        logEl.appendChild(p);
        logEl.scrollTop = logEl.scrollHeight;
    } else {
        console.log(message);
    }
};

/**
 * Melihat/Menampilkan data menggunakan map().
 * @returns {string} String HTML dari daftar pengguna.
 */
const index = () => {
    appendToLog(`[INDEX] Menampilkan ${users.length} data awal:`, 'heading');
    
    // Menggunakan map() untuk membuat array string HTML
    const listHTML = users.map((user, index) => {
        return `
            <li>
                <strong>${index + 1}. ${user.nama}</strong> | Umur: ${user.umur} | Alamat: ${user.alamat} | Email: ${user.email}
            </li>
        `;
    }).join(''); // Menggabungkan array menjadi satu string

    const listEl = document.getElementById('daftarPengguna');
    if (listEl) {
        listEl.innerHTML = `<ul>${listHTML}</ul>`;
    }
    return users;
};

/**
 * Menambah data (Create).
 * @param {object} user - Objek pengguna baru.
 */
const store = (user) => {
    users.push(user);
    appendToLog(`[STORE] Data ${user.nama} berhasil ditambahkan. Jumlah data: ${users.length}`, 'success');
};

/**
 * Menghapus data terakhir (Destroy).
 */
const destroy = () => {
    const removedUser = users.pop(); // Menghapus data terakhir
    if (removedUser) {
        appendToLog(`[DESTROY] Data ${removedUser.nama} berhasil dihapus. Jumlah data: ${users.length}`, 'error');
    } else {
        appendToLog(`[DESTROY] Gagal menghapus: Array kosong.`, 'error');
    }
};

export { index, store, destroy };