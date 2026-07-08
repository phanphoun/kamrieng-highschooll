<footer class="bg-slate-900 text-slate-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- School Info -->
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">ក</span>
                    </div>
                    <div>
                        <p class="font-bold text-white">{{ $siteSettings?->school_name_en ?? 'EduKhmer High School' }}</p>
                        <p class="text-sm text-slate-400">{{ $siteSettings?->school_name_kh ?? 'វិទ្យាស្ថានរដ្ឋបាល' }}</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm text-slate-400">
                    @if($siteSettings?->address_en)
                        <p class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $siteSettings->address_en }}
                        </p>
                    @endif
                    @if($siteSettings?->phone)
                        <p class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            {{ $siteSettings->phone }}
                        </p>
                    @endif
                    @if($siteSettings?->email)
                        <p class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 002 2v10a2 2 0 002 2z"/></svg>
                            {{ $siteSettings->email }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-yellow-400 font-semibold mb-4">{{ __('navigation.quick_links') }}</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">{{ __('navigation.about') }}</a></li>
                    <li><a href="{{ route('news.index') }}" class="hover:text-white transition">{{ __('navigation.news') }}</a></li>
                    <li><a href="{{ route('activities.index') }}" class="hover:text-white transition">{{ __('navigation.activities') }}</a></li>
                    <li><a href="{{ route('calendar.index') }}" class="hover:text-white transition">{{ __('navigation.calendar') }}</a></li>
                    <li><a href="{{ route('enrollment.apply') }}" class="hover:text-white transition">{{ __('navigation.enrollment') }}</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">{{ __('navigation.contact') }}</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div>
                <h3 class="text-yellow-400 font-semibold mb-4">{{ __('navigation.resources') }}</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('downloads.index') }}" class="hover:text-white transition">{{ __('navigation.downloads') }}</a></li>
                    <li><a href="{{ route('gallery.index') }}" class="hover:text-white transition">{{ __('navigation.gallery') }}</a></li>
                    <li><a href="{{ route('faculty.index') }}" class="hover:text-white transition">{{ __('navigation.faculty') }}</a></li>
                    <li><a href="{{ route('notices.index') }}" class="hover:text-white transition">{{ __('navigation.notices') }}</a></li>
                    <li><a href="{{ route('sitemap') }}" class="hover:text-white transition">{{ __('navigation.sitemap') }}</a></li>
                </ul>
            </div>
        </div>

        <!-- Social & Copyright -->
        <div class="border-t border-slate-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
            <div class="flex space-x-4 mb-4 md:mb-0">
                @if($siteSettings?->facebook_url)
                    <a href="{{ $siteSettings->facebook_url }}" target="_blank" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-yellow-400 hover:text-slate-900 transition text-slate-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                @endif
                @if($siteSettings?->youtube_url)
                    <a href="{{ $siteSettings->youtube_url }}" target="_blank" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-yellow-400 hover:text-slate-900 transition text-slate-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                @endif
                @if($siteSettings?->telegram_url)
                    <a href="{{ $siteSettings->telegram_url }}" target="_blank" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-yellow-400 hover:text-slate-900 transition text-slate-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 000 12a12 12 0 0012 12 12 12 0 0012-12A12 12 0 0012 0a12 12 0 00-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 01.171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
                    </a>
                @endif
            </div>
            <p class="text-sm text-slate-500">
                &copy; {{ date('Y') }} {{ $siteSettings?->school_name_en ?? 'EduKhmer High School' }}. {{ __('messages.all_rights_reserved') }}
            </p>
        </div>
    </div>
</footer>
