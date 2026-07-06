@props([
    'query' => '',
])

<nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-white/80 backdrop-blur-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Row 1: Logo + Nav Links + CTAs -->
        <div class="flex h-20 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" class="flex items-center gap-2.5">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-gradient-to-br from-blue-600 to-indigo-700 text-sm font-bold text-white shadow-sm">
                        KH
                    </div>
                    <div class="hidden sm:block">
                        <span class="lang-km text-sm font-semibold text-slate-800">វិទ្យាល័យកំរៀង</span>
                        <span class="lang-en text-sm font-semibold text-slate-800">Kamrieng High School</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Nav Links + Search -->
            <div class="hidden lg:flex lg:items-center lg:gap-1">
                <a href="{{ url('/') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100 hover:text-slate-900">
                    <span class="lang-km">ទំព័រដើម</span>
                    <span class="lang-en">Home</span>
                </a>
                <a href="{{ url('/about') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100 hover:text-slate-900">
                    <span class="lang-km">អំពីសាលា</span>
                    <span class="lang-en">About</span>
                </a>
                <a href="{{ url('/news') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100 hover:text-slate-900">
                    <span class="lang-km">ព័ត៌មាន</span>
                    <span class="lang-en">News</span>
                </a>
                <a href="{{ url('/activities') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100 hover:text-slate-900">
                    <span class="lang-km">សកម្មភាព</span>
                    <span class="lang-en">Activities</span>
                </a>
                <a href="{{ url('/achievements') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100 hover:text-slate-900">
                    <span class="lang-km">សមិទ្ធផល</span>
                    <span class="lang-en">Achievements</span>
                </a>
                <a href="{{ url('/gallery') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100 hover:text-slate-900">
                    <span class="lang-km">វិចិត្រសាល</span>
                    <span class="lang-en">Gallery</span>
                </a>
                <a href="{{ url('/calendar') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100 hover:text-slate-900">
                    <span class="lang-km">ប្រតិទិន</span>
                    <span class="lang-en">Calendar</span>
                </a>

            </div>

            <!-- Right side: Search Icon + Lang Toggle + Enroll + Mobile toggles -->
            <div class="flex items-center gap-2">

                <!-- Desktop Search Icon (expands to input) -->
                <div class="relative hidden lg:block">
                    <button
                        id="desktop-search-toggle"
                        onclick="toggleDesktopSearch()"
                        class="inline-flex items-center justify-center rounded-lg p-2 text-slate-500 transition-all duration-200 hover:bg-slate-100 hover:text-slate-700"
                        aria-label="Toggle search"
                        title="Search"
                    >
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>

                    <!-- Expanded Search Bar (hidden by default) -->
                    <div id="desktop-search-expand" class="hidden absolute right-0 top-full mt-2 w-72">
                        <form action="{{ route('search') }}" method="GET" class="relative">
                            <div class="relative flex items-center rounded-lg border border-slate-200 bg-white shadow-lg ring-1 ring-slate-900/5">
                                <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                <input
                                    type="text"
                                    name="q"
                                    value="{{ $query }}"
                                    placeholder="Search news, activities..."
                                    class="w-full rounded-lg border-0 py-2.5 pl-10 pr-4 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                    autocomplete="off"
                                />
                                <div class="flex items-center pr-2">
                                    <button
                                        type="submit"
                                        class="inline-flex items-center rounded-md bg-blue-600 px-3 py-1.5 text-xs font-medium text-white transition-colors hover:bg-blue-500"
                                    >
                                        <span class="lang-km">ស្វែងរក</span>
                                        <span class="lang-en">Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Language Toggle -->
                <button
                    id="lang-toggle"
                    onclick="toggleLanguage()"
                    class="inline-flex items-center gap-1 rounded-lg border border-slate-200 bg-white p-1 text-xs font-medium shadow-sm transition-all duration-200 hover:border-slate-300 hover:shadow"
                    aria-label="Toggle language"
                    title="Toggle Khmer / English"
                >
                    <span class="lang-toggle-km active inline-flex items-center gap-1 rounded-md px-2 py-1 text-slate-600 transition-colors">
                        <span class="text-sm">🇰🇭</span>
                        <span class="lang-toggle-km-text font-semibold">ខ្មែរ</span>
                    </span>
                    <span class="lang-toggle-en inline-flex items-center gap-1 rounded-md px-2 py-1 text-slate-400 transition-colors">
                        <span class="text-sm">🇺🇸</span>
                        <span class="lang-toggle-en-text">EN</span>
                    </span>
                </button>

                <!-- Enroll Now -->
                <a href="{{ url('/enroll') }}" class="hidden lg:inline-flex items-center gap-1.5 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-blue-700 hover:shadow-md">
                    <span class="lang-km">ចុះឈ្មោះ</span>
                    <span class="lang-en">Enroll</span>
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>

                <!-- Mobile Search Toggle -->
                <button onclick="toggleMobileSearch()"
                    class="lg:hidden inline-flex items-center justify-center rounded-lg p-2 text-slate-500 transition-colors hover:bg-slate-100 hover:text-slate-700"
                    aria-label="Toggle search"
                >
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>

                <!-- Mobile Menu Toggle -->
                <button onclick="toggleMobileMenu()"
                    class="lg:hidden inline-flex items-center justify-center rounded-lg p-2 text-slate-500 transition-colors hover:bg-slate-100 hover:text-slate-700"
                    aria-label="Toggle menu"
                >
                    <svg id="menu-icon-open" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg id="menu-icon-close" class="hidden h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>


    </div>

    <!-- Mobile Search Panel -->
    <div id="mobile-search" class="hidden border-t border-slate-200 bg-white px-4 pb-4 pt-3 lg:hidden">
        <form action="{{ route('search') }}" method="GET" class="relative">
            <div class="relative flex">
                <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input
                    type="text"
                    name="q"
                    value="{{ $query }}"
                    placeholder="Search news, activities, achievements..."
                    class="w-full rounded-lg border border-slate-200 bg-white py-2.5 pl-9 pr-28 text-sm text-slate-700 placeholder-slate-400 transition-all duration-200 focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 focus:outline-none"
                    autocomplete="off"
                />
                <button
                    type="submit"
                    class="absolute right-1 top-1/2 -translate-y-1/2 inline-flex items-center gap-1 rounded-md bg-blue-600 px-3 py-1.5 text-xs font-medium text-white shadow-sm transition-all duration-200 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
                    <svg class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <span class="lang-km">ស្វែងរក</span>
                    <span class="lang-en">Search</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Mobile Menu Panel -->
    <div id="mobile-menu" class="hidden border-t border-slate-200 bg-white px-4 pb-4 pt-2 lg:hidden">
        <div class="flex flex-col gap-0.5">
            <a href="{{ url('/') }}" class="rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100">
                <span class="lang-km">ទំព័រដើម</span><span class="lang-en">Home</span>
            </a>
            <a href="{{ url('/about') }}" class="rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100">
                <span class="lang-km">អំពីសាលា</span><span class="lang-en">About</span>
            </a>
            <a href="{{ url('/news') }}" class="rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100">
                <span class="lang-km">ព័ត៌មាន</span><span class="lang-en">News</span>
            </a>
            <a href="{{ url('/activities') }}" class="rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100">
                <span class="lang-km">សកម្មភាព</span><span class="lang-en">Activities</span>
            </a>
            <a href="{{ url('/achievements') }}" class="rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100">
                <span class="lang-km">សមិទ្ធផល</span><span class="lang-en">Achievements</span>
            </a>
            <a href="{{ url('/gallery') }}" class="rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100">
                <span class="lang-km">វិចិត្រសាល</span><span class="lang-en">Gallery</span>
            </a>
            <a href="{{ url('/calendar') }}" class="rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100">
                <span class="lang-km">ប្រតិទិន</span><span class="lang-en">Calendar</span>
            </a>
            <div class="mt-2 border-t border-slate-100 pt-2">
                <a href="{{ url('/enroll') }}" class="inline-flex w-full items-center justify-center gap-1.5 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-blue-700">
                    <span class="lang-km">ចុះឈ្មោះ</span><span class="lang-en">Enroll Now</span>
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Spacer to offset fixed navbar height (h-20 = 80px on mobile and desktop since search is now inline) -->
<div id="navbar-spacer" class="h-20"></div>

