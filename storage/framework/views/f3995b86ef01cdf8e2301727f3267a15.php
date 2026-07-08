<?php $__env->startSection('title', __('navigation.news')); ?>

<?php $__env->startSection('content'); ?>
    <section class="bg-slate-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-3 mb-3">
                <span class="block h-px w-10 bg-yellow-400"></span>
                <span class="text-sm font-semibold uppercase tracking-wider text-yellow-400"><?php echo e(__('navigation.news')); ?></span>
                <span class="block h-px w-10 bg-yellow-400"></span>
            </div>
            <p class="text-slate-300"><?php echo e(__('messages.latest_news_description')); ?></p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($categories) && $categories->count() > 0): ?>
            <div class="flex flex-wrap gap-2 mb-8 justify-center">
                <a href="<?php echo e(route('news.index')); ?>" class="px-4 py-2 rounded-full text-sm font-medium <?php echo e(!request('category') ? 'bg-yellow-400 text-slate-900' : 'bg-white text-gray-600 hover:bg-gray-100'); ?> border border-gray-200 transition">
                    <?php echo e(__('messages.all')); ?>

                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('news.index', ['category' => $cat])); ?>" class="px-4 py-2 rounded-full text-sm font-medium <?php echo e(request('category') === $cat ? 'bg-yellow-400 text-slate-900' : 'bg-white text-gray-600 hover:bg-gray-100'); ?> border border-gray-200 transition">
                    <?php echo e($cat); ?>

                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('news.show', $article->slug)); ?>" class="group">
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition border border-gray-100">
                        <div class="h-48 bg-slate-900 flex items-center justify-center">
                            <svg class="w-16 h-16 text-yellow-400/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        </div>
                        <div class="p-6">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->category): ?>
                            <span class="text-xs font-medium text-yellow-600 uppercase tracking-wider"><?php echo e($article->category); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <h3 class="mt-1 text-lg font-semibold text-gray-900 group-hover:text-yellow-700 transition">
                                <?php echo e(app()->getLocale() === 'kh' && $article->title_kh ? $article->title_kh : $article->title_en); ?>

                            </h3>
                            <p class="mt-2 text-sm text-gray-600 line-clamp-2">
                                <?php echo e(Str::limit(app()->getLocale() === 'kh' && $article->excerpt_kh ? $article->excerpt_kh : $article->excerpt_en, 120)); ?>

                            </p>
                            <div class="mt-4 flex items-center text-xs text-gray-500">
                                <span><?php echo e($article->published_at?->format('M d, Y')); ?></span>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->views_count): ?>
                                <span class="ml-auto"><?php echo e($article->views_count); ?> <?php echo e(__('messages.views')); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg"><?php echo e(__('messages.no_news')); ?></p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="mt-8">
                <?php echo e($news->links()); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\phanp\Desktop\kamrieng-highschooll\resources\views/public/pages/news/index.blade.php ENDPATH**/ ?>