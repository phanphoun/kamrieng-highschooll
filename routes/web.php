<?php

use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DownloadController as AdminDownloadController;
use App\Http\Controllers\Admin\EnrollmentController as AdminEnrollmentController;
use App\Http\Controllers\Admin\EnrollmentStatsController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\LeadershipController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\NoticeController as AdminNoticeController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Public\AchievementController;
use App\Http\Controllers\Public\ActivityController;
use App\Http\Controllers\Public\CalendarController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\DonateController;
use App\Http\Controllers\Public\DownloadController;
use App\Http\Controllers\Public\EnrollmentController;
use App\Http\Controllers\Public\FacultyController;
use App\Http\Controllers\Public\GalleryController;
use App\Http\Controllers\Public\NewsController;
use App\Http\Controllers\Public\NoticeController;
use App\Http\Controllers\Public\PageController;
use App\Http\Controllers\Public\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [GalleryController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/{slug}', [ActivityController::class, 'show'])->name('activities.show');

Route::get('/achievements', [AchievementController::class, 'index'])->name('achievements.index');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/downloads', [DownloadController::class, 'index'])->name('downloads.index');
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/notices', [NoticeController::class, 'index'])->name('notices.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/enrollment', [EnrollmentController::class, 'apply'])->name('enrollment.apply');
Route::post('/enrollment', [EnrollmentController::class, 'store'])->name('enrollment.store');
Route::get('/enrollment/track', [EnrollmentController::class, 'track'])->name('enrollment.track');

Route::get('/donate', [DonateController::class, 'index'])->name('donate');

// Language switcher
Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'kh'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('language.switch');

/*
|--------------------------------------------------------------------------
| Guest / Auth Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CMS Resources
    Route::resource('news', AdminNewsController::class)->except('show');
    Route::resource('activities', AdminActivityController::class)->except('show');
    Route::resource('achievements', AdminAchievementController::class)->except('show');
    Route::resource('notices', AdminNoticeController::class)->except('show');
    Route::resource('events', AdminEventController::class)->except('show');
    Route::resource('downloads', AdminDownloadController::class)->except('show');
    Route::resource('hero-slides', HeroSlideController::class)->except('show');
    Route::resource('pages', AdminPageController::class)->except('show');
    Route::resource('leadership', LeadershipController::class)->except('show');
    Route::resource('statistics', StatisticController::class);
    Route::resource('users', UserController::class);

    // Gallery
    Route::get('gallery', [AdminGalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery/create', [AdminGalleryController::class, 'create'])->name('gallery.create');
    Route::post('gallery', [AdminGalleryController::class, 'store'])->name('gallery.store');
    Route::get('gallery/{gallery}', [AdminGalleryController::class, 'show'])->name('gallery.show');
    Route::get('gallery/{gallery}/edit', [AdminGalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('gallery/{gallery}', [AdminGalleryController::class, 'update'])->name('gallery.update');
    Route::delete('gallery/{gallery}', [AdminGalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::post('gallery/{gallery}/images', [AdminGalleryController::class, 'uploadImages'])->name('gallery.images.upload');
    Route::delete('gallery/images/{image}', [AdminGalleryController::class, 'destroyImage'])->name('gallery.images.destroy');

    // Enrollments
    Route::get('enrollments', [AdminEnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('enrollments/{enrollment}', [AdminEnrollmentController::class, 'show'])->name('enrollments.show');
    Route::put('enrollments/{enrollment}/status', [AdminEnrollmentController::class, 'updateStatus'])->name('enrollments.status');
    Route::get('enrollments/stats', [EnrollmentStatsController::class, 'index'])->name('enrollments.stats');

    // Messages
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    // Other
    Route::get('audit-logs', [AuditLogController::class, 'index'])->name('audit-logs');
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
});
