<nav x-data="{ mobileOpen: false, moreOpen: false }" class="bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">ក</span>
                    </div>
                    <div class="hidden sm:block">
                        <p class="font-bold text-white text-sm leading-tight">វិទ្យាស្ថាន</p>
                        <p class="text-xs text-primary-200 leading-tight">រដ្ឋបាល</p>
                    </div>
                </a>
            </div>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="<?php echo e(route('home')); ?>" class="px-3 py-2 text-sm font-medium text-white hover:text-primary-200 transition relative">
                    <?php echo e(__('navigation.home')); ?>

                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-1 w-1 rounded-full bg-yellow-400"></span>
                </a>
                <a href="<?php echo e(route('about')); ?>" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition"><?php echo e(__('navigation.about')); ?></a>
                <a href="<?php echo e(route('news.index')); ?>" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition"><?php echo e(__('navigation.news')); ?></a>
                <a href="<?php echo e(route('faculty.index')); ?>" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition"><?php echo e(__('navigation.faculty')); ?></a>
                <a href="<?php echo e(route('achievements.index')); ?>" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition"><?php echo e(__('navigation.achievements')); ?></a>
                <a href="<?php echo e(route('gallery.index')); ?>" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition"><?php echo e(__('navigation.gallery')); ?></a>
                <a href="<?php echo e(route('enrollment.apply')); ?>" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition"><?php echo e(__('navigation.enrollment')); ?></a>

                <!-- More dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition inline-flex items-center gap-1">
                        <?php echo e(__('navigation.more')); ?>

                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-1 w-40 bg-white text-gray-800 rounded-lg shadow-lg border border-gray-200 z-50">
                        <a href="<?php echo e(route('activities.index')); ?>" class="block px-4 py-2 text-sm hover:bg-gray-100"><?php echo e(__('navigation.activities')); ?></a>
                        <a href="<?php echo e(route('downloads.index')); ?>" class="block px-4 py-2 text-sm hover:bg-gray-100"><?php echo e(__('navigation.downloads')); ?></a>
                        <a href="<?php echo e(route('calendar.index')); ?>" class="block px-4 py-2 text-sm hover:bg-gray-100"><?php echo e(__('navigation.calendar')); ?></a>
                        <a href="<?php echo e(route('donate')); ?>" class="block px-4 py-2 text-sm hover:bg-gray-100"><?php echo e(__('navigation.donate')); ?></a>
                    </div>
                </div>
            </div>

            <!-- Right Controls -->
            <div class="hidden md:flex items-center space-x-3">
                <a href="<?php echo e(route('search')); ?>" class="p-2 text-primary-100 hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </a>
                <a href="<?php echo e(route('language.switch', app()->getLocale() === 'kh' ? 'en' : 'kh')); ?>" class="px-2 py-1 text-xs font-semibold border border-yellow-400 text-yellow-400 rounded hover:bg-yellow-400 hover:text-slate-900 transition">
                    <?php echo e(app()->getLocale() === 'kh' ? 'EN' : 'ខ្មែរ'); ?>

                </a>
                <a href="<?php echo e(route('contact')); ?>" class="px-5 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700 transition shadow-sm">
                    <?php echo e(__('navigation.contact')); ?>

                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileOpen = !mobileOpen" class="p-2 rounded-md text-primary-100 hover:text-white hover:bg-slate-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': mobileOpen, 'block': !mobileOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'block': mobileOpen, 'hidden': !mobileOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileOpen" @click.away="mobileOpen = false" class="md:hidden border-t border-slate-800 bg-slate-900">
        <div class="px-4 py-3 space-y-1">
            <?php if (isset($component)) { $__componentOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9b8061a2b5f0583b87eb3b602dccb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('home')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('home')).'']); ?><?php echo e(__('navigation.home')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('about')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('about')).'']); ?><?php echo e(__('navigation.about')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('news.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('news.index')).'']); ?><?php echo e(__('navigation.news')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('achievements.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('achievements.index')).'']); ?><?php echo e(__('navigation.achievements')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('gallery.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('gallery.index')).'']); ?><?php echo e(__('navigation.gallery')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes(['href' => ''.e(route('enrollment.apply')).'']); ?><?php echo e(__('navigation.enrollment')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('activities.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('activities.index')).'']); ?><?php echo e(__('navigation.activities')); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.mobile-nav-link','data' => ['href' => ''.e(route('language.switch', app()->getLocale() === 'kh' ? 'en' : 'kh')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.mobile-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('language.switch', app()->getLocale() === 'kh' ? 'en' : 'kh')).'']); ?><?php echo e(app()->getLocale() === 'kh' ? 'EN' : 'ខ្មែរ'); ?> <?php echo $__env->renderComponent(); ?>
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
<?php /**PATH C:\Users\phanp\Desktop\kamrieng-highschooll\resources\views/components/public/public-nav.blade.php ENDPATH**/ ?>