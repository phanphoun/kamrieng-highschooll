<?php $__env->startSection('title', __('messages.achievements_title', ['lang' => 'Achievements'])); ?>

<?php $__env->startSection('content'); ?>
    <section class="bg-slate-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-3 mb-3">
                <span class="block h-px w-10 bg-yellow-400"></span>
                <span class="text-sm font-semibold uppercase tracking-wider text-yellow-400"><?php echo e(__('messages.achievements_title', ['lang' => 'Achievements'])); ?></span>
                <span class="block h-px w-10 bg-yellow-400"></span>
            </div>
            <p class="text-slate-300"><?php echo e(__('messages.achievements_description') ?? __('messages.school_description_short')); ?></p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition border border-gray-100">
                    <div class="h-48 bg-slate-900 flex items-center justify-center">
                        <span class="text-yellow-400 font-bold text-2xl"><?php echo e(__('messages.award', ['lang' => 'Award'])); ?></span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900"><?php echo e(app()->getLocale() === 'kh' && $item->title_kh ? $item->title_kh : $item->title_en); ?></h3>
                        <p class="mt-2 text-sm text-gray-600 line-clamp-2"><?php echo e(app()->getLocale() === 'kh' && $item->description_kh ? $item->description_kh : $item->description_en); ?></p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-xs font-medium text-yellow-600 uppercase tracking-wider"><?php echo e($item->category); ?></span>
                            <span class="text-xs text-gray-500"><?php echo e($item->achieved_at?->format('Y') ?? ''); ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500"><?php echo e(__('messages.no_achievements') ?? 'No achievements yet.'); ?></p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/macbook/Desktop/kamrieng-highschooll/resources/views/public/pages/achievements.blade.php ENDPATH**/ ?>