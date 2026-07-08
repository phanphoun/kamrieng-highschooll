<?php $__env->startSection('title', 'Kamrieng High School'); ?>

<?php $__env->startSection('content'); ?>


<nav x-data="{ mobileOpen: false, scrolled: false, lang: 'en', langOpen: false }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.pageYOffset > 40 })"
     :class="scrolled ? 'bg-header/95 backdrop-blur-lg shadow-2xl shadow-black/20 border-b border-white/5' : 'bg-header/0'"
     class="fixed top-0 inset-x-0 z-50 transition-all duration-300 h-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
        <div class="flex items-center justify-between h-full">
            
            <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2.5 group">
                <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition-colors duration-300"
                     :class="scrolled ? 'bg-accent/90 group-hover:bg-accent' : 'bg-white/10 group-hover:bg-white/20'">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-sm lg:text-base leading-tight text-white">Kamrieng High School</span>
                    <span class="text-[10px] lg:text-[11px] leading-tight tracking-wide text-white/60">វិទ្យាល័យកំរៀង</span>
                </div>
            </a>

            
            <div class="hidden lg:flex items-center gap-0.5">
                <a href="<?php echo e(route('home')); ?>" class="px-3 xl:px-4 py-2 text-sm font-medium text-white rounded-lg hover:bg-white/10 transition-colors">Home</a>
                <a href="#about" class="px-3 xl:px-4 py-2 text-sm font-medium text-white/70 hover:text-white rounded-lg hover:bg-white/10 transition-colors">About</a>
                <a href="#news" class="px-3 xl:px-4 py-2 text-sm font-medium text-white/70 hover:text-white rounded-lg hover:bg-white/10 transition-colors">News</a>
                <a href="#activities" class="px-3 xl:px-4 py-2 text-sm font-medium text-white/70 hover:text-white rounded-lg hover:bg-white/10 transition-colors">Activities</a>
                <a href="#achievements" class="px-3 xl:px-4 py-2 text-sm font-medium text-white/70 hover:text-white rounded-lg hover:bg-white/10 transition-colors">Achievements</a>
                <a href="#gallery" class="px-3 xl:px-4 py-2 text-sm font-medium text-white/70 hover:text-white rounded-lg hover:bg-white/10 transition-colors">Gallery</a>
                <a href="#contact" class="px-3 xl:px-4 py-2 text-sm font-medium text-white/70 hover:text-white rounded-lg hover:bg-white/10 transition-colors">Contact</a>

                
                <a href="#" class="ml-2 px-4 xl:px-5 py-2 bg-accent text-white text-sm font-semibold rounded-lg hover:bg-accent-dark transition-all shadow-sm">
                    Register Now
                </a>

                
                <div class="ml-2 pl-2 border-l border-white/20 relative" @click.outside="langOpen = false">
                    <button @click="langOpen = !langOpen"
                            class="flex items-center gap-1 px-2.5 py-1.5 text-sm font-medium rounded-lg transition-all border"
                            :class="langOpen ? 'bg-white/15 border-accent/60' : 'hover:bg-white/10 border-transparent'">
                        <span x-text="lang === 'kh' ? 'KH' : 'EN'" class="text-xs font-semibold tracking-wider"></span>
                        <svg class="w-2.5 h-2.5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             :class="langOpen ? 'rotate-180' : ''">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <div x-show="langOpen"
                         x-cloak
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 -translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-1"
                         class="absolute right-0 mt-2 w-36 bg-header border border-white/10 rounded-lg shadow-xl overflow-hidden z-50">
                        <button @click="lang = 'kh'; langOpen = false"
                                class="flex items-center gap-2 w-full px-3.5 py-2.5 text-sm transition-colors"
                                :class="lang === 'kh' ? 'text-accent bg-accent/10' : 'text-gray-300 hover:bg-white/5'">
                            <span class="text-sm">ភាសាខ្មែរ</span>
                            <span x-show="lang === 'kh'" class="ml-auto">
                                <svg class="w-3.5 h-3.5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </span>
                        </button>
                        <div class="h-px bg-white/5 mx-3"></div>
                        <button @click="lang = 'en'; langOpen = false"
                                class="flex items-center gap-2 w-full px-3.5 py-2.5 text-sm transition-colors"
                                :class="lang === 'en' ? 'text-accent bg-accent/10' : 'text-gray-300 hover:bg-white/5'">
                            <span class="text-sm">English</span>
                            <span x-show="lang === 'en'" class="ml-auto">
                                <svg class="w-3.5 h-3.5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            
            <button @click="mobileOpen = !mobileOpen"
                    class="lg:hidden relative w-10 h-10 flex items-center justify-center rounded-lg text-white/80 hover:bg-white/10 transition-colors"
                    aria-label="Toggle menu">
                <div class="flex flex-col items-center gap-[5px]">
                    <span class="block w-5 h-0.5 bg-white/80 rounded-full transition-all duration-300"
                          :class="mobileOpen ? 'rotate-45 translate-y-[7px]' : ''"></span>
                    <span class="block w-5 h-0.5 bg-white/80 rounded-full transition-all duration-300"
                          :class="mobileOpen ? 'opacity-0' : ''"></span>
                    <span class="block w-5 h-0.5 bg-white/80 rounded-full transition-all duration-300"
                          :class="mobileOpen ? '-rotate-45 -translate-y-[7px]' : ''"></span>
                </div>
            </button>
        </div>
    </div>

    
    <div x-show="mobileOpen"
         x-cloak
         @click.outside="mobileOpen = false"
         class="lg:hidden bg-header border-t border-white/10 shadow-xl"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2">
        <div class="px-4 py-4 space-y-1">
            <a href="<?php echo e(route('home')); ?>" class="block px-4 py-2.5 text-white font-semibold bg-white/10 rounded-lg">Home</a>
            <a href="#about" @click="mobileOpen = false" class="block px-4 py-2.5 text-gray-300 hover:bg-white/5 rounded-lg transition">About</a>
            <a href="#news" @click="mobileOpen = false" class="block px-4 py-2.5 text-gray-300 hover:bg-white/5 rounded-lg transition">News</a>
            <a href="#activities" @click="mobileOpen = false" class="block px-4 py-2.5 text-gray-300 hover:bg-white/5 rounded-lg transition">Activities</a>
            <a href="#achievements" @click="mobileOpen = false" class="block px-4 py-2.5 text-gray-300 hover:bg-white/5 rounded-lg transition">Achievements</a>
            <a href="#gallery" @click="mobileOpen = false" class="block px-4 py-2.5 text-gray-300 hover:bg-white/5 rounded-lg transition">Gallery</a>
            <a href="#contact" @click="mobileOpen = false" class="block px-4 py-2.5 text-gray-300 hover:bg-white/5 rounded-lg transition">Contact</a>

            
            <a href="#" @click="mobileOpen = false" class="block mt-3 px-4 py-2.5 bg-accent text-white font-semibold rounded-lg text-center">
                Register Now
            </a>

            <div class="pt-3 mt-3 border-t border-white/10">
                <div class="px-4 space-y-1">
                    <p class="text-[10px] text-footer-muted uppercase tracking-wider mb-2">ភាសា / Language</p>
                    <button @click="lang = 'kh'; mobileOpen = false"
                            class="flex items-center gap-3 w-full px-4 py-2.5 text-sm rounded-lg transition-all"
                            :class="lang === 'kh' ? 'bg-accent/10 text-accent font-medium' : 'text-gray-300 hover:bg-white/5'">
                        <span>ភាសាខ្មែរ</span>
                        <span x-show="lang === 'kh'" class="ml-auto">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </span>
                    </button>
                    <button @click="lang = 'en'; mobileOpen = false"
                            class="flex items-center gap-3 w-full px-4 py-2.5 text-sm rounded-lg transition-all"
                            :class="lang === 'en' ? 'bg-accent/10 text-accent font-medium' : 'text-gray-300 hover:bg-white/5'">
                        <span>English</span>
                        <span x-show="lang === 'en'" class="ml-auto">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>


