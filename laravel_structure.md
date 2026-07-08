# 📁 Laravel Blade Folder Structure — EduKhmer High School Website

Complete folder structure for building this project with **Laravel 11 + Blade + Livewire + Tailwind CSS**.

---

## 🗂️ Root Directory

```
edukhmer/
├── app/                          # Application core (PHP)
├── bootstrap/                    # Framework bootstrap & caching
├── config/                       # Configuration files
├── database/                     # Migrations, seeders, factories
├── lang/                         # Localization (EN/KH)
├── public/                       # Publicly accessible assets
├── resources/                    # Views, CSS, JS, lang
├── routes/                       # Route definitions
├── storage/                      # Logs, uploads, cache
├── tests/                        # Pest tests
├── .env                          # Environment variables
├── .env.example                  # Template for .env
├── .gitignore
├── composer.json                 # PHP dependencies
├── package.json                  # Node dependencies
├── vite.config.js                # Vite build config
├── tailwind.config.js            # Tailwind config
├── postcss.config.js
├── phpunit.xml / pest.php        # Test config
├── artisan                       # CLI entry point
└── README.md
```

---

## ⚙️ app/ — Application Logic

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Controller.php                 # Base controller
│   │   ├── Public/
│   │   │   ├── PageController.php         # Home, About, Sitemap
│   │   │   ├── NewsController.php         # News index + detail
│   │   │   ├── ActivityController.php     # Activities
│   │   │   ├── AchievementController.php # Achievements
│   │   │   ├── GalleryController.php      # Gallery albums
│   │   │   ├── CalendarController.php     # Events calendar
│   │   │   ├── DownloadController.php     # Downloads
│   │   │   ├── FacultyController.php      # Leadership directory
│   │   │   ├── SearchController.php       # Full-text search
│   │   │   ├── ContactController.php      # Contact form
│   │   │   ├── EnrollmentController.php   # Enrollment submission + tracking
│   │   │   └── DonateController.php       # Donation page
│   │   ├── Auth/
│   │   │   ├── AuthenticatedSessionController.php   # Login
│   │   │   ├── RegisteredUserController.php         # Register
│   │   │   ├── PasswordResetLinkController.php      # Forgot password
│   │   │   └── NewPasswordController.php            # Reset password
│   │   └── Admin/
│   │       ├── DashboardController.php              # Admin dashboard
│   │       ├── NewsController.php                   # News CMS
│   │       ├── ActivityController.php               # Activities CMS
│   │       ├── AchievementController.php            # Achievements CMS
│   │       ├── GalleryController.php                # Gallery CMS
│   │       ├── EventController.php                  # Events CMS
│   │       ├── NoticeController.php                 # Notices CMS
│   │       ├── DownloadController.php               # Downloads CMS
│   │       ├── HeroSlideController.php              # Hero slides CMS
│   │       ├── PageController.php                    # Static pages CMS
│   │       ├── LeadershipController.php             # Leadership CMS
│   │       ├── EnrollmentController.php             # Enrollment review
│   │       ├── EnrollmentStatsController.php        # Enrollment analytics
│   │       ├── MessageController.php                # Contact messages inbox
│   │       ├── StatisticsController.php             # School statistics
│   │       ├── UserController.php                    # User management
│   │       ├── AuditLogController.php               # Audit logs
│   │       └── SettingsController.php               # Site settings
│   ├── Middleware/
│   │   ├── Authenticate.php
│   │   ├── RedirectIfAuthenticated.php
│   │   ├── AdminMiddleware.php              # Role check (admin only)
│   │   └── AuditLogMiddleware.php           # Auto-log CRUD actions
│   ├── Requests/
│   │   ├── Public/
│   │   │   ├── StoreEnrollmentRequest.php  # Enrollment form validation
│   │   │   └── StoreContactRequest.php     # Contact form validation
│   │   └── Admin/
│   │       ├── StoreNewsRequest.php
│   │       ├── UpdateNewsRequest.php
│   │       ├── StoreActivityRequest.php
│   │       ├── StoreEnrollmentStatusRequest.php
│   │       └── ... (one per entity)
│   └── Resources/                          # API resources (if needed)
│
├── Livewire/                               # Livewire components
│   ├── Public/
│   │   ├── LanguageSwitcher.php            # EN/KH toggle
│   │   ├── HeroSlider.php                  # Auto-rotating home slider
│   │   ├── NewsFilter.php                  # News category filter + search
│   │   ├── GalleryLightbox.php             # Image lightbox modal
│   │   ├── EnrollmentWizard.php            # Multi-step enrollment form
│   │   ├── ApplicationTracker.php          # Track status by code
│   │   └── ContactForm.php                 # Contact form component
│   └── Admin/
│       ├── StatCards.php                   # Dashboard stat widgets
│       ├── EnrollmentTable.php             # Filterable enrollment list
│       ├── EnrollmentDetail.php            # Enrollment review panel
│       ├── DataTable.php                   # Reusable table (sort/filter)
│       ├── ImageUploader.php               # Multi-image upload widget
│       └── BilingualForm.php               # EN/KH field pairs
│
├── Models/
│   ├── User.php
│   ├── Role.php
│   ├── News.php
│   ├── Activity.php
│   ├── Achievement.php
│   ├── GalleryAlbum.php
│   ├── GalleryImage.php
│   ├── Event.php
│   ├── Notice.php
│   ├── HeroSlide.php
│   ├── Page.php
│   ├── Leadership.php
│   ├── Statistic.php
│   ├── Download.php
│   ├── EnrollmentApplication.php
│   ├── ApplicationStatus.php
│   ├── ContactMessage.php
│   ├── SiteSettings.php
│   └── AuditLog.php
│
├── Policies/                               # Authorization policies
│   ├── NewsPolicy.php
│   ├── ActivityPolicy.php
│   ├── EnrollmentPolicy.php
│   └── ... (one per model)
│
├── Notifications/
│   ├── EnrollmentSubmitted.php             # Notify admissions team
│   ├── EnrollmentStatusUpdated.php         # Notify applicant
│   ├── ContactMessageReceived.php          # Notify admin inbox
│   └── ResetPasswordNotification.php       # Password reset email
│
├── Jobs/
│   ├── ProcessImageUpload.php              # Resize/optimize uploads
│   ├── SendEnrollmentEmail.php             # Queue email notifications
│   └── GenerateSitemap.php                 # Auto-generate sitemap.xml
│
├── Services/
│   ├── FileUploadService.php               # Handle file storage
│   ├── TrackingCodeGenerator.php           # Generate EDU-XXXXXX codes
│   └── AuditLogger.php                     # Log entity changes
│
├── Scopes/
│   ├── PublishedScope.php                  # Filter published records
│   └── ActiveScope.php                     # Filter active records
│
├── Console/
│   └── Commands/
│       ├── SeedProductionData.php          # Seed live content
│       └── SyncApplicationStatuses.php    # Sync enrollment statuses
│
└── Providers/
    ├── AppServiceProvider.php             # Bind services
    ├── AuthServiceProvider.php            # Register policies
    ├── EventServiceProvider.php           # Event listeners
    ├── RouteServiceProvider.php           # Route model binding
    └── BroadcastServiceProvider.php       # Broadcasting (optional)
