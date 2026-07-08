
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(app()->getLocale() === 'kh' ? 'ltr' : 'ltr'); ?>">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($siteSettings?->school_name_en ?? 'EduKhmer High School'); ?> | <?php echo $__env->yieldContent('title', __('messages.home')); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', $siteSettings?->about_description_en ?? ''); ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body class="font-sans antialiased text-gray-900 bg-gray-50">

    <!-- Navigation -->
    <?php if (isset($component)) { $__componentOriginal5512d826d67684d7a6f463d4adf4e0a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5512d826d67684d7a6f463d4adf4e0a7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.public.public-nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('public.public-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5512d826d67684d7a6f463d4adf4e0a7)): ?>
<?php $attributes = $__attributesOriginal5512d826d67684d7a6f463d4adf4e0a7; ?>
<?php unset($__attributesOriginal5512d826d67684d7a6f463d4adf4e0a7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5512d826d67684d7a6f463d4adf4e0a7)): ?>
<?php $component = $__componentOriginal5512d826d67684d7a6f463d4adf4e0a7; ?>
<?php unset($__componentOriginal5512d826d67684d7a6f463d4adf4e0a7); ?>
<?php endif; ?>
    <!-- Page Content -->

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <?php if (isset($component)) { $__componentOriginal35f4372b50a8f8992db88e865391b671 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal35f4372b50a8f8992db88e865391b671 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.public.public-footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('public.public-footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal35f4372b50a8f8992db88e865391b671)): ?>
<?php $attributes = $__attributesOriginal35f4372b50a8f8992db88e865391b671; ?>
<?php unset($__attributesOriginal35f4372b50a8f8992db88e865391b671); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal35f4372b50a8f8992db88e865391b671)): ?>
<?php $component = $__componentOriginal35f4372b50a8f8992db88e865391b671; ?>
<?php unset($__componentOriginal35f4372b50a8f8992db88e865391b671); ?>
<?php endif; ?>

    <!-- Toast Messages -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\phanp\Desktop\kamrieng-highschooll\resources\views/layouts/app.blade.php ENDPATH**/ ?>