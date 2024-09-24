document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger-menu');
    const navLinks = document.querySelector('.nav-links');

    hamburger.addEventListener('click', function() {
        navLinks.classList.toggle('active');
        hamburger.classList.toggle('active');
    });
});

const darkModeToggle = document.getElementById('dark-mode-toggle');
// Check if dark mode is already enabled in localStorage
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
}

// Add event listener to the toggle button
darkModeToggle.addEventListener('click', function() {
    // Toggle the 'dark-mode' class on the body element
    document.body.classList.toggle('dark-mode');

    // Store the user's preference in localStorage
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
    } else {
        localStorage.setItem('darkMode', 'disabled');
    }
});