```

---

## 🗃️ database/ — Schema & Seed Data

```
database/
├── migrations/
│   ├── 0001_01_01_create_users_table.php
│   ├── 0001_01_02_create_password_reset_tokens_table.php
│   ├── 0002_01_01_create_roles_and_permissions_table.php   # Spatie
│   ├── 0003_01_01_create_site_settings_table.php
│   ├── 0004_01_01_create_news_table.php
│   ├── 0004_01_02_create_activities_table.php
│   ├── 0004_01_03_create_achievements_table.php
│   ├── 0004_01_04_create_gallery_albums_table.php
│   ├── 0004_01_05_create_gallery_images_table.php
│   ├── 0004_01_06_create_events_table.php
│   ├── 0004_01_07_create_notices_table.php
│   ├── 0004_01_08_create_hero_slides_table.php
│   ├── 0004_01_09_create_pages_table.php
│   ├── 0004_01_10_create_leadership_table.php
│   ├── 0004_01_11_create_statistics_table.php
│   ├── 0004_01_12_create_downloads_table.php
│   ├── 0005_01_01_create_enrollment_applications_table.php
│   ├── 0005_01_02_create_application_statuses_table.php
│   ├── 0005_01_03_create_contact_messages_table.php
│   ├── 0006_01_01_create_audit_logs_table.php
│   └── 0007_01_01_create_jobs_table.php          # Queue jobs table
│
├── seeders/
│   ├── DatabaseSeeder.php                  # Main seeder
│   ├── RolePermissionSeeder.php            # Admin, editor, viewer roles
│   ├── AdminUserSeeder.php                 # Default admin account
│   ├── SiteSettingsSeeder.php              # Default site config
│   ├── HeroSlideSeeder.php                 # Default hero slides
│   ├── LeadershipSeeder.php                # Leadership profiles
│   ├── StatisticsSeeder.php                # School statistics
│   ├── NewsSeeder.php                      # Sample news articles
│   ├── ActivitiesSeeder.php                # Sample activities
│   ├── AchievementsSeeder.php              # Sample achievements
│   ├── GallerySeeder.php                   # Sample albums + images
│   ├── EventsSeeder.php                    # Calendar events
│   └── PagesSeeder.php                     # About/mission content
│
└── factories/
    ├── NewsFactory.php
    ├── ActivityFactory.php
    ├── AchievementFactory.php
    ├── EnrollmentApplicationFactory.php
    ├── ContactMessageFactory.php
    └── ... (one per model for testing)
