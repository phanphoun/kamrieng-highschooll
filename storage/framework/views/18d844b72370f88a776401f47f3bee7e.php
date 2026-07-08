<?php $__env->startSection('title', $article->title_en); ?>

<?php $__env->startSection('content'); ?>
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-sm text-primary-200 mb-4">
                <a href="<?php echo e(route('news.index')); ?>" class="hover:text-white transition"><?php echo e(__('navigation.news')); ?></a>
                <span class="mx-2">/</span>
                <span><?php echo e(Str::limit(app()->getLocale() === 'kh' && $article->title_kh ? $article->title_kh : $article->title_en, 60)); ?></span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold"><?php echo e(app()->getLocale() === 'kh' && $article->title_kh ? $article->title_kh : $article->title_en); ?></h1>
            <div class="mt-4 flex items-center text-primary-200 text-sm">
                <span><?php echo e($article->published_at?->format('F d, Y')); ?></span>
                <span class="mx-2">|</span>
                <span><?php echo e($article->views_count); ?> <?php echo e(__('messages.views')); ?></span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->category): ?>
                <span class="mx-2">|</span>
                <span class="bg-white/20 px-3 py-1 rounded-full text-xs"><?php echo e($article->category); ?></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none">
                <?php echo app()->getLocale() === 'kh' && $article->content_kh ? $article->content_kh : $article->content_en; ?>

            </div>
        </div>
    </section>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($relatedNews) && $relatedNews->count() > 0): ?>
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8"><?php echo e(__('messages.related_news')); ?></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('news.show', $related->slug)); ?>" class="group">
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition">
                        <h3 class="font-semibold text-gray-900 group-hover:text-primary-600 transition">
                            <?php echo e(app()->getLocale() === 'kh' && $related->title_kh ? $related->title_kh : $related->title_en); ?>

                        </h3>
                        <p class="mt-2 text-sm text-gray-500"><?php echo e($related->published_at?->format('M d, Y')); ?></p>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\phanp\Desktop\kamrieng-highschooll\resources\views/public/pages/news/show.blade.php ENDPATH**/ ?>