<script>
// Scroll effect for navbar
function updateNavbarScroll() {
    var nav = document.getElementById('main-navbar');
    if (window.scrollY > 20) {
        nav.classList.add('bg-white/95', 'shadow-sm', 'backdrop-blur-md', 'border-b', 'border-slate-200');
        nav.classList.remove('bg-white/80', 'backdrop-blur-sm');
    } else {
        nav.classList.remove('bg-white/95', 'shadow-sm', 'backdrop-blur-md', 'border-b', 'border-slate-200');
        nav.classList.add('bg-white/80', 'backdrop-blur-sm');
    }
}
window.addEventListener('scroll', updateNavbarScroll);
updateNavbarScroll(); // Run on page load

// Desktop search toggle
function toggleDesktopSearch() {
    var panel = document.getElementById('desktop-search-expand');
    var isHidden = panel.classList.contains('hidden');
    panel.classList.toggle('hidden');
    if (isHidden) {
        // Focus the input when opening
        setTimeout(function() {
            var input = panel.querySelector('input[name="q"]');
            if (input) input.focus();
        }, 100);
    }
}

// Close desktop search when clicking outside
document.addEventListener('click', function(e) {
    var container = document.getElementById('desktop-search-toggle').parentNode;
    if (!container.contains(e.target)) {
        var panel = document.getElementById('desktop-search-expand');
        if (panel && !panel.classList.contains('hidden')) {
            panel.classList.add('hidden');
        }
    }
});

// Mobile search toggle
function toggleMobileSearch() {
    var search = document.getElementById('mobile-search');
    search.classList.toggle('hidden');
}

// Mobile menu toggle
function toggleMobileMenu() {
    var menu = document.getElementById('mobile-menu');
    var iconOpen = document.getElementById('menu-icon-open');
    var iconClose = document.getElementById('menu-icon-close');
    var isHidden = menu.classList.contains('hidden');
    menu.classList.toggle('hidden');
    iconOpen.classList.toggle('hidden');
    iconClose.classList.toggle('hidden');
}
</script>