```

---

## 🌍 lang/ — Localization (English / Khmer)

```
lang/
├── en/
│   ├── messages.php                        # UI strings
│   ├── navigation.php                      # Nav labels
│   ├── forms.php                           # Form labels & validation
│   ├── admin.php                           # Admin panel strings
│   └── validation.php                      # Laravel validation messages
├── kh/
│   ├── messages.php                        # ខ្មែរ translations
│   ├── navigation.php
│   ├── forms.php
│   ├── admin.php
│   └── validation.php
└── en.json / kh.json                       # JSON translation (optional)
```

---

## 🎨 resources/ — Views, Styles, Scripts

```
resources/
├── views/
│   ├── layouts/
│   │   ├── app.blade.php                   # Public layout (nav + footer)
│   │   ├── admin.blade.php                 # Admin layout (sidebar + topbar)
│   │   └── guest.blade.php                 # Auth pages layout
│   │
│   ├── components/                         # Reusable Blade components
│   │   ├── public/
│   │   │   ├── public-nav.blade.php        # Navigation header
│   │   │   ├── public-footer.blade.php     # Footer with links
│   │   │   ├── language-toggle.blade.php   # EN/KH switcher
│   │   │   ├── hero-slider.blade.php       # Home hero carousel
│   │   │   ├── news-card.blade.php         # News article card
│   │   │   ├── activity-card.blade.php     # Activity card
│   │   │   ├── achievement-card.blade.php # Achievement badge
│   │   │   ├── gallery-grid.blade.php      # Album photo grid
│   │   │   ├── event-calendar.blade.php    # Calendar widget
│   │   │   ├── notice-board.blade.php      # Notice ticker
│   │   │   ├── stat-counter.blade.php      # Animated counter
│   │   │   ├── section-header.blade.php    # Section title block
│   │   │   ├── breadcrumb.blade.php        # Page breadcrumbs
│   │   │   ├── search-bar.blade.php        # Site search input
│   │   │   ├── loading-skeleton.blade.php  # Skeleton loader
│   │   │   └── empty-state.blade.php       # No-data placeholder
│   │   ├── admin/
│   │   │   ├── sidebar.blade.php           # Admin navigation
│   │   │   ├── topbar.blade.php            # Admin header bar
│   │   │   ├── stat-card.blade.php         # Dashboard stat widget
│   │   │   ├── data-table.blade.php        # Sortable/filterable table
│   │   │   ├── form-field.blade.php        # Reusable form input
│   │   │   ├── bilingual-input.blade.php   # EN/KH paired fields
│   │   │   ├── image-uploader.blade.php    # File upload widget
│   │   │   ├── status-badge.blade.php      # Status indicator
│   │   │   ├── rich-text-editor.blade.php  # TinyMCE wrapper
│   │   │   ├── confirm-delete.blade.php    # Delete confirmation modal
│   │   │   └── pagination.blade.php        # Table pagination
│   │   └── ui/                             # Generic UI atoms
│   │       ├── button.blade.php
│   │       ├── card.blade.php
│   │       ├── input.blade.php
│   │       ├── select.blade.php
│   │       ├── textarea.blade.php
│   │       ├── checkbox.blade.php
│   │       ├── modal.blade.php
│   │       ├── badge.blade.php
│   │       ├── alert.blade.php
│   │       └── dropdown.blade.php
│   │
│   ├── pages/                              # Public pages
│   │   ├── home.blade.php                  # Landing page
│   │   ├── news/
│   │   │   ├── index.blade.php            # News list
│   │   │   └── show.blade.php             # News detail
│   │   ├── activities/
│   │   │   ├── index.blade.php
│   │   │   └── show.blade.php
│   │   ├── achievements.blade.php
│   │   ├── gallery/
│   │   │   ├── index.blade.php            # Album grid
│   │   │   └── show.blade.php             # Album detail + lightbox
│   │   ├── calendar.blade.php
│   │   ├── downloads.blade.php
│   │   ├── about.blade.php
│   │   ├── faculty.blade.php              # Leadership directory
│   │   ├── search.blade.php
│   │   ├── contact.blade.php
│   │   ├── donate.blade.php
│   │   ├── enrollment/
│   │   │   ├── apply.blade.php            # Multi-step form
│   │   │   ├── success.blade.php          # Confirmation + tracking code
│   │   │   └── track.blade.php            # Status tracker
│   │   └── sitemap.blade.php
│   │
│   ├── auth/                               # Authentication pages
│   │   ├── login.blade.php
│   │   ├── register.blade.php
│   │   ├── forgot-password.blade.php
│   │   ├── reset-password.blade.php
│   │   └── verify-email.blade.php
│   │
│   ├── admin/                              # Admin CMS pages
│   │   ├── dashboard.blade.php
│   │   ├── news/
│   │   │   ├── index.blade.php            # List
│   │   │   ├── create.blade.php           # New form
│   │   │   └── edit.blade.php             # Edit form
│   │   ├── activities/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   └── edit.blade.php
│   │   ├── achievements/ (index/create/edit)
│   │   ├── gallery/ (index/create/edit)
│   │   ├── events/ (index/create/edit)
│   │   ├── notices/ (index/create/edit)
│   │   ├── downloads/ (index/create/edit)
│   │   ├── hero-slides/ (index/create/edit)
│   │   ├── pages/ (index/create/edit)
│   │   ├── leadership/ (index/create/edit)
│   │   ├── enrollments/
│   │   │   ├── index.blade.php            # Application list + detail
│   │   │   └── stats.blade.php           # Enrollment analytics
│   │   ├── messages/
│   │   │   ├── index.blade.php            # Inbox
│   │   │   └── show.blade.php             # Reply view
│   │   ├── statistics.blade.php
│   │   ├── users.blade.php
│   │   ├── audit-logs.blade.php
│   │   └── settings.blade.php
│   │
│   ├── livewire/                           # Livewire component views
│   │   ├── public/
│   │   │   ├── language-switcher.blade.php
│   │   │   ├── hero-slider.blade.php
│   │   │   ├── news-filter.blade.php
│   │   │   ├── gallery-lightbox.blade.php
│   │   │   ├── enrollment-wizard.blade.php
│   │   │   ├── application-tracker.blade.php
│   │   │   └── contact-form.blade.php
│   │   └── admin/
│   │       ├── stat-cards.blade.php
│   │       ├── enrollment-table.blade.php
│   │       ├── enrollment-detail.blade.php
│   │       ├── data-table.blade.php
│   │       ├── image-uploader.blade.php
│   │       └── bilingual-form.blade.php
│   │
│   ├── emails/                             # Email templates
│   │   ├── enrollment-submitted.blade.php  # To admissions team
│   │   ├── enrollment-status.blade.php    # To applicant
│   │   ├── contact-received.blade.php     # Auto-reply to sender
│   │   ├── contact-reply.blade.php        # Admin reply
│   │   └── password-reset.blade.php
│   │
│   ├── errors/
│   │   ├── 404.blade.php
│   │   ├── 403.blade.php
│   │   └── 500.blade.php
│   │
│   └── partials/                           # Shared partials
│       ├── head.blade.php                  # <head> meta, fonts, SEO
│       ├── scripts.blade.php               # JS includes
│       └── analytics.blade.php             # GA / GTM
│
├── css/
│   └── app.css                             # Tailwind directives + custom CSS
│
├── js/
│   ├── app.js                              # Bootstrap app + Alpine.js
│   ├── components/
│   │   ├── hero-slider.js                  # Slider logic (if Alpine)
│   │   ├── lightbox.js                     # Gallery lightbox
│   │   ├── mobile-menu.js                 # Nav toggle
│   │   └── counter.js                      # Animated counters
│   └── lib/
│       ├── chart.js                        # Chart.js config (dashboard)
│       └── tinymce.js                     # Rich text editor init
│
└── images/                                 # Static images (logos, icons)
    ├── logo.svg
    ├── logo-white.svg
    ├── favicon.ico
    └── og-default.jpg                      # Default Open Graph image
