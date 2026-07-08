<nav x-data="{ mobileOpen: false, moreOpen: false, scrolled: false }"
     x-init="scrolled = window.scrollY > 20"
     @scroll.window="scrolled = window.scrollY > 20"
     :class="scrolled ? 'shadow-lg h-20' : 'h-24'"
     class="sticky top-0 z-50 bg-school-navy text-white transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
        <div class="flex items-center justify-between h-full">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-12 h-12 bg-school-gold rounded-xl flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform duration-300">
                    <span class="text-white font-bold text-xl">ក</span>
                </div>
                <div>
                    <p class="font-extrabold text-school-gold text-lg leading-tight">{{ $siteSettings?->school_name_en ?? 'EduKhmer' }}</p>
                    <p class="text-school-muted text-base leading-tight">High School</p>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-8">
                <a href="{{ route('home') }}" class="relative text-base font-bold transition {{ request()->routeIs('home') ? 'text-school-gold' : 'text-school-muted hover:text-white' }}">
                    {{ __('navigation.home') }}
                    @if(request()->routeIs('home'))
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    @endif
                </a>
                <a href="{{ route('about') }}" class="relative text-base font-bold transition {{ request()->routeIs('about') ? 'text-school-gold' : 'text-school-muted hover:text-white' }}">
                    {{ __('navigation.about') }}
                    @if(request()->routeIs('about'))
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    @endif
                </a>
                <a href="{{ route('news.index') }}" class="relative text-base font-bold transition {{ request()->routeIs('news.*') ? 'text-school-gold' : 'text-school-muted hover:text-white' }}">
                    {{ __('navigation.news') }}
                    @if(request()->routeIs('news.*'))
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    @endif
                </a>
                <a href="{{ route('activities.index') }}" class="relative text-base font-bold transition {{ request()->routeIs('activities.*') ? 'text-school-gold' : 'text-school-muted hover:text-white' }}">
                    {{ __('navigation.activities') }}
                    @if(request()->routeIs('activities.*'))
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    @endif
                </a>
                <a href="{{ route('achievements.index') }}" class="relative text-base font-bold transition {{ request()->routeIs('achievements.*') ? 'text-school-gold' : 'text-school-muted hover:text-white' }}">
                    {{ __('navigation.achievements') }}
                    @if(request()->routeIs('achievements.*'))
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    @endif
                </a>
                <a href="{{ route('gallery.index') }}" class="relative text-base font-bold transition {{ request()->routeIs('gallery.*') ? 'text-school-gold' : 'text-school-muted hover:text-white' }}">
                    {{ __('navigation.gallery') }}
                    @if(request()->routeIs('gallery.*'))
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    @endif
                </a>
                <a href="{{ route('calendar.index') }}" class="relative text-base font-bold transition {{ request()->routeIs('calendar.*') ? 'text-school-gold' : 'text-school-muted hover:text-white' }}">
                    {{ __('navigation.calendar') }}
                    @if(request()->routeIs('calendar.*'))
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    @endif
                </a>

                <div class="relative" x-data="{ open: false }">
                    <button type="button" @click="open = !open" class="inline-flex items-center gap-1 text-base font-bold text-school-muted hover:text-white transition">
                        {{ __('navigation.more') }}
                        <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" class="absolute right-0 mt-4 w-48 rounded-xl bg-white py-2 text-slate-700 shadow-xl border border-slate-100" style="display: none;">
                        <a href="{{ route('downloads.index') }}" class="block px-4 py-2.5 text-sm font-semibold hover:bg-slate-50 hover:text-school-blue transition">{{ __('navigation.downloads') }}</a>
                        <a href="{{ route('faculty.index') }}" class="block px-4 py-2.5 text-sm font-semibold hover:bg-slate-50 hover:text-school-blue transition">{{ __('navigation.faculty') }}</a>
                        <a href="{{ route('notices.index') }}" class="block px-4 py-2.5 text-sm font-semibold hover:bg-slate-50 hover:text-school-blue transition">{{ __('navigation.notices') }}</a>
                        <a href="{{ route('contact') }}" class="block px-4 py-2.5 text-sm font-semibold hover:bg-slate-50 hover:text-school-blue transition">{{ __('navigation.contact') }}</a>
                    </div>
                </div>
            </div>

            <div class="hidden lg:flex items-center gap-4">
                <a href="{{ route('search') }}" class="text-school-muted hover:text-white transition" aria-label="Search">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5.2-5.2m1.7-5.3a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </a>
                <a href="{{ route('language.switch', app()->getLocale() === 'kh' ? 'en' : 'kh') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-school-gold/60 text-school-gold text-sm font-bold hover:bg-school-gold hover:text-school-navy transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3a9 9 0 100 18 9 9 0 000-18zM3 12h18M12 3c2.25 2.45 3.4 5.45 3.4 9s-1.15 6.55-3.4 9c-2.25-2.45-3.4-5.45-3.4-9S9.75 5.45 12 3z"/>
                    </svg>
                    {{ app()->getLocale() === 'kh' ? 'EN' : 'ខ្មែរ' }}
                </a>
                <a href="{{ route('enrollment.apply') }}" class="px-6 py-3 rounded-full bg-school-blue text-white text-sm font-extrabold hover:bg-school-blue-hover transition shadow-md hover:shadow-lg hover:-translate-y-0.5">
                    Enroll Now
                </a>
            </div>

            <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-lg text-school-muted hover:text-white hover:bg-white/10" aria-label="Toggle navigation">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': mobileOpen, 'block': !mobileOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'block': mobileOpen, 'hidden': !mobileOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div x-show="mobileOpen" @click.away="mobileOpen = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="lg:hidden border-t border-white/10 bg-school-navy/98 backdrop-blur-md" style="display: none;">
        <div class="px-4 py-4 space-y-1">
            <x-ui.mobile-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">{{ __('navigation.home') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">{{ __('navigation.about') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('news.index') }}" :active="request()->routeIs('news.*')">{{ __('navigation.news') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('activities.index') }}" :active="request()->routeIs('activities.*')">{{ __('navigation.activities') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('achievements.index') }}" :active="request()->routeIs('achievements.*')">{{ __('navigation.achievements') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('gallery.index') }}" :active="request()->routeIs('gallery.*')">{{ __('navigation.gallery') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('calendar.index') }}" :active="request()->routeIs('calendar.*')">{{ __('navigation.calendar') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('downloads.index') }}">{{ __('navigation.downloads') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('faculty.index') }}">{{ __('navigation.faculty') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('notices.index') }}">{{ __('navigation.notices') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('contact') }}">{{ __('navigation.contact') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('enrollment.apply') }}">Enroll Now</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('language.switch', app()->getLocale() === 'kh' ? 'en' : 'kh') }}">{{ app()->getLocale() === 'kh' ? 'English' : 'ភាសាខ្មែរ' }}</x-ui.mobile-nav-link>
        </div>
    </div>
</nav>