<section class="relative min-h-screen flex items-center bg-header overflow-hidden"
         x-data="{ activeSlide: 0 }"
         x-init="setInterval(() => { activeSlide = (activeSlide + 1) % <?php echo e(count($slides) > 0 ? count($slides) : 1); ?>; }, 6000)">
    
    <div class="absolute inset-0">
        <?php $__empty_1 = true; $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="absolute inset-0"
             x-show="activeSlide === <?php echo e($index); ?>"
             x-transition:enter="transition-opacity duration-1000"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity duration-800"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            <img src="/storage/<?php echo e($slide->image_path); ?>"
                 alt="<?php echo e($slide->title_en); ?>"
                 class="w-full h-full object-cover"
                 loading="<?php echo e($index === 0 ? 'eager' : 'lazy'); ?>"
                 onerror="this.parentElement.style.background='#0f172a'; this.style.display='none';">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 to-gray-950"></div>
        <?php endif; ?>
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/90 via-gray-900/70 to-gray-900/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/30 to-transparent"></div>
    </div>

    
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
         style="background-image: url(\"data:image/svg+xml,%3Csvg width='60' height='60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-20">
        <div class="max-w-2xl">
            
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-accent/15 backdrop-blur-sm text-accent text-xs font-semibold rounded-full border border-accent/20 mb-5">
                <span class="w-1.5 h-1.5 bg-accent rounded-full"></span>
                Kamrieng High School
            </div>

            
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-[1.1] mb-5 tracking-tight">
                <?php if(isset($slides[0])): ?>
                <?php echo e($slides[0]->title_en); ?>

                <?php else: ?>
                Building Tomorrow's<br>
                <span class="text-accent">Leaders</span>
                <?php endif; ?>
            </h1>

            
            <p class="text-lg sm:text-xl text-gray-200/80 mb-8 max-w-xl leading-relaxed">
                <?php if(isset($slides[0])): ?>
                <?php echo e($slides[0]->description_en); ?>

                <?php else: ?>
                Shaping the future leaders of Cambodia through quality education, innovation, and excellence since 1998.
                <?php endif; ?>
            </p>

            
            <div class="flex flex-wrap gap-3">
                <a href="<?php echo e(isset($slides[0]) && $slides[0]->button_link ? $slides[0]->button_link : '#about'); ?>"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-btn text-white font-semibold rounded-lg hover:bg-btn-hover transition-all shadow-lg shadow-btn/25 hover:shadow-xl text-sm lg:text-base">
                    <?php echo e(isset($slides[0]) && $slides[0]->button_text_en ? $slides[0]->button_text_en : 'Learn More'); ?>

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#about"
                   class="inline-flex items-center gap-2 px-6 py-3 border border-white/30 text-white font-medium rounded-lg hover:bg-white/10 hover:border-white/50 transition-all text-sm lg:text-base">
                    Explore More
                </a>
            </div>
        </div>
    </div>

    
    <?php if(count($slides) > 1): ?>
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 flex items-center gap-2.5">
        <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <button @click="activeSlide = <?php echo e($index); ?>"
                class="w-2.5 h-2.5 rounded-full transition-all duration-500"
                :class="activeSlide === <?php echo e($index); ?> ? 'bg-accent w-8' : 'bg-white/30 hover:bg-white/60'"
                aria-label="Go to slide <?php echo e($index + 1); ?>"></button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>

    
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 animate-bounce hidden md:block">
        <svg class="w-4 h-4 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
    </div>
