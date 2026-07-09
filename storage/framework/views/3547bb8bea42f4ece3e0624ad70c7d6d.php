<?php $__env->startSection('title', 'Mission & Vision - Kamrieng High School'); ?>

<?php $__env->startSection('content'); ?>

    <!-- ===== Hero Section ===== -->
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-blue-300 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 lg:py-28">
            <div class="max-w-3xl">
                <nav class="flex items-center gap-2 text-sm text-blue-200/80 mb-4">
                    <a href="<?php echo e(route('about.index')); ?>" class="hover:text-white transition-colors">About</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    <span class="text-white">Mission &amp; Vision</span>
                </nav>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-200 border border-blue-400/30 mb-4">
                    Our Purpose
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
                    Mission &amp; Vision
                </h1>
                <p class="text-lg sm:text-xl text-blue-100/90 leading-relaxed max-w-2xl">
                    Guided by a clear sense of purpose, we are committed to shaping the future of education in Kamrieng and beyond.
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
                <path d="M0 60V30C240 0 480 0 720 30C960 60 1200 60 1440 30V60H0Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- ===== Sub-navigation ===== -->
    <section class="bg-white border-b border-gray-100 sticky top-16 lg:top-20 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex gap-6 -mb-px overflow-x-auto scrollbar-hide">
                <a href="<?php echo e(route('about.index')); ?>" class="shrink-0 py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 border-b-2 border-transparent hover:border-gray-300 whitespace-nowrap transition-colors">About School</a>
                <a href="<?php echo e(route('about.mission-vision')); ?>" class="shrink-0 py-4 px-1 text-sm font-medium text-blue-700 border-b-2 border-blue-700 whitespace-nowrap">Mission &amp; Vision</a>
                <a href="<?php echo e(route('about.leadership')); ?>" class="shrink-0 py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 border-b-2 border-transparent hover:border-gray-300 whitespace-nowrap transition-colors">Leadership</a>
            </nav>
        </div>
    </section>

    <!-- ===== Mission Statement Section ===== -->
    <section class="py-16 sm:py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div>
                    <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">Our Mission</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2 mb-6 leading-tight">
                        What Drives Us Every Day
                    </h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p class="text-lg text-gray-700 font-medium">
                            To provide accessible, high-quality education that empowers students with the knowledge, skills, and values they need to succeed in higher education and become responsible, contributing members of society.
                        </p>
                        <p>
                            At Kamrieng High School, we believe that education is the most powerful tool for transforming lives and communities. Our mission is rooted in the conviction that every child — regardless of background — deserves access to a learning environment that challenges, supports, and inspires them to reach their full potential.
                        </p>
                        <p>
                            We are committed to delivering rigorous academic programs that meet national curriculum standards while fostering creativity, critical thinking, and a genuine love for learning.
                        </p>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-[4/3] bg-gradient-to-br from-blue-100 to-blue-50 rounded-2xl overflow-hidden shadow-lg flex items-center justify-center">
                        <div class="text-center p-8">
                            <div class="w-20 h-20 bg-blue-700/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <p class="text-gray-400 text-sm">Empowering students through education</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-blue-700/5 rounded-2xl -z-10"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Mission Pillars ===== -->
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Mission in Action</h2>
                <p class="text-gray-600">Three core commitments that guide everything we do.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Academic Excellence</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Deliver rigorous academic programs that meet national standards and prepare students for higher education and career success.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Safe &amp; Inclusive Environment</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Foster a safe, inclusive, and nurturing learning environment where every student feels valued, respected, and supported.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                    <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Character &amp; Leadership</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Develop character, leadership, and civic responsibility through extracurricular engagement and community service programs.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Vision Statement Section ===== -->
    <section class="py-16 sm:py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="relative lg:order-2">
                    <div class="aspect-[4/3] bg-gradient-to-br from-blue-100 to-blue-50 rounded-2xl overflow-hidden shadow-lg flex items-center justify-center">
                        <div class="text-center p-8">
                            <div class="w-20 h-20 bg-blue-700/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </div>
                            <p class="text-gray-400 text-sm">A vision for the future of education</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-blue-700/5 rounded-2xl -z-10"></div>
                </div>
                <div class="lg:order-1">
                    <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">Our Vision</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2 mb-6 leading-tight">
                        Where We Are Going
                    </h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p class="text-lg text-gray-700 font-medium">
                            To be a leading high school in Battambang Province and Cambodia, recognized for academic excellence, innovative teaching, and the holistic development of students who are prepared to thrive in a rapidly changing world.
                        </p>
                        <p>
                            We envision a future where Kamrieng High School stands as a beacon of educational excellence in rural Cambodia — a place where students from all backgrounds can access world-class learning opportunities without leaving their community.
                        </p>
                        <p>
                            Our vision extends beyond test scores and examination results. We aim to produce graduates who are not only academically accomplished but also ethically grounded, culturally aware, and equipped with the 21st-century skills needed to navigate an increasingly interconnected world.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Our Commitment ===== -->
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">Our Commitment</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mt-2 mb-6">Building the Future Together</h2>
                <p class="text-gray-600 leading-relaxed text-lg mb-8">
                    We are committed to continuous improvement — investing in our teachers, updating our facilities, 
                    expanding our programs, and strengthening our partnerships with families and the community. 
                    Together, we are building a future where every student at Kamrieng High School can dream big and achieve more.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="<?php echo e(route('about.index')); ?>" class="inline-flex items-center px-6 py-3 bg-blue-700 text-white font-semibold rounded-full hover:bg-blue-800 transition-all">
                        Learn Our History
                    </a>
                    <a href="<?php echo e(route('about.leadership')); ?>" class="inline-flex items-center px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-full hover:border-blue-700 hover:text-blue-700 transition-all">
                        Meet Our Leadership
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="py-16 sm:py-20 bg-gradient-to-br from-blue-700 to-blue-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-300 rounded-full blur-3xl -translate-x-1/3 translate-y-1/3"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Be Part of Our Story</h2>
            <p class="text-lg text-blue-100/90 mb-8 max-w-2xl mx-auto">
                Join Kamrieng High School and become part of a community dedicated to excellence, character, and service.
            </p>
            <a href="#" class="inline-flex items-center px-8 py-3.5 bg-white text-blue-700 font-semibold rounded-full hover:bg-blue-50 shadow-lg hover:shadow-xl transition-all">
                Apply Now
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/macbook/Desktop/kamrieng-highschooll/resources/views/public/mission-vision.blade.php ENDPATH**/ ?>