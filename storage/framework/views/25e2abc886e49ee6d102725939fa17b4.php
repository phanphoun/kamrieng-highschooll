<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Welcome back, <?php echo e($student->name); ?>!</h1>
        <p class="mt-1 text-sm text-gray-500"><?php echo e(now()->format('l, F j, Y')); ?></p>
    </div>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        
        <div class="group relative bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md hover:border-emerald-100 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Attendance Rate</p>
                    <p class="mt-2 text-3xl font-bold <?php echo e($attendanceRate >= 80 ? 'text-emerald-600' : ($attendanceRate >= 50 ? 'text-amber-600' : 'text-red-600')); ?>"><?php echo e($attendanceRate); ?>%</p>
                    <p class="mt-1 text-xs text-gray-400"><?php echo e($totalClasses > 0 ? $presentCount . ' of ' . $totalClasses . ' days present' : 'No records yet'); ?></p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center group-hover:bg-emerald-100 transition-colors">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        
        <div class="group relative bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md hover:border-blue-100 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Upcoming</p>
                    <p class="mt-2 text-3xl font-bold text-blue-600"><?php echo e($upcomingAssignments->count()); ?></p>
                    <p class="mt-1 text-xs text-gray-400">Assignments due</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        
        <div class="group relative bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md hover:border-purple-100 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Grades</p>
                    <p class="mt-2 text-3xl font-bold text-purple-600"><?php echo e($recentGrades->count()); ?></p>
                    <p class="mt-1 text-xs text-gray-400">Recent entries</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center group-hover:bg-purple-100 transition-colors">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
            </div>
        </div>

        
        <div class="group relative bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md hover:border-amber-100 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Announcements</p>
                    <p class="mt-2 text-3xl font-bold text-amber-600"><?php echo e($announcements->count()); ?></p>
                    <p class="mt-1 text-xs text-gray-400">New updates</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center group-hover:bg-amber-100 transition-colors">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Today's Schedule</h2>
                <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full"><?php echo e(now()->format('l')); ?></span>
            </div>

            <?php if($schedule->count() > 0): ?>
                <div class="space-y-3">
                    <?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center gap-4 p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                            <div class="w-16 text-center">
                                <p class="text-xs font-medium text-gray-500"><?php echo e(\Carbon\Carbon::parse($slot->start_time)->format('g:i A')); ?></p>
                            </div>
                            <div class="w-0.5 h-10 bg-emerald-300 rounded-full"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900"><?php echo e($slot->subject->name ?? 'Subject'); ?></p>
                                <p class="text-xs text-gray-500">Room <?php echo e($slot->room ?? 'N/A'); ?></p>
                            </div>
                            <span class="text-xs text-gray-400"><?php echo e(\Carbon\Carbon::parse($slot->start_time)->format('g:i')); ?> - <?php echo e(\Carbon\Carbon::parse($slot->end_time)->format('g:i A')); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="py-8 text-center">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-sm text-gray-500">No classes scheduled for today</p>
                </div>
            <?php endif; ?>

            <div class="mt-4 pt-3 border-t border-gray-100">
                <a href="<?php echo e(route('student.schedule')); ?>" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">View full schedule →</a>
            </div>
        </div>

        
        <div class="space-y-6">
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Grades</h2>
                <?php if($recentGrades->count() > 0): ?>
                    <div class="space-y-3">
                        <?php $__currentLoopData = $recentGrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between p-2.5 rounded-lg hover:bg-gray-50 transition-colors">
                                <div>
                                    <p class="text-sm font-medium text-gray-900"><?php echo e($grade->subject->name ?? 'Subject'); ?></p>
                                    <p class="text-xs text-gray-500"><?php echo e($grade->schoolClass->name ?? ''); ?></p>
                                </div>
                                <span class="px-2.5 py-1 text-sm font-semibold rounded-full
                                    <?php echo e(($grade->grade_letter ?? 'N/A') == 'A' ? 'bg-emerald-100 text-emerald-700' : ''); ?>

                                    <?php echo e(($grade->grade_letter ?? 'N/A') == 'B' ? 'bg-blue-100 text-blue-700' : ''); ?>

                                    <?php echo e(($grade->grade_letter ?? 'N/A') == 'C' ? 'bg-amber-100 text-amber-700' : ''); ?>

                                    <?php echo e(($grade->grade_letter ?? 'N/A') == 'D' ? 'bg-orange-100 text-orange-700' : ''); ?>

                                    <?php echo e(($grade->grade_letter ?? 'N/A') == 'F' ? 'bg-red-100 text-red-700' : ''); ?>

                                    <?php echo e(!in_array($grade->grade_letter ?? 'N/A', ['A','B','C','D','F']) ? 'bg-gray-100 text-gray-600' : ''); ?>">
                                    <?php echo e($grade->grade_letter ?? 'N/A'); ?>

                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="py-6 text-center">
                        <p class="text-sm text-gray-500">No grades recorded yet</p>
                    </div>
                <?php endif; ?>
                <div class="mt-3 pt-3 border-t border-gray-100">
                    <a href="<?php echo e(route('student.grades')); ?>" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">View all grades →</a>
                </div>
            </div>

            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Announcements</h2>
                <?php if($announcements->count() > 0): ?>
                    <div class="space-y-3">
                        <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="p-3 rounded-lg bg-amber-50 border border-amber-100">
                                <div class="flex items-center gap-2 mb-1">
                                    <?php if($announcement->priority === 'high'): ?>
                                        <span class="px-1.5 py-0.5 text-xs font-medium bg-red-100 text-red-700 rounded">Urgent</span>
                                    <?php endif; ?>
                                </div>
                                <p class="text-sm font-medium text-gray-900"><?php echo e($announcement->title); ?></p>
                                <p class="text-xs text-gray-500 mt-1"><?php echo e(Str::limit($announcement->content, 100)); ?></p>
                                <p class="text-xs text-gray-400 mt-1"><?php echo e($announcement->created_at->diffForHumans()); ?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="py-6 text-center">
                        <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                        </svg>
                        <p class="text-sm text-gray-500">No announcements</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-gray-900">Upcoming Assignments</h2>
            <a href="<?php echo e(route('student.assignments')); ?>" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">View all →</a>
        </div>

        <?php if($upcomingAssignments->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="text-left py-3 px-2 font-medium text-gray-500">Title</th>
                            <th class="text-left py-3 px-2 font-medium text-gray-500">Subject</th>
                            <th class="text-left py-3 px-2 font-medium text-gray-500">Due Date</th>
                            <th class="text-right py-3 px-2 font-medium text-gray-500">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $upcomingAssignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                                <td class="py-3 px-2">
                                    <a href="<?php echo e(route('student.assignments.show', $assignment->id)); ?>" class="text-gray-900 font-medium hover:text-emerald-600">
                                        <?php echo e($assignment->title); ?>

                                    </a>
                                </td>
                                <td class="py-3 px-2 text-gray-600"><?php echo e($assignment->subject->name ?? 'N/A'); ?></td>
                                <td class="py-3 px-2">
                                    <span class="inline-flex items-center gap-1 <?php echo e($assignment->due_date->isPast() ? 'text-red-600' : 'text-amber-600'); ?>">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <?php echo e($assignment->due_date->format('M d, Y')); ?>

                                    </span>
                                </td>
                                <td class="py-3 px-2 text-right">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full <?php echo e($assignment->due_date->isPast() ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700'); ?>">
                                        <?php echo e($assignment->due_date->isPast() ? 'Overdue' : 'Pending'); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="py-8 text-center">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p class="text-sm text-gray-500">No upcoming assignments</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HUT SREYPOV\Desktop\kamrieng-highschooll\resources\views/student/dashboard.blade.php ENDPATH**/ ?>