</section>


<section class="py-12 lg:py-16 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 md:grid-cols-6 gap-6 lg:gap-8">
            <div class="text-center">
                <div class="text-2xl lg:text-3xl font-bold text-accent mb-0.5">
                    <span class="stat-counter" data-target="1500">0</span>+
                </div>
                <div class="text-xs lg:text-sm text-gray-500 font-medium">Students</div>
                <div class="text-[10px] text-gray-400">សិស្ស</div>
            </div>
            <div class="text-center">
                <div class="text-2xl lg:text-3xl font-bold text-accent mb-0.5">
                    <span class="stat-counter" data-target="85">0</span>+
                </div>
                <div class="text-xs lg:text-sm text-gray-500 font-medium">Teachers</div>
                <div class="text-[10px] text-gray-400">គ្រូ</div>
            </div>
            <div class="text-center">
                <div class="text-2xl lg:text-3xl font-bold text-accent mb-0.5">
                    <span class="stat-counter" data-target="32">0</span>+
                </div>
                <div class="text-xs lg:text-sm text-gray-500 font-medium">Classes</div>
                <div class="text-[10px] text-gray-400">ថ្នាក់</div>
            </div>
            <div class="text-center">
                <div class="text-2xl lg:text-3xl font-bold text-accent mb-0.5">
                    <span class="stat-counter" data-target="98">0</span>%
                </div>
                <div class="text-xs lg:text-sm text-gray-500 font-medium">BAC II Grade</div>
                <div class="text-[10px] text-gray-400">ប្រឡងជាប់</div>
            </div>
            <div class="text-center">
                <div class="text-2xl lg:text-3xl font-bold text-accent mb-0.5">
                    <span class="stat-counter" data-target="99">0</span>%
                </div>
                <div class="text-xs lg:text-sm text-gray-500 font-medium">Graduation Rate</div>
                <div class="text-[10px] text-gray-400">អត្រាបញ្ចប់</div>
            </div>
            <div class="text-center">
                <div class="text-2xl lg:text-3xl font-bold text-accent mb-0.5">
                    <span class="stat-counter" data-target="28">0</span>+
                </div>
                <div class="text-xs lg:text-sm text-gray-500 font-medium">Established</div>
                <div class="text-[10px] text-gray-400">បង្កើតឡើង</div>
            </div>
        </div>
    </div>