```

---

## 🛣️ routes/ — Route Definitions

```
routes/
├── web.php                                 # All web routes (public + admin)
│
│   ├── Public routes (grouped under middleware: web)
│   │   GET  /                              → PageController@home
│   │   GET  /news                          → NewsController@index
│   │   GET  /news/{slug}                   → NewsController@show
│   │   GET  /activities                    → ActivityController@index
│   │   GET  /activities/{slug}             → ActivityController@show
│   │   GET  /achievements                  → AchievementController@index
│   │   GET  /gallery                       → GalleryController@index
│   │   GET  /gallery/{id}                  → GalleryController@show
│   │   GET  /calendar                      → CalendarController@index
│   │   GET  /downloads                     → DownloadController@index
│   │   GET  /about                         → PageController@about
│   │   GET  /faculty                       → FacultyController@index
│   │   GET  /search                        → SearchController@index
│   │   GET  /contact                       → ContactController@index
│   │   POST /contact                       → ContactController@store
│   │   GET  /enrollment                    → EnrollmentController@apply
│   │   POST /enrollment                    → EnrollmentController@store
│   │   GET  /enrollment/track              → EnrollmentController@track
│   │   GET  /donate                        → DonateController@index
│   │   └── GET  /sitemap                   → PageController@sitemap
│   │
│   └── Admin routes (grouped under middleware: auth, admin)
│       GET  /admin                         → DashboardController@index
│       (resource routes for each CMS module)
│       Route::resource('admin/news', Admin\NewsController::class)
│       Route::resource('admin/activities', ...)
│       Route::resource('admin/achievements', ...)
│       Route::resource('admin/gallery', ...)
│       Route::resource('admin/events', ...)
│       Route::resource('admin/notices', ...)
│       Route::resource('admin/downloads', ...)
│       Route::resource('admin/hero-slides', ...)
│       Route::resource('admin/pages', ...)
│       Route::resource('admin/leadership', ...)
│       GET  /admin/enrollments              → EnrollmentController@index
│       GET  /admin/enrollments/{id}        → EnrollmentController@show
│       PUT  /admin/enrollments/{id}/status → EnrollmentController@updateStatus
│       GET  /admin/enrollments/stats      → EnrollmentStatsController@index
│       GET  /admin/messages                → MessageController@index
│       GET  /admin/messages/{id}          → MessageController@show
│       POST /admin/messages/{id}/reply     → MessageController@reply
│       GET  /admin/statistics              → StatisticsController@index
│       GET  /admin/users                   → UserController@index
│       POST /admin/users/invite           → UserController@invite
│       GET  /admin/audit-logs              → AuditLogController@index
│       GET  /admin/settings                → SettingsController@index
│       PUT  /admin/settings                → SettingsController@update
│
├── console.php                            # Scheduled tasks & console commands
│
├── channels.php                            # Broadcasting channels (optional)
│
└── api.php                                 # API routes (if building API for mobile app)
```

---

## 🧪 tests/ — Test Suite (Pest PHP)

```
tests/
├── Pest.php                                # Pest bootstrap
├── TestCase.php
│
├── Feature/                                # Feature tests
│   ├── Auth/
│   │   ├── LoginTest.php
│   │   ├── RegisterTest.php
│   │   └── PasswordResetTest.php
│   ├── Public/
│   │   ├── HomePageTest.php
│   │   ├── NewsPageTest.php
│   │   ├── ActivitiesTest.php
│   │   ├── GalleryTest.php
│   │   ├── CalendarTest.php
│   │   ├── SearchTest.php
│   │   ├── EnrollmentSubmissionTest.php
│   │   ├── EnrollmentTrackingTest.php
│   │   └── ContactFormTest.php
│   └── Admin/
│       ├── DashboardTest.php
│       ├── NewsCrudTest.php
│       ├── EnrollmentManagementTest.php
│       ├── MessageManagementTest.php
│       ├── SettingsTest.php
│       └── AuthorizationTest.php           # Role/permission tests
│
├── Unit/                                   # Unit tests
│   ├── Models/
│   │   ├── NewsTest.php
│   │   └── EnrollmentApplicationTest.php
│   └── Services/
│       ├── TrackingCodeGeneratorTest.php
│       └── FileUploadServiceTest.php
│
└── Browser/                                # Laravel Dusk browser tests
    ├── Pages/
    │   ├── HomePage.php
    │   └── EnrollmentPage.php
    ├── AuthLoginTest.php
    ├── NavigationTest.php
    ├── EnrollmentFlowTest.php
    └── AdminCrudTest.php
