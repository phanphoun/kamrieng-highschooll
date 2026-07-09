<nav x-data="{ mobileOpen: false, moreOpen: false, scrolled: false }"
     x-init="scrolled = window.scrollY > 20"
     @scroll.window="scrolled = window.scrollY > 20"
     :class="scrolled ? 'shadow-lg h-20' : 'h-24'"
     class="sticky top-0 z-50 bg-school-navy text-white transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
        <div class="flex items-center justify-between h-full">
            <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 group">
                <div class="w-12 h-12 bg-school-gold rounded-xl flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform duration-300">
                    <span class="text-white font-bold text-xl">ក</span>
                </div>
                <div>
                    <p class="font-extrabold text-school-gold text-lg leading-tight"><?php echo e($siteSettings?->school_name_en ?? 'EduKhmer'); ?></p>
                    <p class="text-school-muted text-base leading-tight">High School</p>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-8">
                <a href="<?php echo e(route('home')); ?>" class="relative text-base font-bold transition <?php echo e(request()->routeIs('home') ? 'text-school-gold' : 'text-school-muted hover:text-white'); ?>">
                    <?php echo e(__('navigation.home')); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->routeIs('home')): ?>
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>
                <a href="<?php echo e(route('about')); ?>" class="relative text-base font-bold transition <?php echo e(request()->routeIs('about') ? 'text-school-gold' : 'text-school-muted hover:text-white'); ?>">
                    <?php echo e(__('navigation.about')); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->routeIs('about')): ?>
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>
                <a href="<?php echo e(route('news.index')); ?>" class="relative text-base font-bold transition <?php echo e(request()->routeIs('news.*') ? 'text-school-gold' : 'text-school-muted hover:text-white'); ?>">
                    <?php echo e(__('navigation.news')); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->routeIs('news.*')): ?>
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>
                <a href="<?php echo e(route('activities.index')); ?>" class="relative text-base font-bold transition <?php echo e(request()->routeIs('activities.*') ? 'text-school-gold' : 'text-school-muted hover:text-white'); ?>">
                    <?php echo e(__('navigation.activities')); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->routeIs('activities.*')): ?>
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>
                <a href="<?php echo e(route('achievements.index')); ?>" class="relative text-base font-bold transition <?php echo e(request()->routeIs('achievements.*') ? 'text-school-gold' : 'text-school-muted hover:text-white'); ?>">
                    <?php echo e(__('navigation.achievements')); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->routeIs('achievements.*')): ?>
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>
                <a href="<?php echo e(route('gallery.index')); ?>" class="relative text-base font-bold transition <?php echo e(request()->routeIs('gallery.*') ? 'text-school-gold' : 'text-school-muted hover:text-white'); ?>">
                    <?php echo e(__('navigation.gallery')); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->routeIs('gallery.*')): ?>
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>
                <a href="<?php echo e(route('calendar.index')); ?>" class="relative text-base font-bold transition <?php echo e(request()->routeIs('calendar.*') ? 'text-school-gold' : 'text-school-muted hover:text-white'); ?>">
                    <?php echo e(__('navigation.calendar')); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->routeIs('calendar.*')): ?>
                        <span class="absolute -bottom-4 left-1/2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-school-gold"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>

                <div class="relative" x-data="{ open: false }">
                    <button type="button" @click="open = !open" class="inline-flex items-center gap-1 text-base font-bold text-school-muted hover:text-white transition">
                        <?php echo e(__('navigation.more')); ?>

                        <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" class="absolute right-0 mt-4 w-48 rounded-xl bg-white py-2 text-slate-700 shadow-xl border border-slate-100" style="display: none;">
                        <a href="<?php echo e(route('downloads.index')); ?>" class="block px-4 py-2.5 text-sm font-semibold hover:bg-slate-50 hover:text-school-blue transition"><?php echo e(__('navigation.downloads')); ?></a>
                        <a href="<?php echo e(route('faculty.index')); ?>" class="block px-4 py-2.5 text-sm font-semibold hover:bg-slate-50 hover:text-school-blue transition"><?php echo e(__('navigation.faculty')); ?></a>
                        <a href="<?php echo e(route('notices.index')); ?>" class="block px-4 py-2.5 text-sm font-semibold hover:bg-slate-50 hover:text-school-blue transition"><?php echo e(__('navigation.notices')); ?></a>
                        <a href="<?php echo e(route('contact')); ?>" class="block px-4 py-2.5 text-sm font-semibold hover:bg-slate-50 hover:text-school-blue transition"><?php echo e(__('navigation.contact')); ?></a>
                    </div>
                </div>
            </div>

            <div class="hidden lg:flex items-center gap-4">
                <a href="<?php echo e(route('search')); ?>" class="text-school-muted hover:text-white transition" aria-label="Search">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5.2-5.2m1.7-5.3a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </a>
                <a href="<?php echo e(route('language.switch', app()->getLocale() === 'kh' ? 'en' : 'kh')); ?>" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-school-gold/60 text-school-gold text-sm font-bold hover:bg-school-gold hover:text-school-navy transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3a9 9 0 100 18 9 9 0 000-18zM3 12h18M12 3c2.25 2.45 3.4 5.45 3.4 9s-1.15 6.55-3.4 9c-2.25-2.45-3.4-5.45-3.4-9S9.75 5.45 12 3z"/>
                    </svg>
                    <?php echo e(app()->getLocale() === 'kh' ? 'EN' : 'ខ្មែរ'); ?>

                </a>
                <a href="<?php echo e(route('enrollment.apply')); ?>" class="px-6 py-3 rounded-full bg-school-blue text-white text-sm font-extrabold hover:bg-school-blue-hover transition shadow-md hover:shadow-lg hover:-translate-y-0.5">
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
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('home')).'','active' => request()->routeIs('home')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('home')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('home'))]); ?><?php echo e(__('navigation.home')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('about')).'','active' => request()->routeIs('about')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('about')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('about'))]); ?><?php echo e(__('navigation.about')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('news.index')).'','active' => request()->routeIs('news.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('news.index')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('news.*'))]); ?><?php echo e(__('navigation.news')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('activities.index')).'','active' => request()->routeIs('activities.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('activities.index')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('activities.*'))]); ?><?php echo e(__('navigation.activities')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('achievements.index')).'','active' => request()->routeIs('achievements.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('achievements.index')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('achievements.*'))]); ?><?php echo e(__('navigation.achievements')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('gallery.index')).'','active' => request()->routeIs('gallery.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('gallery.index')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('gallery.*'))]); ?><?php echo e(__('navigation.gallery')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('calendar.index')).'','active' => request()->routeIs('calendar.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('calendar.index')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('calendar.*'))]); ?><?php echo e(__('navigation.calendar')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('downloads.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('downloads.index')).'']); ?><?php echo e(__('navigation.downloads')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('faculty.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('faculty.index')).'']); ?><?php echo e(__('navigation.faculty')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('notices.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('notices.index')).'']); ?><?php echo e(__('navigation.notices')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('contact')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('contact')).'']); ?><?php echo e(__('navigation.contact')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('enrollment.apply')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('enrollment.apply')).'']); ?>Enroll Now <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('language.switch', app()->getLocale() === 'kh' ? 'en' : 'kh')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('language.switch', app()->getLocale() === 'kh' ? 'en' : 'kh')).'']); ?><?php echo e(app()->getLocale() === 'kh' ? 'English' : 'ភាសាខ្មែរ'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $attributes = $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8)): ?>
<?php $component = $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8; ?>
<?php unset($__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8); ?>
<?php endif; ?>
        </div>
    </div>
</nav>
<?php /**PATH /Users/macbook/Desktop/kamrieng-highschooll/resources/views/components/public/public-nav.blade.php ENDPATH**/ ?>