</section>


<section id="about" class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-0.5 bg-accent rounded-full"></div>
                    <span class="text-accent font-semibold text-xs tracking-[0.2em] uppercase">About Us</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                    Welcome to<br>
                    <span class="text-accent">Kamrieng High School</span>
                </h2>
                <p class="text-gray-500 text-sm uppercase tracking-wider mb-6">សូមស្វាគមន៍មកកាន់វិទ្យាល័យកំរៀង</p>

                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>Kamrieng High School is a leading educational institution in Battambang province, established with the goal of providing high-quality education to students from all backgrounds.</p>
                    <p>We believe that education is the key to unlocking potential, and we are committed to providing an excellent learning environment that nurtures academic excellence, character development, and leadership skills.</p>
                </div>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#" class="inline-flex items-center gap-2 px-6 py-3 bg-btn text-white font-medium rounded-lg hover:bg-btn-hover transition-all shadow-sm text-sm">
                        Read More
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="#" class="inline-flex items-center gap-2 px-6 py-3 border border-gray-200 text-gray-700 font-medium rounded-lg hover:border-accent hover:text-accent transition-all text-sm">
                        Academic Programs
                    </a>
                </div>
            </div>

            
            <div class="relative">
                <div class="aspect-[4/5] rounded-2xl overflow-hidden bg-gradient-to-br from-accent/10 to-accent/5 border border-gray-200 shadow-lg flex items-center justify-center">
                    <div class="text-center p-8">
                        <div class="w-28 h-28 lg:w-32 lg:h-32 bg-gradient-to-br from-accent/20 to-accent/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-14 h-14 lg:w-16 lg:h-16 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <p class="text-gray-900 font-bold text-xl">Mr. Sok Saravuth</p>
                        <p class="text-accent font-medium mt-1">Principal</p>
                        <p class="text-gray-400 text-sm mt-4 italic border-t border-gray-200 pt-4">នាយកវិទ្យាល័យកំរៀង</p>
                    </div>
                </div>
                <div class="absolute -bottom-3 -left-3 w-20 h-20 bg-accent/20 rounded-2xl -z-10 hidden md:block blur-sm"></div>
                <div class="absolute -top-3 -right-3 w-28 h-28 bg-accent/10 rounded-full -z-10 hidden md:block blur-sm"></div>
            </div>
        </div>
    </div>
</section>