```

---

## ⚙️ config/ — Configuration

```
config/
├── app.php                                 # App config
├── auth.php                                # Auth guards & providers
├── database.php                            # MySQL connection
├── filesystems.php                         # S3/local disk config
├── mail.php                                # Gmail SMTP config
├── queue.php                               # Redis/database queue
├── cache.php                               # Redis cache
├── services.php                            # Google OAuth, 3rd-party keys
├── permission.php                          # Spatie roles/permissions
├── scout.php                               # Search (MeiliSearch)
└── logging.php                             # Log channels
```

---

## 📦 Key Dependencies (composer.json)

```json
{
    "require": {
        "php": "^8.2",
        "laravel/framework": "^11.0",
        "laravel/breeze": "^2.0",
        "livewire/livewire": "^3.0",
        "laravel/socialite": "^5.0",
        "spatie/laravel-permission": "^6.0",
        "laravel/scout": "^10.0",
        "intervention/image": "^3.0",
        "league/csv": "^9.0"
    },
    "require-dev": {
        "pestphp/pest": "^2.0",
        "laravel/dusk": "^8.0",
        "laravel/pint": "^1.13",
        "barryvdh/laravel-debugbar": "^3.0"
    }
}
```

## 📦 Key Dependencies (package.json)

```json
{
    "devDependencies": {
        "vite": "^5.0",
        "laravel-vite-plugin": "^1.0",
        "tailwindcss": "^3.4",
        "autoprefixer": "^10.4",
        "postcss": "^8.4",
        "alpinejs": "^3.13"
    },
    "dependencies": {
        "chart.js": "^4.4",
        "tinymce": "^7.0"
    }
}
```

---

## 🔑 .env — Environment Variables (key entries)

```env
APP_NAME="EduKhmer High School"
APP_ENV=local
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=edukhmer

