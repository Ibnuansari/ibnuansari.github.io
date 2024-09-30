document.addEventListener('DOMContentLoaded', function() {
    
    // Mengambil elemen dengan kelas 'hamburger-menu' dan 'nav-links'
    const hamburger = document.querySelector('.hamburger-menu');
    const navLinks = document.querySelector('.nav-links');

    // Menambahkan event listener untuk 'click' pada elemen hamburger
    hamburger.addEventListener('click', function() {
        
        // Mengaktifkan atau menonaktifkan kelas 'active' pada elemen navLinks dan hamburger
        navLinks.classList.toggle('active');
        hamburger.classList.toggle('active');
    });
});

// Mengambil elemen dengan id 'dark-mode-toggle'
const darkModeToggle = document.getElementById('dark-mode-toggle');

// Mengecek dark mode diaktifkan
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
}

// Menambahkan event listener untuk 'click' pada elemen darkModeToggle
darkModeToggle.addEventListener('click', function() {
    
    // Mengaktifkan atau menonaktifkan mode gelap pada body
    document.body.classList.toggle('dark-mode');

    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
    } 
    
    else {
        localStorage.setItem('darkMode', 'disabled');
    }
});

// Menambahkan event listener untuk 'click' pada elemen dengan id 'tentang-link'
document.getElementById('tentang-link').addEventListener('click', function(event) {
    
    event.preventDefault();

    var popupconfirm = confirm("Apakah Anda ingin masuk ke halaman Tentang ?");
    
    if (popupconfirm === true) {
        window.location.href = "tentang.html";
    } else {
    }
});
