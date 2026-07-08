<nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200" x-data="{ showProfile: false, showNotifications: false }">
    <div class="flex items-center justify-between h-16 px-4 sm:px-6">
        
        <div class="flex items-center gap-3">
            <button type="button" class="lg:hidden text-gray-500 hover:text-gray-700 focus:outline-none" onclick="document.querySelector('.student-sidebar').classList.toggle('-translate-x-full')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center">
                    <span class="text-white font-bold text-sm">KH</span>
                </div>
                <span class="hidden sm:block text-lg font-semibold text-gray-900">Kamrieng High School</span>
            </div>
        </div>

        
        <div class="flex items-center gap-2 sm:gap-4">
            
            <div class="relative">
                <button @click="showNotifications = !showNotifications" class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>
                <div x-show="showNotifications" @click.outside="showNotifications = false" x-cloak class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden" style="display: none;">
                    <div class="px-4 py-3 border-b border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-900">Notifications</h3>
                    </div>
                    <div class="px-4 py-8 text-center text-sm text-gray-500">
                        No new notifications
                    </div>
                </div>
            </div>

            
            <div class="relative">
                <button @click="showProfile = !showProfile" class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center text-white text-sm font-medium">
                        <?php echo e(substr(Auth::user()->name, 0, 2)); ?>

                    </div>
                    <span class="hidden sm:block text-sm font-medium text-gray-700"><?php echo e(Auth::user()->name); ?></span>
                    <svg class="hidden sm:block w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="showProfile" @click.outside="showProfile = false" x-cloak class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden" style="display: none;">
                    <div class="px-4 py-3 border-b border-gray-100">
                        <p class="text-sm font-medium text-gray-900"><?php echo e(Auth::user()->name); ?></p>
                        <p class="text-xs text-gray-500"><?php echo e(Auth::user()->email); ?></p>
                    </div>
                    <div class="py-1">
                        <a href="<?php echo e(route('student.profile')); ?>" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            My Profile
                        </a>
                    </div>
                    <div class="border-t border-gray-100 py-1">
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\Users\HUT SREYPOV\Desktop\kamrieng-highschooll\resources\views/components/student-navbar.blade.php ENDPATH**/ ?>