<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\NewsController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\SchoolClassController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;

// Teacher Controllers
use App\Http\Controllers\Admin\DashboardController as TeacherDashboardController;
use App\Http\Controllers\Teacher\AttendanceController as TeacherAttendanceController;
use App\Http\Controllers\Teacher\AssignmentController as TeacherAssignmentController;
use App\Http\Controllers\Teacher\GradeController as TeacherGradeController;

// Student Controllers
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\AttendanceController as StudentAttendanceController;
use App\Http\Controllers\Student\AssignmentController as StudentAssignmentController;
use App\Http\Controllers\Student\GradeController as StudentGradeController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\ScheduleController;

use App\Http\Controllers\AboutController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\HomeController;

// Locale switcher
Route::get('/locale/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'kh'])) {
        abort(404);
    }
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return redirect()->back();
})->name('locale.switch');

// Public News Routes
Route::prefix('news')->name('public.news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{news:slug}', [NewsController::class, 'show'])->name('show');
});

Route::get('/', function () {
    return view('welcome');
});

// Placeholder dashboards so the post-login role redirect (T-03) works.
// These will be replaced by real role route groups + middleware in T-11 (US-02).
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard.placeholder')->name('dashboard');
    Route::view('/admin/dashboard', 'dashboard.placeholder')->name('admin.dashboard');
    Route::view('/teacher/dashboard', 'dashboard.placeholder')->name('teacher.dashboard');
    Route::view('/student/dashboard', 'dashboard.placeholder')->name('student.dashboard');
    Route::view('/parent/dashboard', 'dashboard.placeholder')->name('parent.dashboard');
    Route::view('/editor/dashboard', 'dashboard.placeholder')->name('editor.dashboard');
});

// Public Pages — About Section
Route::prefix('/about')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('index');
    Route::get('/mission-vision', [AboutController::class, 'missionVision'])->name('mission-vision');
    Route::get('/leadership', [AboutController::class, 'leadership'])->name('leadership');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('students', StudentController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('users', UserController::class);
        Route::resource('school-classes', SchoolClassController::class);
        Route::resource('announcements', AnnouncementController::class);
    });

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'teacher'])
    ->prefix('teacher')
    ->name('teacher.')
    ->group(function () {

        Route::get('/dashboard', [TeacherDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('attendance', TeacherAttendanceController::class);
        Route::resource('assignments', TeacherAssignmentController::class);
        Route::resource('grades', TeacherGradeController::class);
    });

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {

        Route::get('/dashboard', [StudentDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('attendance', StudentAttendanceController::class);
        Route::resource('assignments', StudentAssignmentController::class);
        Route::resource('grades', StudentGradeController::class);
        Route::resource('profile', ProfileController::class);
        Route::resource('schedule', ScheduleController::class);
    });