# Gmail SMTP — for admissions email notifications
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=admissions@school.edu.kh
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=admissions@school.edu.kh
MAIL_FROM_NAME="EduKhmer Admissions"

# Google OAuth (Socialite)
GOOGLE_CLIENT_ID=...
GOOGLE_CLIENT_SECRET=...
GOOGLE_REDIRECT_URI=https://edukhmer.edu.kh/auth/google/callback

# File Storage
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=...
AWS_SECRET_ACCESS_KEY=...
AWS_DEFAULT_REGION=ap-southeast-1
AWS_BUCKET=edukhmer-media

# Queue & Cache
QUEUE_CONNECTION=redis
CACHE_STORE=redis
REDIS_HOST=127.0.0.1

# Search
SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://127.0.0.1:7700
```

---

## 🚀 Deployment Setup

```
├── .github/
│   └── workflows/
│       ├── ci.yml                         # Run Pest tests + Pint on PR
│       └── deploy.yml                     # Deploy to Forge on main merge
│
├── deploy.sh                              # Manual deploy script
│   # php artisan down
│   # git pull origin main
│   # composer install --no-dev
│   # php artisan migrate --force
│   # npm run build
│   # php artisan queue:restart
│   # php artisan up
│
└── Dockerfile                             # Optional: container deployment
```

---

## 📝 Quick Start Commands

```bash
# 1. Create project
composer create-project laravel/laravel edukhmer
cd edukhmer

# 2. Install packages
composer require laravel/breeze livewire/livewire laravel/socialite spatie/laravel-permission laravel/scout intervention/image
composer require --dev pestphp/pest laravel/dusk laravel/pint

# 3. Install Breeze (auth scaffolding)
php artisan breeze:install blade

# 4. Install Tailwind + Vite
npm install

# 5. Run migrations & seeders
php artisan migrate:fresh --seed

# 6. Start dev server
php artisan serve
npm run dev

# 7. Run queue worker (for email notifications)
php artisan queue:work

# 8. Run tests
php artisan test
# or
./vendor/bin/pest
``