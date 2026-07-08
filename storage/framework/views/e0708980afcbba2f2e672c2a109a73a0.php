<?php $__env->startSection('title', __('navigation.donate')); ?>

<?php $__env->startSection('content'); ?>
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4"><?php echo e(__('navigation.donate')); ?></h1>
            <p class="text-xl text-primary-100"><?php echo e(__('messages.donate_description') ?? 'Support education and make a difference.'); ?></p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4"><?php echo e(__('messages.support_our_school') ?? 'Support Our School'); ?></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    <?php echo e(__('messages.donate_body') ?? 'Your generous donation helps us provide better educational resources, facilities, and opportunities for our students. Every contribution makes a difference in shaping the future of Cambodia\'s youth.'); ?>

                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="text-3xl font-bold text-primary-600 mb-2">$10</div>
                    <p class="text-gray-600 text-sm"><?php echo e(__('messages.donate_tier_1') ?? 'Supplies for one student'); ?></p>
                </div>
                <div class="text-center p-6 bg-primary-50 rounded-xl border-2 border-primary-200">
                    <div class="text-3xl font-bold text-primary-600 mb-2">$50</div>
                    <p class="text-gray-600 text-sm"><?php echo e(__('messages.donate_tier_2') ?? 'Funds a scholarship for a month'); ?></p>
                </div>
                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="text-3xl font-bold text-primary-600 mb-2">$100</div>
                    <p class="text-gray-600 text-sm"><?php echo e(__('messages.donate_tier_3') ?? 'Supports a lab or library'); ?></p>
                </div>
            </div>

            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <h3 class="text-xl font-semibold text-gray-900 mb-4"><?php echo e(__('messages.bank_transfer') ?? 'Bank Transfer'); ?></h3>
                <p class="text-gray-600 mb-2"><?php echo e(__('messages.bank_name') ?? 'Cambodia Bank PLC'); ?></p>
                <p class="text-gray-600 mb-2"><?php echo e(__('messages.account_name') ?? 'Account Name: EduKhmer High School'); ?></p>
                <p class="text-gray-600 mb-2"><?php echo e(__('messages.account_number') ?? 'Account Number: 1234-5678-9012'); ?></p>
                <p class="text-gray-500 text-sm mt-4"><?php echo e(__('messages.donate_note') ?? 'Please include your name and contact information with your donation.'); ?></p>
            </div>

            <div class="text-center mt-8">
                <a href="<?php echo e(route('contact')); ?>" class="inline-block px-8 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition">
                    <?php echo e(__('messages.contact_us_for_details') ?? 'Contact Us for More Details'); ?>

                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\phanp\Desktop\kamrieng-highschooll\resources\views/public/pages/donate.blade.php ENDPATH**/ ?>