<section id="news" class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10 lg:mb-12">
            <div>
                <span class="text-accent font-semibold text-xs tracking-[0.2em] uppercase">News</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mt-2">Latest News</h2>
            </div>
            <a href="#" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 border border-gray-200 text-gray-700 font-medium rounded-lg hover:border-accent hover:text-accent transition-all text-sm">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300">
                <div class="relative overflow-hidden aspect-[16/10] bg-gradient-to-br from-accent/5 to-accent/5">
                    <img src="/storage/news/news-1.jpg"
                         alt="Graduation ceremony"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy"
                         onerror="this.style.display='none';">
                    <div class="absolute top-3 left-3">
                        <span class="px-2.5 py-1 bg-accent text-white text-xs font-semibold rounded-md">New</span>
                    </div>
                </div>
                <div class="p-5">
                    <div class="text-xs text-gray-400 mb-2">June 15, 2026</div>
                    <h3 class="font-bold text-gray-900 group-hover:text-accent transition-colors leading-snug mb-2">Grade A Certificate Ceremony</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Grade 12 students have successfully passed with a 98% pass rate...</p>
                </div>
            </article>

            
            <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300">
                <div class="relative overflow-hidden aspect-[16/10] bg-gradient-to-br from-accent/5 to-accent/5">
                    <img src="/storage/news/news-2.jpg"
                         alt="Sports day"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy"
                         onerror="this.style.display='none';">
                    <div class="absolute top-3 left-3">
                        <span class="px-2.5 py-1 bg-accent text-white text-xs font-semibold rounded-md">New</span>
                    </div>
                </div>
                <div class="p-5">
                    <div class="text-xs text-gray-400 mb-2">June 10, 2026</div>
                    <h3 class="font-bold text-gray-900 group-hover:text-accent transition-colors leading-snug mb-2">Annual Sports Competition 2026</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Students participated in the annual sports competition from all classes...</p>
                </div>
            </article>

            
            <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300">
                <div class="relative overflow-hidden aspect-[16/10] bg-gradient-to-br from-accent/5 to-accent/5">
                    <img src="/storage/news/news-3.jpg"
                         alt="Classroom"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy"
                         onerror="this.style.display='none';">
                    <div class="absolute top-3 left-3">
                        <span class="px-2.5 py-1 bg-accent text-white text-xs font-semibold rounded-md">New</span>
                    </div>
                </div>
                <div class="p-5">
                    <div class="text-xs text-gray-400 mb-2">June 05, 2026</div>
                    <h3 class="font-bold text-gray-900 group-hover:text-accent transition-colors leading-snug mb-2">New Academic Program 2026-2027</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">New curriculum with focus on science, technology, and modern skills...</p>
                </div>
            </article>

            
            <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 hidden sm:block">
                <div class="relative overflow-hidden aspect-[16/10] bg-gradient-to-br from-accent/5 to-accent/5">
                    <img src="/storage/news/news-4.jpg"
                         alt="Library"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy"
                         onerror="this.style.display='none';">
                </div>
                <div class="p-5">
                    <div class="text-xs text-gray-400 mb-2">May 28, 2026</div>
                    <h3 class="font-bold text-gray-900 group-hover:text-accent transition-colors leading-snug mb-2">Library Renovation Complete</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">The school library has been renovated with new books and computers...</p>
                </div>
            </article>

            
            <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 hidden lg:block">
                <div class="relative overflow-hidden aspect-[16/10] bg-gradient-to-br from-accent/5 to-accent/5">
                    <img src="/storage/news/news-5.jpg"
                         alt="Workshop"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy"
                         onerror="this.style.display='none';">
                </div>
                <div class="p-5">
                    <div class="text-xs text-gray-400 mb-2">May 20, 2026</div>
                    <h3 class="font-bold text-gray-900 group-hover:text-accent transition-colors leading-snug mb-2">Teacher Training Workshop</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Professional development workshop for teachers on modern teaching methods...</p>
                </div>
            </article>
        </div>

        <div class="text-center mt-8 sm:hidden">
            <a href="#" class="inline-flex items-center gap-2 px-6 py-3 border border-gray-200 text-gray-700 font-medium rounded-lg hover:border-accent hover:text-accent transition-all text-sm">
                View All News
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>


