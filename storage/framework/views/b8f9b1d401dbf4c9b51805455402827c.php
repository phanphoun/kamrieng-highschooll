<?php $__env->startSection('title', 'About Us - Kamrieng High School'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .about-page {
            scroll-behavior: smooth;
        }

        .about-page [data-about-reveal] {
            opacity: 0;
            transform: translateY(24px);
            transition:
                opacity 700ms ease,
                transform 700ms cubic-bezier(.2, .8, .2, 1);
            transition-delay: var(--reveal-delay, 0ms);
            will-change: opacity, transform;
        }

        .about-page [data-about-reveal].is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .about-page .about-hero-glow {
            animation: aboutFloat 9s ease-in-out infinite;
        }

        .about-page .about-hero-smooth {
            background:
                radial-gradient(circle at 72% 18%, rgba(8, 111, 211, .22), transparent 34%),
                radial-gradient(circle at 12% 0%, rgba(247, 179, 22, .10), transparent 28%),
                linear-gradient(145deg, #141d2c 0%, #1b2940 48%, #192436 100%);
        }

        .about-page .about-cta-smooth {
            background:
                radial-gradient(circle at 75% 20%, rgba(255, 255, 255, .18), transparent 28%),
                linear-gradient(105deg, #0757a8 0%, #086fd3 48%, #0879e8 100%);
        }

        .about-page .about-hero-glow:nth-child(2) {
            animation-delay: -4s;
        }

        .about-page .about-visual,
        .about-page .about-card {
            position: relative;
            transition:
                transform 320ms ease,
                box-shadow 320ms ease,
                border-color 320ms ease;
        }

        .about-page .about-visual:hover,
        .about-page .about-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 60px -32px rgba(30, 64, 175, .45);
            border-color: rgba(147, 197, 253, .8);
        }

        .about-page .about-photo {
            transform: scale(1.02);
            transition: transform 900ms cubic-bezier(.2, .8, .2, 1), filter 900ms ease;
        }

        .about-page .about-visual:hover .about-photo,
        .about-page .about-card:hover .about-photo {
            transform: scale(1.08);
            filter: saturate(1.08) contrast(1.03);
        }

        .about-page .about-stat {
            position: relative;
            overflow: hidden;
        }

        .about-page .about-stat::before {
            content: "";
            position: absolute;
            inset: 0;
            transform: translateX(-110%);
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .7), transparent);
            animation: aboutStatSweep 1.4s ease forwards;
            animation-delay: var(--reveal-delay, 0ms);
            pointer-events: none;
        }

        .about-page .about-nav-link {
            position: relative;
        }

        .about-page .about-nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -2px;
            height: 2px;
            transform: scaleX(0);
            transform-origin: left;
            background: currentColor;
            transition: transform 240ms ease;
        }

        .about-page .about-nav-link:hover::after,
        .about-page .about-nav-link.is-active::after {
            transform: scaleX(1);
        }

        @keyframes aboutFloat {
            0%, 100% {
                transform: translate3d(0, 0, 0) scale(1);
            }
            50% {
                transform: translate3d(12px, -14px, 0) scale(1.04);
            }
        }

        @keyframes aboutStatSweep {
            to {
                transform: translateX(110%);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .about-page,
            .about-page *,
            .about-page *::before,
            .about-page *::after {
                scroll-behavior: auto !important;
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }

            .about-page [data-about-reveal] {
                opacity: 1;
                transform: none;
            }
        }
    </style>

    <div class="about-page overflow-hidden">

    <!-- ===== Hero Section ===== -->
    <section class="about-hero-smooth relative overflow-hidden">
        <div class="absolute inset-0 opacity-70">
            <div class="about-hero-glow absolute top-10 left-10 w-72 h-72 bg-[#086fd3]/20 rounded-full blur-3xl"></div>
            <div class="about-hero-glow absolute bottom-10 right-10 w-96 h-96 bg-[#f7b316]/10 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 lg:py-28">
            <div class="max-w-3xl" data-about-reveal>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-[#f7b316]/10 text-[#f7b316] border border-[#f7b316]/25 mb-4">
                    About Our School
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
                    A legacy of academic excellence
                </h1>
                <p class="text-lg sm:text-xl text-white/72 leading-relaxed max-w-2xl">
                    Discover the story of Kamrieng High School — our history, mission, leadership, and the values that have guided generations of students toward success.
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
                <path d="M0 60V30C240 0 480 0 720 30C960 60 1200 60 1440 30V60H0Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- ===== Sub-navigation (anchor links) ===== -->
    <section class="bg-white/95 backdrop-blur border-b border-gray-100 sticky top-16 lg:top-20 z-40 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex gap-6 -mb-px overflow-x-auto scrollbar-hide">
                <a href="#about" class="about-nav-link is-active shrink-0 py-4 px-1 text-sm font-medium text-[#0757a8] whitespace-nowrap transition-colors">About School</a>
                <a href="#mission-vision" class="about-nav-link shrink-0 py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap transition-colors">Mission &amp; Vision</a>
                <a href="#leadership" class="about-nav-link shrink-0 py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap transition-colors">Leadership</a>
                <a href="#values" class="about-nav-link shrink-0 py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap transition-colors">Our Values</a>
            </nav>
        </div>
    </section>

    <!-- ======================================================================== -->
    <!-- SECTION 1: ABOUT SCHOOL / HISTORY                                        -->
    <!-- ======================================================================== -->
    <section id="about" class="scroll-mt-24 py-16 sm:py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                <!-- Left: Demo image -->
                <div class="relative" aria-hidden="true" data-about-reveal>
                    <div class="about-visual aspect-[4/3] rounded-2xl overflow-hidden shadow-lg border border-blue-100 bg-blue-50">
                        <img
                            src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80"
                            alt=""
                            class="about-photo w-full h-full object-cover"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-950/70 via-blue-950/10 to-transparent"></div>
                        <div class="absolute left-5 right-5 bottom-5">
                            <div class="inline-flex items-center gap-2 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-blue-700 shadow-sm">
                                <span class="h-2 w-2 rounded-full bg-green-500"></span>
                                Demo campus photo
                            </div>
                            <p class="mt-3 text-lg font-bold text-white">Students learning together in a bright classroom</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-blue-700/5 rounded-2xl -z-10"></div>
                    <div class="absolute -top-4 -left-4 w-16 h-16 bg-blue-700/5 rounded-full -z-10"></div>
                </div>

                <!-- Right: History text -->
                <div data-about-reveal style="--reveal-delay: 120ms">
                    <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">Our History</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2 mb-6 leading-tight">
                        A Tradition of Excellence <br class="hidden sm:block">Since <span class="text-blue-700">1995</span>
                    </h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>
                            Founded in <strong class="text-gray-900">1995</strong> in the heart of Kamrieng District, Battambang Province,
                            Kamrieng High School began with a vision to provide quality education to the youth of rural Cambodia.
                            From a modest start with just over <strong class="text-gray-900">150 students</strong>, we have grown into
                            one of the most respected secondary schools in the region, currently serving over
                            <strong class="text-gray-900">2,000 students</strong>.
                        </p>
                        <p>
                            For nearly <strong class="text-gray-900">three decades</strong>, we have shaped the lives of countless
                            graduates who have gone on to become teachers, engineers, doctors, civil servants, and community leaders
                            — contributing meaningfully to Cambodia's development both at home and abroad.
                        </p>
                        <p>
                            Our school operates on a foundation of <strong class="text-gray-900">four core pillars</strong>:
                            Knowledge, Character, Leadership, and Service — a holistic framework that ensures every graduate
                            is prepared not just for examinations, but for a life of meaningful contribution to society.
                        </p>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-8 pt-8 border-t border-gray-100">
                        <div class="about-stat rounded-xl bg-blue-50/70 p-4" data-about-reveal style="--reveal-delay: 180ms">
                            <p class="text-3xl font-bold text-blue-700"><span data-about-counter data-count-to="1995">0</span></p>
                            <p class="text-sm text-gray-500 mt-1">Founded</p>
                        </div>
                        <div class="about-stat rounded-xl bg-blue-50/70 p-4" data-about-reveal style="--reveal-delay: 260ms">
                            <p class="text-3xl font-bold text-blue-700"><span data-about-counter data-count-to="2000" data-count-suffix="+">0</span></p>
                            <p class="text-sm text-gray-500 mt-1">Students</p>
                        </div>
                        <div class="about-stat rounded-xl bg-blue-50/70 p-4" data-about-reveal style="--reveal-delay: 340ms">
                            <p class="text-3xl font-bold text-blue-700"><span data-about-counter data-count-to="150" data-count-suffix="+">0</span></p>
                            <p class="text-sm text-gray-500 mt-1">Staff</p>
                        </div>
                        <div class="about-stat rounded-xl bg-blue-50/70 p-4" data-about-reveal style="--reveal-delay: 420ms">
                            <p class="text-3xl font-bold text-blue-700"><span data-about-counter data-count-from-year="1995" data-count-suffix="+">0</span></p>
                            <p class="text-sm text-gray-500 mt-1">Years</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================== -->
    <!-- SECTION 2: MISSION & VISION                                              -->
    <!-- ======================================================================== -->
    <section id="mission-vision" class="scroll-mt-24 py-16 sm:py-20 lg:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Mission Statement -->
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center mb-20 lg:mb-24">
                <div data-about-reveal>
                    <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">Our Purpose</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2 mb-6 leading-tight">
                        Mission &amp; Vision
                    </h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Guided by a clear sense of purpose, we are committed to shaping the future of education
                        in Kamrieng and beyond.
                    </p>
                    <p class="text-lg text-gray-700 font-medium">
                        To provide accessible, high-quality education that empowers students with the knowledge,
                        skills, and values they need to succeed in higher education and become responsible,
                        contributing members of society.
                    </p>
                </div>
                <div class="relative" data-about-reveal style="--reveal-delay: 120ms">
                    <div class="about-visual aspect-[4/3] rounded-2xl overflow-hidden shadow-lg border border-blue-100 bg-blue-50">
                        <img
                            src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80"
                            alt=""
                            class="about-photo w-full h-full object-cover"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-tr from-blue-950/65 via-blue-700/10 to-transparent"></div>
                        <div class="absolute left-5 right-5 bottom-5">
                            <div class="inline-flex items-center rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-blue-700 shadow-sm">
                                Mission in action
                            </div>
                            <p class="mt-3 text-lg font-bold text-white">Mentoring students through practical teamwork</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-blue-700/5 rounded-2xl -z-10"></div>
                </div>
            </div>

            <!-- Three Mission Pillars -->
            <div class="grid md:grid-cols-3 gap-8 mb-20 lg:mb-24">
                <div class="about-card bg-white rounded-2xl p-8 shadow-sm border border-gray-100" data-about-reveal>
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Academic Excellence</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Deliver rigorous programs that meet national standards and prepare students for higher education.
                    </p>
                </div>
                <div class="about-card bg-white rounded-2xl p-8 shadow-sm border border-gray-100" data-about-reveal style="--reveal-delay: 100ms">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Safe &amp; Inclusive</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Foster a nurturing environment where every student feels valued, respected, and supported.
                    </p>
                </div>
                <div class="about-card bg-white rounded-2xl p-8 shadow-sm border border-gray-100" data-about-reveal style="--reveal-delay: 200ms">
                    <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Character &amp; Leadership</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Develop leadership and civic responsibility through extracurriculars and community service.
                    </p>
                </div>
            </div>

            <!-- Vision Statement -->
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="relative lg:order-2" data-about-reveal style="--reveal-delay: 120ms">
                    <div class="about-visual aspect-[4/3] rounded-2xl overflow-hidden shadow-lg border border-blue-100 bg-blue-50">
                        <img
                            src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80"
                            alt=""
                            class="about-photo w-full h-full object-cover"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>
                        <div class="absolute left-5 right-5 bottom-5">
                            <div class="inline-flex items-center rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-blue-700 shadow-sm">
                                Future ready
                            </div>
                            <p class="mt-3 text-lg font-bold text-white">Building confidence, creativity, and leadership</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-blue-700/5 rounded-2xl -z-10"></div>
                </div>
                <div class="lg:order-1" data-about-reveal>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                        Where We Are Going
                    </h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p class="text-lg text-gray-700 font-medium">
                            To be a leading high school in Battambang Province and Cambodia, recognized for academic excellence,
                            innovative teaching, and the holistic development of students who are prepared to thrive in a rapidly changing world.
                        </p>
                        <p>
                            We envision a future where Kamrieng High School stands as a beacon of educational excellence
                            in rural Cambodia — a place where students from all backgrounds can access world-class
                            learning opportunities without leaving their community.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================== -->
    <!-- SECTION 3: LEADERSHIP                                                    -->
    <!-- ======================================================================== -->
    <section id="leadership" class="scroll-mt-24 py-16 sm:py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14" data-about-reveal>
                <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">Our Team</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2 mb-4">School Leadership</h2>
                <p class="text-gray-600 leading-relaxed">
                    Meet the dedicated team leading Kamrieng High School — from administration to department heads,
                    committed to educational excellence.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10 mb-16 lg:mb-20">
                <?php $__empty_1 = true; $__currentLoopData = $leadershipTeam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $demoLeaders = [
                            [
                                'name' => 'Sokha Vann',
                                'position' => 'School Principal',
                                'photo' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=900&h=1125&crop=faces&q=85',
                                'bio' => 'Guides school strategy, teacher development, and community partnerships with a student-first approach.',
                            ],
                            [
                                'name' => 'Dara Kim',
                                'position' => 'Vice Principal of Academics',
                                'photo' => 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?auto=format&fit=crop&w=900&h=1125&crop=faces&q=85',
                                'bio' => 'Coordinates curriculum planning, assessment quality, and classroom innovation across grade levels.',
                            ],
                            [
                                'name' => 'Sreymom Chea',
                                'position' => 'Student Affairs Lead',
                                'photo' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=900&h=1125&crop=faces&q=85',
                                'bio' => 'Supports student wellbeing, mentoring programs, clubs, and a positive school culture.',
                            ],
                            [
                                'name' => 'Rithy Chan',
                                'position' => 'STEM Department Head',
                                'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=900&h=1125&crop=faces&q=85',
                                'bio' => 'Leads science and technology learning through projects, lab activities, and problem solving.',
                            ],
                            [
                                'name' => 'Malis Phan',
                                'position' => 'Community Outreach Lead',
                                'photo' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=900&h=1125&crop=faces&q=85',
                                'bio' => 'Connects families, local partners, and alumni to strengthen student opportunities.',
                            ],
                            [
                                'name' => 'Bora Heng',
                                'position' => 'Administration Manager',
                                'photo' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=900&h=1125&crop=faces&q=85',
                                'bio' => 'Oversees daily operations, facilities, and school services so learning can run smoothly.',
                            ],
                        ];
                        $placeholderNames = ['Principal Doe', 'Vice Principal A', 'Mr. B', 'Ms. C', 'Mr. D', 'Ms. E'];
                        $demoLeader = $demoLeaders[$loop->index % count($demoLeaders)];
                        $usesDemoCopy = in_array($member['name'], $placeholderNames, true);
                        $displayName = $usesDemoCopy ? $demoLeader['name'] : $member['name'];
                        $displayPosition = $usesDemoCopy ? $demoLeader['position'] : $member['position'];
                        $displayBio = $usesDemoCopy ? $demoLeader['bio'] : $member['bio'];
                        $displayPhoto = $member['photo'] ?: $demoLeader['photo'];
                    ?>
                    <div class="about-card group bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden" data-about-reveal style="--reveal-delay: <?php echo e(($loop->index % 3) * 100); ?>ms">
                        <div class="aspect-[4/5] bg-gradient-to-br from-blue-50 to-slate-100 flex items-center justify-center overflow-hidden">
                            <img
                                src="<?php echo e($displayPhoto); ?>"
                                alt="<?php echo e($displayName); ?>"
                                class="about-photo w-full h-full object-cover object-[center_18%]"
                                loading="lazy"
                            >
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900"><?php echo e($displayName); ?></h3>
                            <p class="text-sm text-blue-700 font-medium mt-1"><?php echo e($displayPosition); ?></p>
                            <?php if($displayBio): ?>
                                <p class="text-sm text-gray-500 mt-3 leading-relaxed"><?php echo e($displayBio); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-500 col-span-full text-center py-12">Leadership team information coming soon.</p>
                <?php endif; ?>
            </div>

            <!-- Message from the Principal -->
            <div class="max-w-6xl mx-auto">
                <div class="about-card bg-gray-50 rounded-2xl p-5 sm:p-6 lg:p-8 border border-gray-100" data-about-reveal>
                    <div class="grid lg:grid-cols-[0.9fr_1.35fr] gap-8 lg:gap-10 items-center">
                        <div class="overflow-hidden rounded-2xl bg-gray-200 shadow-lg">
                            <img
                                src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=900&q=85"
                                alt="Portrait of Principal Doe"
                                class="about-photo aspect-[4/5] w-full h-full object-cover object-[center_18%]"
                                loading="lazy"
                            >
                        </div>
                        <div>
                            <span class="text-[#0757a8] font-semibold text-sm uppercase tracking-wider">From the Principal's Desk</span>
                            <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mt-2 mb-5">A Message from Our Principal</h3>
                            <blockquote class="text-gray-600 leading-relaxed italic border-l-4 border-[#0757a8] pl-4 sm:pl-6 mb-5">
                                "At Kamrieng High School, we believe that every student has the potential to achieve greatness.
                                Our dedicated team of educators and staff works tirelessly to create an environment where academic
                                excellence meets character development. I invite you to visit our campus and experience the
                                warmth, energy, and commitment that make our school truly special."
                            </blockquote>
                            <div>
                                <p class="font-bold text-gray-900">Principal Doe</p>
                                <p class="text-sm text-gray-500">Principal, Kamrieng High School</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================== -->
    <!-- SECTION 4: THE FOUR PILLARS / VALUES                                     -->
    <!-- ======================================================================== -->
    <section id="values" class="scroll-mt-24 py-16 sm:py-20 lg:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14" data-about-reveal>
                <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">Our Foundation</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2 mb-4">The Four Pillars</h2>
                <p class="text-gray-600 leading-relaxed">
                    Everything we do is built upon four core values that guide our curriculum, our culture, and our community.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                <!-- Pillar 1: Knowledge -->
                <div class="about-card group relative bg-white rounded-2xl p-8 border border-gray-100 shadow-sm transition-colors duration-300" data-about-reveal>
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-5 group-hover:bg-blue-700 transition-colors">
                        <svg class="w-7 h-7 text-blue-700 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Knowledge</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Rigorous academic education focused on measurable excellence, critical thinking, and a deep understanding of core subjects.
                    </p>
                </div>

                <!-- Pillar 2: Character -->
                <div class="about-card group relative bg-white rounded-2xl p-8 border border-gray-100 shadow-sm transition-colors duration-300" data-about-reveal style="--reveal-delay: 100ms">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-5 group-hover:bg-green-700 transition-colors">
                        <svg class="w-7 h-7 text-green-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Character</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Building integrity, resilience, empathy, and ethical behavior in every student through moral education and positive role modeling.
                    </p>
                </div>

                <!-- Pillar 3: Leadership -->
                <div class="about-card group relative bg-white rounded-2xl p-8 border border-gray-100 shadow-sm transition-colors duration-300" data-about-reveal style="--reveal-delay: 200ms">
                    <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center mb-5 group-hover:bg-amber-600 transition-colors">
                        <svg class="w-7 h-7 text-amber-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Leadership</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Cultivating confident, compassionate leaders who can inspire others, make sound decisions, and drive positive change in their communities.
                    </p>
                </div>

                <!-- Pillar 4: Service -->
                <div class="about-card group relative bg-white rounded-2xl p-8 border border-gray-100 shadow-sm transition-colors duration-300" data-about-reveal style="--reveal-delay: 300ms">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-5 group-hover:bg-purple-700 transition-colors">
                        <svg class="w-7 h-7 text-purple-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Service</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Encouraging every student to give back, serve their community, and develop a lifelong commitment to helping others.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================== -->
    <!-- SECTION 5: CALL TO ACTION                                                -->
    <!-- ======================================================================== -->
    <section class="about-cta-smooth py-16 sm:py-20 lg:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-60">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white/20 rounded-full blur-3xl translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#192436]/25 rounded-full blur-3xl -translate-x-1/3 translate-y-1/3"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-about-reveal>
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                Begin Your Journey
            </h2>
            <p class="text-lg text-white/75 mb-8 max-w-2xl mx-auto">
                Join our community of excellence and build a bright future at Kamrieng High School.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#" class="inline-flex items-center px-8 py-3.5 bg-white text-[#0757a8] font-semibold rounded-full hover:bg-blue-50 shadow-lg hover:shadow-xl transition-all">
                    Apply Now
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="#" class="inline-flex items-center px-8 py-3.5 border-2 border-white/35 text-white font-semibold rounded-full hover:bg-white/10 transition-all">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const page = document.querySelector('.about-page');

            if (!page) {
                return;
            }

            const revealItems = page.querySelectorAll('[data-about-reveal]');
            const counterItems = [...page.querySelectorAll('[data-about-counter]')];
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            const formatCounter = (value, suffix = '') => {
                return `${Math.round(value).toLocaleString()}${suffix}`;
            };

            const getCounterTarget = (counter) => {
                if (counter.dataset.countFromYear) {
                    const startYear = Number(counter.dataset.countFromYear);
                    return Math.max(new Date().getFullYear() - startYear, 0);
                }

                return Number(counter.dataset.countTo || 0);
            };

            const runCounter = (counter) => {
                if (counter.dataset.counted === 'true') {
                    return;
                }

                counter.dataset.counted = 'true';

                const target = getCounterTarget(counter);
                const suffix = counter.dataset.countSuffix || '';

                if (prefersReducedMotion) {
                    counter.textContent = formatCounter(target, suffix);
                    return;
                }

                const duration = Math.min(1800, Math.max(900, target * 1.4));
                const start = performance.now();

                const tick = (now) => {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);

                    counter.textContent = formatCounter(target * eased, suffix);

                    if (progress < 1) {
                        requestAnimationFrame(tick);
                    }
                };

                requestAnimationFrame(tick);
            };

            const runCountersInside = (scope) => {
                const scopedCounters = scope.matches?.('[data-about-counter]')
                    ? [scope]
                    : [...scope.querySelectorAll('[data-about-counter]')];

                scopedCounters.forEach(runCounter);
            };

            if ('IntersectionObserver' in window) {
                const revealObserver = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            runCountersInside(entry.target);
                            revealObserver.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.16,
                    rootMargin: '0px 0px -40px 0px',
                });

                revealItems.forEach((item) => revealObserver.observe(item));
            } else {
                revealItems.forEach((item) => item.classList.add('is-visible'));
                counterItems.forEach(runCounter);
            }

            const sections = [...page.querySelectorAll('section[id]')];
            const navLinks = [...page.querySelectorAll('.about-nav-link')];

            navLinks.forEach((link) => {
                link.addEventListener('click', (event) => {
                    const target = page.querySelector(link.getAttribute('href'));

                    if (!target) {
                        return;
                    }

                    event.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start',
                    });
                    history.replaceState(null, '', link.getAttribute('href'));
                });
            });

            if ('IntersectionObserver' in window && sections.length && navLinks.length) {
                const sectionObserver = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) {
                            return;
                        }

                        navLinks.forEach((link) => {
                            const isActive = link.getAttribute('href') === `#${entry.target.id}`;
                            link.classList.toggle('is-active', isActive);
                            link.classList.toggle('text-[#0757a8]', isActive);
                            link.classList.toggle('text-gray-500', !isActive);
                        });
                    });
                }, {
                    threshold: 0.42,
                    rootMargin: '-20% 0px -45% 0px',
                });

                sections.forEach((section) => sectionObserver.observe(section));
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/macbook/Desktop/kamrieng-highschooll/resources/views/public/about.blade.php ENDPATH**/ ?>