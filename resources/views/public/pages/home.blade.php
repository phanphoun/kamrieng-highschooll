@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Banner with Enhanced Carousel -->
    <section x-data="{
        current: 0,
        slides: {{ json_encode($heroSlides ?? collect()) }},
        locale: '{{ app()->getLocale() }}',
        autoplayInterval: null,
        isPaused: false,
        progress: 0,
        autoplayDuration: 5000,

        init() {
            if (this.slides.length > 1) {
                this.startAutoplay();
            }
        },

        startAutoplay() {
            this.clearAutoplay();
            this.progress = 0;
            const step = 100 / (this.autoplayDuration / 50);
            this.autoplayInterval = setInterval(() => {
                if (!this.isPaused) {
                    this.progress += step;
                    if (this.progress >= 100) {
                        this.progress = 0;
                        this.next();
                    }
                }
            }, 50);
        },

        clearAutoplay() {
            if (this.autoplayInterval) {
                clearInterval(this.autoplayInterval);
                this.autoplayInterval = null;
            }
        },

        next() {
            this.current = (this.current + 1) % this.slides.length;
            this.progress = 0;
        },

        prev() {
            this.current = (this.current - 1 + this.slides.length) % this.slides.length;
            this.progress = 0;
        },

        goTo(idx) {
            this.current = idx;
            this.progress = 0;
        },

        pause() {
            this.isPaused = true;
        },

        resume() {
            this.isPaused = false;
        },

        destroy() {
            this.clearAutoplay();
        }
    }"
    @mouseenter="pause()" @mouseleave="resume()"
    class="relative bg-slate-900 text-white overflow-hidden min-h-[70vh] md:min-h-screen">

        <!-- Background Slides with Ken Burns Effect -->
        <template x-if="slides.length">
            <div class="absolute inset-0">
                <template x-for="(slide, idx) in slides" :key="slide.id">
                    <div x-show="idx === current" class="absolute inset-0">
                        <div class="absolute inset-0 animate-ken-burns">
                            <img
                                :src="slide.image_path ? '{{ asset('storage') }}/' + slide.image_path : 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=1600&q=80'"
                                onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=1600&q=80'"
                                alt="Hero"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/70 to-slate-900/30"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
                    </div>
                </template>
            </div>
        </template>

        <!-- Empty state when no slides -->
        <div x-show="!slides.length" class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=1600&q=80" alt="School" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/70 to-slate-900/30"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-32 md:pt-48 md:pb-40">
            <div class="max-w-2xl">
                <template x-if="slides.length">
                    <div>
                        <!-- Slide indicator badge -->
                        <div x-show="slides.length > 1" class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-xs font-medium text-yellow-300 mb-8 border border-white/10">
                            <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full animate-pulse"></span>
                            <span x-text="'Slide ' + (current + 1) + ' of ' + slides.length"></span>
                        </div>

                        <!-- Animated Content Wrapper (recreates on slide change to replay transitions) -->
                        <div :key="current">
                            <!-- Title with entrance animation -->
                            <div class="mb-4"
                                 x-transition:enter="transition ease-out duration-500"
                                 x-transition:enter-start="opacity-0 translate-y-8"
                                 x-transition:enter-end="opacity-100 translate-y-0">
                                <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold leading-tight">
                                    <span class="text-white" x-text="locale === 'kh' && slides[current].title_kh ? slides[current].title_kh : slides[current].title_en"></span>
                                </h1>
                            </div>

                            <!-- Subtitle with accent -->
                            <div class="flex items-center gap-4 mb-6"
                                 x-transition:enter="transition ease-out duration-500 delay-150"
                                 x-transition:enter-start="opacity-0 translate-y-6"
                                 x-transition:enter-end="opacity-100 translate-y-0">
                                <span class="block h-0.5 w-12 bg-yellow-400"></span>
                                <h2 class="text-xl md:text-3xl font-bold text-yellow-400"
                                    x-text="locale === 'kh' && slides[current].subtitle_kh ? slides[current].subtitle_kh : slides[current].subtitle_en"></h2>
                            </div>

                            <!-- Description -->
                            <p class="text-base md:text-lg text-slate-200 mb-10 max-w-xl leading-relaxed"
                               x-transition:enter="transition ease-out duration-500 delay-300"
                               x-transition:enter-start="opacity-0 translate-y-6"
                               x-transition:enter-end="opacity-100 translate-y-0"
                               x-text="locale === 'kh' && slides[current].description_kh ? slides[current].description_kh : slides[current].description_en"></p>

                            <!-- CTA Button with hover effect -->
                            <div x-transition:enter="transition ease-out duration-500 delay-450"
                                 x-transition:enter-start="opacity-0 translate-y-6"
                                 x-transition:enter-end="opacity-100 translate-y-0">
                                <a :href="slides[current].btn_link || '#'"
                                   class="group inline-flex items-center gap-3 px-8 py-4 bg-yellow-400 text-slate-900 font-bold rounded-full hover:bg-yellow-300 transition-all duration-300 shadow-lg shadow-yellow-400/25 hover:shadow-yellow-400/40 hover:-translate-y-0.5">
                                    <span x-text="locale === 'kh' && slides[current].btn_text_kh ? slides[current].btn_text_kh : (slides[current].btn_text_en || 'Learn More')"></span>
                                    <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </template>

                <!-- Empty state content -->
                <div x-show="!slides.length">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-xs font-medium text-yellow-300 mb-8 border border-white/10">
                        <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full animate-pulse"></span>
                        <span>Welcome</span>
                    </div>
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold leading-tight text-white mb-4">Welcome to Our School</h1>
                    <div class="flex items-center gap-4 mb-6">
                        <span class="block h-0.5 w-12 bg-yellow-400"></span>
                        <h2 class="text-xl md:text-3xl font-bold text-yellow-400">Nurturing Minds, Building Futures</h2>
                    </div>
                    <p class="text-base md:text-lg text-slate-200 mb-10 max-w-xl leading-relaxed">Providing quality education to Cambodian students since 2005.</p>
                </div>
            </div>
        </div>

        <!-- Bottom Controls Bar -->
        <div class="absolute bottom-0 inset-x-0 z-20" x-show="slides.length">
            <!-- Autoplay Progress Bar -->
            <div x-show="slides.length > 1" class="h-0.5 bg-white/10">
                <div class="h-full bg-yellow-400 transition-all duration-[50ms] linear" :style="'width: ' + progress + '%'"></div>
            </div>

            <div class="bg-gradient-to-t from-slate-900/80 to-transparent pt-12 pb-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                    <!-- Navigation buttons -->
                    <div class="flex items-center gap-4">
                        <button @click="prev()" class="w-11 h-11 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/20 transition-all duration-300 flex items-center justify-center group">
                            <svg class="w-5 h-5 text-white transition-transform duration-300 group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>

                        <!-- Dot indicators with number -->
                        <div class="flex items-center gap-2.5">
                            <template x-for="(slide, idx) in slides" :key="'dot-'+idx">
                                <button @click="goTo(idx)"
                                        class="rounded-full transition-all duration-500"
                                        :class="idx === current ? 'w-8 h-2.5 bg-yellow-400' : 'w-2.5 h-2.5 bg-white/30 hover:bg-white/50'">
                                </button>
                            </template>
                        </div>

                        <button @click="next()" class="w-11 h-11 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/20 transition-all duration-300 flex items-center justify-center group">
                            <svg class="w-5 h-5 text-white transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Slide counter badge -->
                    <div class="hidden sm:flex items-center gap-2 text-sm font-medium text-white/60">
                        <span class="text-white font-bold text-lg" x-text="String(current + 1).padStart(2, '0')"></span>
                        <span class="text-white/30">/</span>
                        <span x-text="String(slides.length).padStart(2, '0')"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Bar -->
    <section class="bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-6 divide-x divide-slate-700/60">
                @if(isset($statistics) && $statistics->count() > 0)
                    @foreach($statistics as $stat)
                    <div class="py-6 text-center">
                        <div class="text-2xl md:text-3xl font-bold">{{ $stat->prefix ?? '' }}{{ $stat->value }}{{ $stat->suffix ?? '' }}</div>
                        <div class="text-xs md:text-sm text-slate-300 mt-1">{{ app()->getLocale() === 'kh' && $stat->label_kh ? $stat->label_kh : $stat->label_en }}</div>
                    </div>
                    @endforeach
                @else
                    <div class="py-6 text-center"><div class="text-2xl md:text-3xl font-bold">2,647+</div><div class="text-xs md:text-sm text-slate-300 mt-1">Students</div></div>
                    <div class="py-6 text-center"><div class="text-2xl md:text-3xl font-bold">142</div><div class="text-xs md:text-sm text-slate-300 mt-1">Teachers</div></div>
                    <div class="py-6 text-center"><div class="text-2xl md:text-3xl font-bold">48</div><div class="text-xs md:text-sm text-slate-300 mt-1">Awards</div></div>
                    <div class="py-6 text-center"><div class="text-2xl md:text-3xl font-bold">812+</div><div class="text-xs md:text-sm text-slate-300 mt-1">Reviews</div></div>
                    <div class="py-6 text-center"><div class="text-2xl md:text-3xl font-bold">98.4%</div><div class="text-xs md:text-sm text-slate-300 mt-1">Satisfaction</div></div>
                    <div class="py-6 text-center"><div class="text-2xl md:text-3xl font-bold">2,028</div><div class="text-xs md:text-sm text-slate-300 mt-1">Projects</div></div>
                @endif
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <span class="block h-px w-10 bg-yellow-400"></span>
                    <span class="text-sm font-semibold uppercase tracking-wider text-yellow-600">{{ __('messages.services_title', ['lang' => app()->getLocale() === 'kh' ? 'សេវាកម្មរបស់យើង' : 'Our Services']) }}</span>
                    <span class="block h-px w-10 bg-yellow-400"></span>
                </div>
                <p class="mt-4 text-gray-600">@if(app()->getLocale() === 'kh')សេវាកម្មគ្រប់គ្រាន់សម្រាប់ការអភិវឌ្ឍន៍ការសិក្សា @else Comprehensive services for educational development. @endif</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition bg-white">
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&q=80" alt="Website" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">@if(app()->getLocale() === 'kh')គេហទំព័រ @else Website @endif</h3>
                        <p class="text-gray-600">@if(app()->getLocale() === 'kh')គេហទំព័រសាលាដែលទំនើប គាំទ្រការសិក្សាអនឡាញ @else A modern school website supporting online learning and academic tracking. @endif</p>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition bg-white">
                    <img src="https://images.unsplash.com/photo-1558494949-ef526b0042a0?w=800&q=80" alt="Application" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">@if(app()->getLocale() === 'kh')កម្មវិធី @else Application @endif</h3>
                        <p class="text-gray-600">@if(app()->getLocale() === 'kh')កម្មវិធីទូរស័ព្ទដៃសម្រាប់តាមដាន និងជូនដំណឹង @else Mobile apps for schedules, alerts, and daily campus activities. @endif</p>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition bg-white">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&q=80" alt="Marketing" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">@if(app()->getLocale() === 'kh')ទីផ្សាយ @else Marketing @endif</h3>
                        <p class="text-gray-600">@if(app()->getLocale() === 'kh')ការផ្សព្វផ្សាយសកលដែលជួយសាលាទៅកាន់គ្រួសារ @else Digital outreach campaigns connecting the school with communities. @endif</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio / Our Work -->
    <section class="py-16 md:py-24 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <span class="block h-px w-10 bg-yellow-400"></span>
                    <span class="text-sm font-semibold uppercase tracking-wider text-yellow-400">{{ app()->getLocale() === 'kh' ? 'គំរោងរបស់យើង' : 'Our Work' }}</span>
                    <span class="block h-px w-10 bg-yellow-400"></span>
                </div>
                <p class="text-slate-300">@if(app()->getLocale() === 'kh')ការងារនិងអំឡុងពីវិទ្យាល័យ @else Selected works and achievements from our learning community. @endif</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <img src="https://images.unsplash.com/photo-1508098682722-e99c43a406b2?w=800&q=80" alt="Work 1" class="w-full h-64 md:h-80 object-cover rounded-lg">
                <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=800&q=80" alt="Work 2" class="w-full h-64 md:h-80 object-cover rounded-lg">
                <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=800&q=80" alt="Work 3" class="w-full h-64 md:h-80 object-cover rounded-lg">
                <img src="https://images.unsplash.com/photo-1526232761682-d26e03ac148e?w=800&q=80" alt="Work 4" class="w-full h-64 md:h-80 object-cover rounded-lg">
            </div>
        </div>
    </section>

    <!-- Past Projects -->
    <section class="py-16 md:py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <span class="block h-px w-10 bg-yellow-400"></span>
                    <span class="text-sm font-semibold uppercase tracking-wider text-yellow-600">{{ app()->getLocale() === 'kh' ? 'គំរោងដែលបានប្រតិបត្តិ' : 'Past Projects' }}</span>
                    <span class="block h-px w-10 bg-yellow-400"></span>
                </div>
                <p class="text-gray-600">@if(app()->getLocale() === 'kh')ស្ថានភាពគំរោងសាលាដែលបានប្រតិបត្តិ @else A look at recent programs and initiatives across campus. @endif</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800&q=80" alt="Project 1" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">@if(app()->getLocale() === 'kh')ផ្លាស់ប្តូរឌីជីថល @else Digital Transformation @endif</h3>
                        <p class="text-gray-600">@if(app()->getLocale() === 'kh')ការបត់បានការបណ្តុះបណ្តាលប្រព័ន្ធឌីជីថល @else Modernizing learning systems and digital readiness. @endif</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                    <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&q=80" alt="Project 2" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">@if(app()->getLocale() === 'kh')ការប្រមូលផ្តាច់ភូមិ @else Community Workshop @endif</h3>
                        <p class="text-gray-600">@if(app()->getLocale() === 'kh')ការប្រឹក្សាជាមួយគ្រួសារនិងសហគមន៍ @else Local outreach, family engagement, and teacher development. @endif</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80" alt="Project 3" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">@if(app()->getLocale() === 'kh')ទិន្នន័យសុវត្ថិភាព @else Data Insights @endif</h3>
                        <p class="text-gray-600">@if(app()->getLocale() === 'kh')ការប្រើទិន្នន័យដើម្បីកែលម្អស្ថានភាពការអប់រំ @else Using data to improve teaching quality and outcomes. @endif</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 md:py-24 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <span class="block h-px w-10 bg-yellow-400"></span>
                    <span class="text-sm font-semibold uppercase tracking-wider text-yellow-400">{{ app()->getLocale() === 'kh' ? 'ក្រុមការងាររបស់យើង' : 'Our Team' }}</span>
                    <span class="block h-px w-10 bg-yellow-400"></span>
                </div>
                <p class="mt-4 text-slate-300">@if(app()->getLocale() === 'kh')អ្នកដឹកនាំនិងអ្នកជំនាញរបស់យើង @else Leadership and people behind our work. @endif</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 md:gap-6">
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=400&q=80" alt="Team" class="w-full aspect-square object-cover rounded mb-3">
                    <p class="text-white font-medium text-sm">@if(app()->getLocale() === 'kh')អគារការិយាល័យ @else Office @endif</p>
                </div>
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1550684848-fac1c5b4e853?w=400&q=80" alt="Team" class="w-full aspect-square object-cover rounded mb-3">
                    <p class="text-white font-medium text-sm">@if(app()->getLocale() === 'kh')និត្ចស្ថាន @else Lab @endif</p>
                </div>
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1470252649378-9c29740c9fa8?w=400&q=80" alt="Team" class="w-full aspect-square object-cover rounded mb-3">
                    <p class="text-white font-medium text-sm">@if(app()->getLocale() === 'kh')អភិបាល @else Leadership @endif</p>
                </div>
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1501854140884-074cf2b2b3dd?w=400&q=80" alt="Team" class="w-full aspect-square object-cover rounded mb-3">
                    <p class="text-white font-medium text-sm">@if(app()->getLocale() === 'kh')ការងារបរិយាកាស @else Field @endif</p>
                </div>
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1495616811223-4d98c6e9c869?w=400&q=80" alt="Team" class="w-full aspect-square object-cover rounded mb-3">
                    <p class="text-white font-medium text-sm">@if(app()->getLocale() === 'kh')ក្រុមរចនា @else Design @endif</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ & News -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- FAQ -->
                <div>
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <div class="flex items-center gap-3">
                                <span class="block h-px w-8 bg-yellow-400"></span>
                                <h2 class="text-3xl font-bold text-gray-900">{{ app()->getLocale() === 'kh' ? 'សំណួរដែលត្រូវបានសួរញឹកញាប់' : 'FAQ' }}</h2>
                            </div>
                            <p class="text-gray-500 mt-1">@if(app()->getLocale() === 'kh')មួយចំនួនសំណួរដែលសាលាទទួលបាន @else Common questions about enrollment and school life. @endif</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        @forelse($faqs as $faq)
                        <div class="border border-gray-200 rounded-lg p-4 flex items-start justify-between cursor-pointer hover:bg-gray-50 transition"
                             x-data="{ open: false }" @click="open = !open">
                            <div>
                                <p class="font-semibold text-gray-900">{{ app()->getLocale() === 'kh' && $faq->question_kh ? $faq->question_kh : $faq->question_en }}</p>
                                <p x-show="open" x-collapse class="text-gray-600 mt-2 text-sm">{{ app()->getLocale() === 'kh' && $faq->answer_kh ? $faq->answer_kh : $faq->answer_en }}</p>
                            </div>
                            <span class="text-primary-600 font-bold ml-4 flex-shrink-0" x-text="open ? '−' : '+'"></span>
                        </div>
                        @empty
                        <p class="text-gray-500 text-center py-4">{{ __('messages.no_faq') }}</p>
                        @endforelse
                    </div>
                </div>

                <!-- News -->
                <div>
                    <div class="flex items-center gap-3 mb-8">
                        <span class="block h-px w-8 bg-yellow-400"></span>
                        <h2 class="text-3xl font-bold text-gray-900">{{ app()->getLocale() === 'kh' ? 'ព័ត៌មាន' : 'News' }}</h2>
                    </div>
                    <p class="text-gray-500 mb-4">@if(app()->getLocale() === 'kh')ព័ត៌មានថ្មីៗផ្តល់ដោយសាលា @else Updates and announcements from the school. @endif</p>
                    <div class="space-y-5">
                        @forelse($featuredNews as $article)
                        <a href="{{ route('news.show', $article->slug) }}" class="flex items-start gap-4 group">
                            <img src="{{ $article->featured_image ? asset('storage/' . $article->featured_image) : 'https://images.unsplash.com/photo-1491841550275-ad7854e35ca6?w=120&q=80' }}" alt="{{ $article->title_en }}" class="w-16 h-16 object-cover rounded">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ $article->published_at->format('d M Y') }}</p>
                                <p class="font-semibold text-gray-900 group-hover:text-primary-600 transition">{{ app()->getLocale() === 'kh' && $article->title_kh ? $article->title_kh : $article->title_en }}</p>
                            </div>
                        </a>
                        @empty
                        <p class="text-gray-500">@if(app()->getLocale() === 'kh')គ្មានព័ត៌មាន @else No news available. @endif</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 md:py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="block h-px w-8 bg-yellow-400"></span>
                        <h2 class="text-3xl font-bold text-gray-900">{{ app()->getLocale() === 'kh' ? 'ទំនាក់ទំនង' : 'Contact Us' }}</h2>
                    </div>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() === 'kh' ? 'ឈ្មោះ' : 'Name' }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="input-field">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() === 'kh' ? 'អ៊ីមែល' : 'Email' }}</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="input-field">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() === 'kh' ? 'ប្រធានបទ' : 'Subject' }}</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" required class="input-field">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ app()->getLocale() === 'kh' ? 'សារ' : 'Message' }}</label>
                            <textarea name="message" rows="4" required class="input-field">{{ old('message') }}</textarea>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-8 py-3 bg-yellow-400 text-slate-900 font-semibold rounded hover:bg-yellow-300 transition">
                                @if(app()->getLocale() === 'kh') ផ្ញើសារ @else Send Message @endif
                            </button>
                            <div class="flex gap-3 text-gray-500">
                                <a href="#" class="hover:text-yellow-600">FB</a>
                                <a href="#" class="hover:text-yellow-600">Line</a>
                                <a href="#" class="hover:text-yellow-600">IG</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?w=800&q=80" alt="Map" class="w-full h-80 md:h-full object-cover rounded-xl shadow-sm border border-gray-200">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 md:py-24 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <span class="block h-px w-10 bg-yellow-400"></span>
                    <span class="text-sm font-semibold uppercase tracking-wider text-yellow-400">{{ app()->getLocale() === 'kh' ? 'សំឡេងពីអ្នកប្រើប្រាស់' : 'Testimonials' }}</span>
                    <span class="block h-px w-10 bg-yellow-400"></span>
                </div>
                <p class="text-slate-300">@if(app()->getLocale() === 'kh')គំរូខ្លាំងនៃការសិក្សា @else Stories from families, alumni, and learners. @endif</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-slate-800 rounded-xl p-6 border border-slate-700">
                    <div class="text-yellow-400 mb-4">★★★★★</div>
                    <p class="text-slate-200 mb-6">@if(app()->getLocale() === 'kh')សាលាមានគ្រូល្អ និងគីរីជ្រៅថ្លា @else A supportive school environment with strong academics and great teachers. @endif</p>
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&q=80" alt="User" class="w-10 h-10 rounded-full object-cover">
                        <div>
                            <p class="font-semibold text-white text-sm">Sokha P.</p>
                            <p class="text-xs text-slate-400">{{ app()->getLocale() === 'kh' ? 'អាណាព្វនិយម' : 'Parent' }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 border border-slate-700">
                    <div class="text-yellow-400 mb-4">★★★★★</div>
                    <p class="text-slate-200 mb-6">@if(app()->getLocale() === 'kh')កម្មវិធីជាច្រើន និងគ្រូយក់អ្នក @else Great programs and teachers who encourage students every day. @endif</p>
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&q=80" alt="User" class="w-10 h-10 rounded-full object-cover">
                        <div>
                            <p class="font-semibold text-white text-sm">Vichhey K.</p>
                            <p class="text-xs text-slate-400">{{ app()->getLocale() === 'kh' ? 'សិស្សចាស់' : 'Alumni' }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 border border-slate-700">
                    <div class="text-yellow-400 mb-4">★★★★★</div>
                    <p class="text-slate-200 mb-6">@if(app()->getLocale() === 'kh')សាលាជួយឱ្យកាន់តែច្បាស់ក្នុងវិជ្ជាជីវជំនាញ @else The school encourages real-world skills beyond the classroom. @endif</p>
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&q=80" alt="User" class="w-10 h-10 rounded-full object-cover">
                        <div>
                            <p class="font-semibold text-white text-sm">Dara M.</p>
                            <p class="text-xs text-slate-400">{{ app()->getLocale() === 'kh' ? 'សិស្ស' : 'Student' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
