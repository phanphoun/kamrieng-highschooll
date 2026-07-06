/**
 * Language Switcher for Kamrieng High School
 * Toggles between Khmer (km) and English (en) display.
 * Persists preference in localStorage.
 */
(function () {
    'use strict';

    const STORAGE_KEY = 'kamrieng_lang';
    const HTML_ATTR = 'data-lang';

    function getStoredLanguage() {
        return localStorage.getItem(STORAGE_KEY) || 'km';
    }
    function setActiveLanguage(lang) {
        document.documentElement.setAttribute(HTML_ATTR, lang);
        localStorage.setItem(STORAGE_KEY, lang);
        // Update toggle button state
        const btn = document.getElementById('lang-toggle');
        if (btn) {
            const kmSpan = btn.querySelector('.lang-toggle-km');
            const enSpan = btn.querySelector('.lang-toggle-en');
            if (kmSpan && enSpan) {
                kmSpan.classList.toggle('active', lang === 'km');
                enSpan.classList.toggle('active', lang === 'en');
            }
        }
    }
    function toggleLanguage() {
        const current = document.documentElement.getAttribute(HTML_ATTR) || 'km';
        const next = current === 'km' ? 'en' : 'km';
        setActiveLanguage(next);
    }
    // Expose toggle function globally
    window.toggleLanguage = toggleLanguage;

    // Apply stored language on page load
    document.addEventListener('DOMContentLoaded', function () {
        let savedLang = getStoredLanguage();
        // Validate
        if (savedLang !== 'km' && savedLang !== 'en') {
            savedLang = 'km';
        }
        setActiveLanguage(savedLang);
    });
})();