<section id="activities" class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10 lg:mb-12">
            <div>
                <span class="text-accent font-semibold text-xs tracking-[0.2em] uppercase">Activities</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mt-2">School Activities</h2>
            </div>
            <a href="#" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 border border-gray-200 text-gray-700 font-medium rounded-lg hover:border-accent hover:text-accent transition-all text-sm">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300">
                <div class="aspect-[4/3] bg-gradient-to-br from-accent/10 to-accent/5 overflow-hidden">
                    <img src="/storage/activities/activity-1.jpg"
                         alt="Sports"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy"
                         onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, #EDC00120, #D4A80020)';">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 text-sm group-hover:text-accent transition-colors">Sports Day</h3>
                    <p class="text-xs text-gray-400 mt-1">Annual sports competition</p>
                </div>
            </div>

            
            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300">
                <div class="aspect-[4/3] bg-gradient-to-br from-accent/10 to-accent/5 overflow-hidden">
                    <img src="/storage/activities/activity-2.jpg"
                         alt="Culture"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy"
                         onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, #EDC00120, #D4A80020)';">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 text-sm group-hover:text-accent transition-colors">Culture Day</h3>
                    <p class="text-xs text-gray-400 mt-1">Khmer traditional festival</p>
                </div>
            </div>

            
            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300">
                <div class="aspect-[4/3] bg-gradient-to-br from-accent/10 to-accent/5 overflow-hidden">
                    <img src="/storage/activities/activity-3.jpg"
                         alt="Study"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy"
                         onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, #EDC00120, #D4A80020)';">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 text-sm group-hover:text-accent transition-colors">Study Tour</h3>
                    <p class="text-xs text-gray-400 mt-1">Educational field trip</p>
                </div>
            </div>

            
            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300">
                <div class="aspect-[4/3] bg-gradient-to-br from-accent/10 to-accent/5 overflow-hidden">
                    <img src="/storage/activities/activity-4.jpg"
                         alt="Volunteer"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy"
                         onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, #EDC00120, #D4A80020)';">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 text-sm group-hover:text-accent transition-colors">Volunteer Program</h3>
                    <p class="text-xs text-gray-400 mt-1">Community service</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="achievements" class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-accent font-semibold text-xs tracking-[0.2em] uppercase">Achievements</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mt-2">Our Achievements</h2>
            <p class="text-gray-500 mt-3 max-w-lg mx-auto">Proud of the accomplishments of our students and school</p>
        </div>

        <div class="max-w-3xl mx-auto space-y-4">
            
            <div class="flex items-center gap-5 p-5 bg-gray-50 rounded-xl border border-gray-100 hover:border-accent/30 hover:shadow-sm transition-all duration-300">
                <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-gray-900">National Award — #1 in Province</h3>
                    <p class="text-sm text-gray-500 mt-0.5">Ranked first in the Provincial Secondary School Examination</p>
                </div>
                <span class="text-accent font-bold text-lg flex-shrink-0">2025</span>
            </div>

            
            <div class="flex items-center gap-5 p-5 bg-gray-50 rounded-xl border border-gray-100 hover:border-accent/30 hover:shadow-sm transition-all duration-300">
                <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-gray-900">National Sports Champion</h3>
                    <p class="text-sm text-gray-500 mt-0.5">Won the National Student Sports Competition championship</p>
                </div>
                <span class="text-accent font-bold text-lg flex-shrink-0">2025</span>
            </div>

            
            <div class="flex items-center gap-5 p-5 bg-gray-50 rounded-xl border border-gray-100 hover:border-accent/30 hover:shadow-sm transition-all duration-300">
                <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-gray-900">150 Grade A Students</h3>
                    <p class="text-sm text-gray-500 mt-0.5">Achieved Grade A in the national examination over the last 3 years</p>
                </div>
                <span class="text-accent font-bold text-lg flex-shrink-0">2023-25</span>
            </div>
        </div>
    </div>
</section>


