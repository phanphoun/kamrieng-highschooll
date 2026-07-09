<footer class="bg-school-navy text-school-muted">
    <div class="bg-gradient-to-r from-school-blue to-sky-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-12">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                <div class="max-w-xl">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white">Begin Your Journey</h2>
                    <p class="mt-3 text-lg text-white/90">Join our community of excellence and build your future</p>
                </div>
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('enrollment.apply') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-white text-school-blue text-base font-extrabold hover:bg-slate-50 transition shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        Apply Now
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-3.5 rounded-xl border-2 border-white text-white text-base font-extrabold hover:bg-white/10 transition">
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-18">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-8">
            <div class="lg:col-span-1">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group mb-5">
                    <div class="w-12 h-12 bg-school-gold rounded-xl flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform duration-300">
                        <span class="text-school-navy font-bold text-xl">ក</span>
                    </div>
                    <div>
                        <p class="font-extrabold text-school-gold text-lg leading-tight">{{ $siteSettings?->school_name_en ?? 'EduKhmer' }}</p>
                        <p class="text-school-muted text-base leading-tight">High School</p>
                    </div>
                </a>
                <p class="text-base leading-relaxed mb-6">Committed to academic excellence and the holistic development of every student in our care.</p>
                <div class="flex items-center gap-3">
                    <a href="#" class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-school-muted hover:text-white hover:bg-school-gold hover:border-school-gold transition" aria-label="Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-school-muted hover:text-white hover:bg-school-gold hover:border-school-gold transition" aria-label="YouTube">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-school-muted hover:text-white hover:bg-school-gold hover:border-school-gold transition" aria-label="Twitter">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-school-gold font-extrabold text-base uppercase tracking-wide mb-5">{{ __('navigation.quick_links') }}</h3>
                <ul class="space-y-3 text-base">
                    <li><a href="{{ route('about') }}" class="hover:text-school-gold transition">About School</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-school-gold transition">Leadership</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-school-gold transition">Academic Programs</a></li>
                    <li><a href="{{ route('news.index') }}" class="hover:text-school-gold transition">{{ __('navigation.news') }}</a></li>
                    <li><a href="{{ route('activities.index') }}" class="hover:text-school-gold transition">{{ __('navigation.activities') }}</a></li>
                    <li><a href="{{ route('achievements.index') }}" class="hover:text-school-gold transition">{{ __('navigation.achievements') }}</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-school-gold font-extrabold text-base uppercase tracking-wide mb-5">{{ __('navigation.resources') }}</h3>
                <ul class="space-y-3 text-base">
                    <li><a href="{{ route('gallery.index') }}" class="hover:text-school-gold transition">{{ __('navigation.gallery') }}</a></li>
                    <li><a href="{{ route('downloads.index') }}" class="hover:text-school-gold transition">{{ __('navigation.downloads') }}</a></li>
                    <li><a href="{{ route('calendar.index') }}" class="hover:text-school-gold transition">School Calendar</a></li>
                    <li><a href="{{ route('enrollment.apply') }}" class="hover:text-school-gold transition">{{ __('navigation.enrollment') }}</a></li>
                    <li><a href="{{ route('faculty.index') }}" class="hover:text-school-gold transition">{{ __('navigation.faculty') }}</a></li>
                    <li><a href="{{ route('search') }}" class="hover:text-school-gold transition">{{ __('navigation.search') }}</a></li>
                    <li><a href="{{ route('sitemap') }}" class="hover:text-school-gold transition">{{ __('navigation.sitemap') }}</a></li>
                    <li>
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-school-gold hover:text-white transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                            {{ __('navigation.contact') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-school-gold font-extrabold text-base uppercase tracking-wide mb-5">Contact Us</h3>
                <ul class="space-y-4 text-base">
                    <li class="flex items-start gap-3">
                        <span class="w-9 h-9 mt-0.5 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-school-gold shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </span>
                        <span>{{ $siteSettings?->address_en ?? 'Phnom Penh, Cambodia' }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-9 h-9 mt-0.5 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-school-gold shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </span>
                        <span>{{ $siteSettings?->phone ?? '+855 23 000 000' }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-9 h-9 mt-0.5 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-school-gold shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </span>
                        <span>{{ $siteSettings?->email ?? 'info@school.edu.kh' }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <p class="text-sm">&copy; {{ date('Y') }} {{ $siteSettings?->school_name_en ?? 'EduKhmer High School' }}. {{ __('messages.all_rights_reserved') }}</p>
                <div class="flex flex-wrap items-center gap-6">
                    <a href="#" class="text-sm hover:text-school-gold transition">Privacy Policy</a>
                    <a href="#" class="text-sm hover:text-school-gold transition">Careers</a>
                    <a href="{{ route('login') }}" class="text-sm hover:text-school-gold transition">Admin</a>
                    <a href="{{ route('language.switch', app()->getLocale() === 'kh' ? 'en' : 'kh') }}" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/20 text-sm font-bold hover:bg-white/5 transition">
                        <span class="w-5 h-5 rounded-full bg-school-gold flex items-center justify-center"></span>
                        {{ app()->getLocale() === 'kh' ? 'EN' : 'ខ្មែរ' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
