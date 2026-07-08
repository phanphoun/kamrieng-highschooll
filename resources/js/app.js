import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Initialize Alpine
Alpine.start();



// Chart.js (if needed on dashboard)
import Chart from 'chart.js/auto';

// TinyMCE rich text editor
// import tinymce from 'tinymce';

// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function () {
    // Initialize any custom JS here

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
});