<section class="py-16 lg:py-20 bg-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-accent font-semibold text-xs tracking-[0.2em] uppercase">Notices</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">Important Notices</h2>
        </div>

        <div class="max-w-3xl mx-auto space-y-3">
            <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/10 hover:bg-white/10 transition-colors">
                <div class="w-10 h-10 bg-accent/20 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                </div>
                <div class="flex-1">
                    <p class="text-white font-medium text-sm">Enrollment for Academic Year 2026-2027 Now Open</p>
                    <p class="text-footer-muted/80 text-xs mt-0.5">June 1, 2026</p>
                </div>
                <a href="#" class="text-accent text-sm font-medium hover:underline flex-shrink-0">Read</a>
            </div>

            <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/10 hover:bg-white/10 transition-colors">
                <div class="w-10 h-10 bg-accent/20 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                </div>
                <div class="flex-1">
                    <p class="text-white font-medium text-sm">Final Exam Schedule for Grade 12 Published</p>
                    <p class="text-footer-muted/80 text-xs mt-0.5">May 25, 2026</p>
                </div>
                <a href="#" class="text-accent text-sm font-medium hover:underline flex-shrink-0">Read</a>
            </div>

            <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/10 hover:bg-white/10 transition-colors">
                <div class="w-10 h-10 bg-accent/20 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                </div>
                <div class="flex-1">
                    <p class="text-white font-medium text-sm">School Closed for Khmer New Year Holidays</p>
                    <p class="text-footer-muted/80 text-xs mt-0.5">April 10, 2026</p>
                </div>
                <a href="#" class="text-accent text-sm font-medium hover:underline flex-shrink-0">Read</a>
            </div>
        </div>
    </div>
</section>


<section id="gallery" class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10 lg:mb-12">
            <div>
                <span class="text-accent font-semibold text-xs tracking-[0.2em] uppercase">Gallery</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mt-2">School Gallery</h2>
            </div>
            <a href="#" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 bg-accent text-white font-medium rounded-lg hover:bg-accent-dark transition-all shadow-sm text-sm">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <?php
                $galleryItems = [
                    ['src' => '/storage/gallery/gallery-1.jpg', 'alt' => 'School Opening'],
                    ['src' => '/storage/gallery/gallery-2.jpg', 'alt' => 'Sports Competition'],
                    ['src' => '/storage/gallery/gallery-3.jpg', 'alt' => 'Classroom'],
                    ['src' => '/storage/gallery/gallery-4.jpg', 'alt' => 'Graduation'],
                    ['src' => '/storage/gallery/gallery-5.jpg', 'alt' => 'Activities', 'class' => 'hidden md:block'],
                    ['src' => '/storage/gallery/gallery-6.jpg', 'alt' => 'Library', 'class' => 'hidden lg:block'],
                ];
            ?>
            <?php $__currentLoopData = $galleryItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group relative rounded-xl overflow-hidden aspect-square cursor-pointer border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 <?php echo e($item['class'] ?? ''); ?>">
                <div class="w-full h-full bg-gradient-to-br from-accent/10 to-accent/5">
                    <img src="<?php echo e($item['src']); ?>"
                         alt="<?php echo e($item['alt']); ?>"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy"
                         onerror="this.style.display='none';">
                </div>
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-all duration-300 flex items-center justify-center">
                    <div class="opacity-0 group-hover:opacity-100 transition-all duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section id="contact" class="py-16 lg:py-20 bg-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            <div>
                <span class="text-accent font-semibold text-xs tracking-[0.2em] uppercase">Contact</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight mt-2 mb-4">
                    Get in Touch<br>
                    <span class="text-accent">With Us</span>
                </h2>
                <p class="text-footer-muted mb-8 max-w-md">Have questions about enrollment, academic programs, or school activities? We'd love to hear from you.</p>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 bg-accent/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-white text-sm font-medium">Address</p>
                            <p class="text-footer-muted text-sm">Kamrieng Village, Kamrieng District, Battambang Province</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 bg-accent/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-white text-sm font-medium">Phone</p>
                            <p class="text-footer-muted text-sm">+855 12 345 678</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 bg-accent/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-white text-sm font-medium">Email</p>
                            <p class="text-footer-muted text-sm">info@kamrieng.edu.kh</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 lg:p-8 border border-white/10">
                <h3 class="text-xl font-bold text-white mb-5">Send Us a Message</h3>
                <form class="space-y-4">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <input type="text" placeholder="Your Name"
                               class="w-full px-4 py-2.5 bg-white/10 border border-white/20 rounded-lg text-white placeholder:text-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-accent/50 transition-all">
                        <input type="email" placeholder="Your Email"
                               class="w-full px-4 py-2.5 bg-white/10 border border-white/20 rounded-lg text-white placeholder:text-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-accent/50 transition-all">
                    </div>
                    <input type="text" placeholder="Subject"
                           class="w-full px-4 py-2.5 bg-white/10 border border-white/20 rounded-lg text-white placeholder:text-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-accent/50 transition-all">
                    <textarea rows="4" placeholder="Your Message"
                              class="w-full px-4 py-2.5 bg-white/10 border border-white/20 rounded-lg text-white placeholder:text-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-accent/50 transition-all resize-none"></textarea>
                    <button type="submit"
                            class="w-full px-6 py-3 bg-btn text-white font-semibold rounded-lg hover:bg-btn-hover transition-all shadow-sm text-sm">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>


