import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Initialize Alpine
Alpine.start();

// Hero carousel autoplay plugin
document.addEventListener('alpine:init', () => {
    Alpine.magic('nextTick', () => Alpine.nextTick);

    Alpine.data('heroCarousel', () => ({
        init() {
            this.startAutoplay();
        },
        startAutoplay() {
            this.$watch('current', () => this.reset());
            this.reset();
        },
        reset() {
            clearTimeout(this._timer);
            this._timer = setTimeout(() => this.next(), 5000);
        },
        next() {
            this.current = (this.current + 1) % this.slides.length;
        },
        prev() {
            this.current = (this.current - 1 + this.slides.length) % this.slides.length;
        },
    }));
});

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
