// Dark mode toggle
const toggleSwitch = document.getElementById('dark-mode-toggle');
const icon = document.getElementById('dark-mode-icon');

// Cek preferensi dark mode pengguna saat halaman dimuat
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
    icon.classList.remove('fa-moon');
    icon.classList.add('fa-sun'); // Ubah ke ikon matahari
} else {
    icon.classList.remove('fa-sun');
    icon.classList.add('fa-moon'); // Ubah ke ikon bulan
}

// Fungsi untuk mengganti mode dan menyimpan preferensi pengguna
toggleSwitch.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');

    // Periksa jika dark mode aktif dan simpan preferensi
    if (document.body.classList.contains('dark-mode')) {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun'); 
        localStorage.setItem('darkMode', 'enabled');
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon'); 
        localStorage.setItem('darkMode', 'disabled');
    }
});

// Hamburger menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger-menu');
    const navLinks = document.querySelector('.nav-links');

    // Event listener untuk hamburger menu
    hamburger.addEventListener('click', function() {
        navLinks.classList.toggle('active');
        hamburger.classList.toggle('active');
    });
});

// Konfirmasi link Tentang
document.getElementById('tentang-link').addEventListener('click', function(event) {
    event.preventDefault();
    var popupconfirm = confirm("Apakah Anda ingin masuk ke halaman Tentang?");
    if (popupconfirm === true) {
        window.location.href = "tentang.html";
    }
});

// Popup untuk login
document.getElementById('login').addEventListener('click', function (event) {
    event.preventDefault(); // Mencegah aksi default
    alert('Anda telah berhasil login!');
    // Redirect ke halaman login
    window.location.href = "login.php";
});

// Popup untuk logout
document.getElementById('logout').addEventListener('click', function (event) {
    event.preventDefault(); // Mencegah aksi default
    let confirmLogout = confirm('Apakah Anda yakin ingin logout?');
    if (confirmLogout) {
        alert('Anda telah berhasil logout!');
        // Redirect ke halaman logout
        window.location.href = "logout.php";
    }
});