<footer class="bg-header text-footer-muted">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-accent rounded-lg flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold text-white">Kamrieng High School</p>
                        <p class="text-xs text-footer-muted">វិទ្យាល័យកំរៀង</p>
                    </div>
                </div>
                <p class="text-footer-muted text-sm leading-relaxed mb-5">A leading school in educating students to become future leaders of Cambodia, providing quality education since 1998.</p>
                <div class="flex gap-2.5">
                    <a href="#" class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center hover:bg-accent transition-all text-footer-muted hover:text-white">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center hover:bg-accent transition-all text-footer-muted hover:text-white">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center hover:bg-accent transition-all text-footer-muted hover:text-white">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center hover:bg-accent transition-all text-footer-muted hover:text-white">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                </div>
            </div>

            
            <div>
                <p class="font-bold text-white mb-4 text-sm">Quick Links</p>
                <ul class="space-y-2.5">
                    <li><a href="#" class="text-footer-muted hover:text-accent transition text-sm">About Us</a></li>
                    <li><a href="#" class="text-footer-muted hover:text-accent transition text-sm">Leadership</a></li>
                    <li><a href="#" class="text-footer-muted hover:text-accent transition text-sm">Academic Programs</a></li>
                    <li><a href="#" class="text-footer-muted hover:text-accent transition text-sm">News & Events</a></li>
                    <li><a href="#" class="text-footer-muted hover:text-accent transition text-sm">Contact</a></li>
                </ul>
            </div>

            
            <div>
                <p class="font-bold text-white mb-4 text-sm">Resources</p>
                <ul class="space-y-2.5">
                    <li><a href="#" class="text-footer-muted hover:text-accent transition text-sm">Gallery</a></li>
                    <li><a href="#" class="text-footer-muted hover:text-accent transition text-sm">Downloads</a></li>
                    <li><a href="#" class="text-footer-muted hover:text-accent transition text-sm">Academic Calendar</a></li>
                    <li><a href="#" class="text-footer-muted hover:text-accent transition text-sm">Achievements</a></li>
                </ul>
            </div>

            
            <div>
                <p class="font-bold text-white mb-4 text-sm">Contact</p>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-accent mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="text-footer-muted">Kamrieng Village, Kamrieng District, Battambang Province</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span class="text-footer-muted">+855 12 345 678</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span class="text-footer-muted">info@kamrieng.edu.kh</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-2">
            <p class="text-footer-muted/60 text-xs">© <?php echo e(date('Y')); ?> Kamrieng High School. All rights reserved.</p>
            <div class="flex items-center gap-4 text-xs">
                <a href="#" class="text-footer-muted/60 hover:text-accent transition">Privacy Policy</a>
                <a href="#" class="text-footer-muted/60 hover:text-accent transition">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
(function() {
    'use strict';

    // ==================== ANIMATED COUNTERS ====================
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.dataset.target);
                const duration = 2000;
                const startTime = performance.now();

                function update(currentTime) {
                    const progress = Math.min((currentTime - startTime) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.round(eased * target).toLocaleString();
                    if (progress < 1) requestAnimationFrame(update);
                    else el.textContent = target.toLocaleString();
                }
                requestAnimationFrame(update);
                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.3 });

    document.querySelectorAll('.stat-counter').forEach(el => counterObserver.observe(el));

    // ==================== SMOOTH SCROLL ====================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href && href.length > 1) {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });
})();
</script>

<style>
    [x-cloak] { display: none !important; }
    html { scroll-behavior: smooth; }
    .stat-counter { font-variant-numeric: tabular-nums; }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HUT SREYPOV\Desktop\kamrieng-highschooll\resources\views/home.blade.php ENDPATH**/ ?>