<?php $__env->startSection('title', 'Leadership - Kamrieng High School'); ?>

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
                    <span class="text-white">Leadership</span>
                </nav>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-200 border border-blue-400/30 mb-4">
                    Our Team
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-4">
                    School Leadership
                </h1>
                <p class="text-lg sm:text-xl text-blue-100/90 leading-relaxed max-w-2xl">
                    Meet the dedicated team leading Kamrieng High School — from administration to department heads, committed to educational excellence.
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
                <a href="<?php echo e(route('about.mission-vision')); ?>" class="shrink-0 py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 border-b-2 border-transparent hover:border-gray-300 whitespace-nowrap transition-colors">Mission &amp; Vision</a>
                <a href="<?php echo e(route('about.leadership')); ?>" class="shrink-0 py-4 px-1 text-sm font-medium text-blue-700 border-b-2 border-blue-700 whitespace-nowrap">Leadership</a>
            </nav>
        </div>
    </section>

    <!-- ===== Admin Team ===== -->
    <section class="py-16 sm:py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">School Administration</h2>
                <p class="text-gray-600 leading-relaxed">
                    Our administrative leadership team brings decades of experience and a shared vision for educational excellence.
                </p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                <?php $__empty_1 = true; $__currentLoopData = $leadershipTeam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition-all overflow-hidden">
                        <!-- Photo placeholder -->
                        <div class="aspect-[3/2] bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center">
                            <?php if($member['photo']): ?>
                                <img src="<?php echo e($member['photo']); ?>" alt="<?php echo e($member['name']); ?>" class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-20 h-20 bg-blue-200 rounded-full flex items-center justify-center">
                                    <span class="text-2xl font-bold text-blue-700"><?php echo e(substr($member['name'], 0, 1)); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900"><?php echo e($member['name']); ?></h3>
                            <p class="text-sm text-blue-700 font-medium mt-1"><?php echo e($member['position']); ?></p>
                            <?php if($member['bio']): ?>
                                <p class="text-sm text-gray-500 mt-3 leading-relaxed"><?php echo e($member['bio']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-500 col-span-full text-center py-12">Leadership team information coming soon.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- ===== Message from the Principal ===== -->
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl p-8 sm:p-10 lg:p-12 shadow-sm border border-gray-100">
                    <div class="flex flex-col sm:flex-row items-start gap-6 sm:gap-8">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center shrink-0">
                            <span class="text-3xl font-bold text-blue-700">PD</span>
                        </div>
                        <div>
                            <span class="text-blue-700 font-semibold text-sm uppercase tracking-wider">From the Principal's Desk</span>
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2 mb-4">A Message from Our Principal</h2>
                            <blockquote class="text-gray-600 leading-relaxed italic border-l-4 border-blue-700 pl-4 sm:pl-6 mb-4">
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

    <!-- =CTA ===== -->
    <section class="py-16 sm:py-20 bg-gradient-to-br from-blue-700 to-blue-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-300 rounded-full blur-3xl -translate-x-1/3 translate-y-1/3"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Get in Touch</h2>
            <p class="text-lg text-blue-100/90 mb-8 max-w-2xl mx-auto">
                Have questions about our school? We'd love to hear from you.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#" class="inline-flex items-center px-8 py-3.5 bg-white text-blue-700 font-semibold rounded-full hover:bg-blue-50 shadow-lg hover:shadow-xl transition-all">
                    Contact Us
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="<?php echo e(route('about.index')); ?>" class="inline-flex items-center px-8 py-3.5 border-2 border-white/30 text-white font-semibold rounded-full hover:bg-white/10 transition-all">
                    Learn More About Us
                </a>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/macbook/Desktop/kamrieng-highschooll/resources/views/public/leadership.blade.php ENDPATH**/ ?>