<div x-data="{ open: false }" <?php echo e($attributes->merge(['class' => 'relative'])); ?>>
    <!-- Toggle Button -->
    <button @click="open = !open" @keydown.escape.window="open = false"
            type="button"
            aria-haspopup="true"
            :aria-expanded="open.toString()"
            aria-label="<?php echo e(app()->getLocale() === 'en' ? 'Switch language' : 'ប្តូរភាសា'); ?>"
            class="flex items-center gap-2 px-3 py-2 text-xs font-semibold border rounded transition
                   <?php echo e(($navbar ?? true) ? 'border-yellow-400/40 text-yellow-300 hover:bg-yellow-400 hover:text-slate-900' : 'border-gray-300 text-gray-700 hover:bg-gray-100 hover:text-primary-600'); ?>

                   <?php echo e($attributes->has('class') && str_contains($attributes->get('class'), 'w-full') ? 'w-full justify-center' : ''); ?>">
        <!-- Globe icon -->
        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span><?php echo e(app()->getLocale() === 'en' ? 'EN' : 'KH'); ?></span>
        <!-- Chevron -->
        <svg class="w-3 h-3 transition-transform duration-200 shrink-0" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <!-- Dropdown -->
    <div x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-1"
         @click.away="open = false"
         role="menu"
         class="absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-xl border border-gray-200 z-50 overflow-hidden">
        <!-- English -->
        <a href="<?php echo e(route('language.switch', 'en')); ?>" role="menuitem"
           class="flex items-center gap-3 px-4 py-3 text-sm transition <?php echo e(app()->getLocale() === 'en' ? 'bg-primary-50 text-primary-700 font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900'); ?>">
            <span class="text-base leading-none">🇬🇧</span>
            <span>English</span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(app()->getLocale() === 'en'): ?>
                <svg class="w-4 h-4 ml-auto text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </a>
        <!-- Divider -->
        <div class="border-t border-gray-100" role="separator"></div>
        <!-- Khmer -->
        <a href="<?php echo e(route('language.switch', 'kh')); ?>" role="menuitem"
           class="flex items-center gap-3 px-4 py-3 text-sm transition <?php echo e(app()->getLocale() === 'kh' ? 'bg-primary-50 text-primary-700 font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900'); ?>">
            <span class="text-base leading-none">🇰🇭</span>
            <span>ភាសាខ្មែរ</span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(app()->getLocale() === 'kh'): ?>
                <svg class="w-4 h-4 ml-auto text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </a>
    </div>
</div>
<?php /**PATH C:\Users\HUT SREYPOV\Desktop\kamrieng-highschooll\resources\views/components/public/language-toggle.blade.php ENDPATH**/ ?>