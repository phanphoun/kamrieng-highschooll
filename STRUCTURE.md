# EduKhmer High School — Project Structure

> This document explains the folder structure so the whole team knows where to find things and where to put new code.

---

## Top-Level Overview

```
edukhmer/
├── app/                  # PHP application logic (controllers, models, etc.)
├── bootstrap/            # Laravel framework bootstrap
├── config/               # Configuration files (.env settings)
├── database/             # Migrations, seeders, factories
├── lang/                 # Translations (English / Khmer)
├── public/               # Publicly accessible files (index.php, assets)
├── resources/            # Views (Blade), CSS, JavaScript
├── routes/               # Route definitions
├── storage/              # Logs, cache, uploaded files
├── tests/                # Pest test files
├── .env                  # Environment variables (NOT committed)
├── .env.example          # Template for .env
├── composer.json         # PHP dependencies
├── package.json          # Node.js dependencies
├── vite.config.js        # Vite build configuration
└── tailwind.config.js    # Tailwind CSS configuration
```

---

## `app/` — Application Core (PHP)

```
app/
├── Console/
│   └── Commands/
│       ├── SeedProductionData.php         # php artisan seed:production
│       └── SyncApplicationStatuses.php    # php artisan enrollments:sync-statuses
│
├── Http/
│   ├── Controllers/
│   │   ├── Controller.php                 # Base controller
│   │   ├── Admin/                         # Admin CMS controllers (19 files)
│   │   │   ├── NewsController.php         # News CRUD
│   │   │   ├── ActivityController.php     # Activities CRUD
│   │   │   ├── AchievementController.php  # Achievements CRUD
│   │   │   ├── GalleryController.php      # Gallery albums + image upload
│   │   │   ├── EventController.php        # Events CRUD
│   │   │   ├── NoticeController.php       # Notices CRUD
│   │   │   ├── DownloadController.php     # Downloads CRUD
│   │   │   ├── HeroSlideController.php    # Hero slides CRUD
│   │   │   ├── PageController.php         # Static pages CRUD
│   │   │   ├── LeadershipController.php   # Leadership profiles CRUD
│   │   │   ├── DashboardController.php    # Admin dashboard
│   │   │   ├── EnrollmentController.php   # Enrollment review workflow
│   │   │   ├── EnrollmentStatsController.php  # Enrollment analytics
│   │   │   ├── MessageController.php      # Contact message inbox
│   │   │   ├── UserController.php         # User management (roles)
│   │   │   ├── SettingsController.php     # Site settings
│   │   │   ├── StatisticController.php    # School statistics CRUD
│   │   │   └── AuditLogController.php     # Audit log viewer
│   │   │
│   │   ├── Public/                        # Public website controllers (13 files)
│   │   │   ├── PageController.php         # Home, About, Sitemap
│   │   │   ├── NewsController.php         # News list + detail
│   │   │   ├── ActivityController.php     # Activities list + detail
│   │   │   ├── AchievementController.php  # Achievements listing
│   │   │   ├── GalleryController.php      # Gallery albums + lightbox
│   │   │   ├── CalendarController.php     # Events calendar
│   │   │   ├── DownloadController.php     # Downloads listing
│   │   │   ├── FacultyController.php      # Leadership directory
│   │   │   ├── SearchController.php       # Site search
│   │   │   ├── ContactController.php      # Contact form
│   │   │   ├── EnrollmentController.php   # Enrollment form + tracking
│   │   │   ├── NoticeController.php       # Notices listing
│   │   │   └── DonateController.php       # Donation page
│   │   │
│   │   └── Auth/                          # Auth controllers (from Breeze)
│   │       ├── AuthenticatedSessionController.php
│   │       ├── RegisteredUserController.php
│   │       ├── PasswordResetLinkController.php
│   │       └── NewPasswordController.php
│   │
│   ├── Middleware/
│   │   ├── AdminMiddleware.php            # Role check (admin role required)
│   │   ├── AuditLogMiddleware.php         # Auto-log CRUD actions
│   │   └── SetLocale.php                  # Set locale from session
│   │
│   └── Requests/                          # Form request validation (29 files)
│       ├── StoreNewsRequest.php           # One per entity + action
│       ├── UpdateNewsRequest.php
│       ├── StoreActivityRequest.php
│       ├── ...                             # (same pattern for all entities)
│       └── Admin/                         # Admin-specific requests
│           ├── StoreUserRequest.php
│           ├── StoreSettingsRequest.php
│           ├── StoreEnrollmentStatusRequest.php
│           └── ...
│
├── Jobs/                                  # Queue jobs
│   ├── GenerateSitemap.php                # Auto-generate sitemap.xml
│   ├── ProcessImageUpload.php             # Resize/optimize uploaded images
│   └── SendEnrollmentEmail.php            # Send enrollment notification emails
│
├── Models/                                # Eloquent models (19 files)
│   ├── User.php                           # User + Spatie roles
│   ├── News.php                           # News articles
│   ├── Activity.php                       # School activities
│   ├── Achievement.php                    # Awards & achievements
│   ├── GalleryAlbum.php                   # Photo albums
│   ├── GalleryImage.php                   # Individual photos
│   ├── Event.php                          # Calendar events
│   ├── Notice.php                         # Announcements
│   ├── Download.php                       # File downloads
│   ├── HeroSlide.php                      # Homepage hero carousel
│   ├── Page.php                           # Static pages
│   ├── Leadership.php                     # Staff directory
│   ├── Statistic.php                      # School statistics
│   ├── EnrollmentApplication.php          # Enrollment applications
│   ├── ApplicationStatus.php              # Enrollment statuses
│   ├── ContactMessage.php                 # Contact form submissions
│   ├── SiteSettings.php                   # Site configuration
│   ├── AuditLog.php                       # Activity audit trail
│   └── Faq.php                            # Frequently asked questions
│
├── Notifications/                         # Email + database notifications
│   ├── EnrollmentSubmitted.php            # Notify admin of new enrollment
│   ├── EnrollmentStatusUpdated.php        # Notify applicant of status change
│   ├── ContactMessageReceived.php         # Notify admin of new message
│   ├── ContactAutoReply.php               # Auto-reply to message sender
│   └── ResetPasswordNotification.php      # Password reset email
│
├── Policies/                              # Authorization policies
│   ├── NewsPolicy.php
│   ├── ActivityPolicy.php
│   └── EnrollmentPolicy.php
│
├── Providers/                             # Service providers
│   ├── AppServiceProvider.php             # Share site settings globally
│   ├── AuthServiceProvider.php            # Register policies
│   ├── EventServiceProvider.php           # Event/listener registration
│   └── RouteServiceProvider.php           # Route model binding
│
├── Scopes/                                # Global query scopes
│   ├── PublishedScope.php                 # Filter published records
│   └── ActiveScope.php                    # Filter active records
│
└── Services/                              # Business logic services
    ├── AuditLogger.php                    # Log model changes to audit_logs
    ├── FileUploadService.php              # Handle file storage
    └── TrackingCodeGenerator.php          # Generate EDU-XXXXXX codes
```

---

## `resources/` — Views, CSS, JavaScript

```
resources/
├── views/
│   ├── layouts/
│   │   ├── app.blade.php              # Public layout (navbar + footer)
│   │   ├── admin.blade.php            # Admin layout (sidebar + topbar)
│   │   └── guest.blade.php            # Auth pages layout
│   │
│   ├── components/
│   │   ├── public/
│   │   │   ├── public-nav.blade.php   # Public navigation
│   │   │   ├── public-footer.blade.php
│   │   │   └── language-toggle.blade.php  # EN/KH switcher
│   │   ├── admin/
│   │   │   ├── sidebar.blade.php      # Admin sidebar nav
│   │   │   └── topbar.blade.php       # Admin top bar
│   │   └── ui/                        # Reusable UI atoms
│   │       ├── button.blade.php       # <x-ui.button variant="primary|secondary|danger">
│   │       ├── card.blade.php         # <x-ui.card>
│   │       ├── badge.blade.php        # <x-ui.badge variant="success|warning|danger">
│   │       ├── alert.blade.php        # <x-ui.alert variant="success|error">
│   │       ├── nav-link.blade.php
│   │       └── mobile-nav-link.blade.php
│   │
│   ├── public/                        # Public website pages
│   │   └── pages/
│   │       ├── home.blade.php         # Landing page (hero, stats, news, FAQ, etc.)
│   │       ├── about.blade.php
│   │       ├── sitemap.blade.php
│   │       ├── contact.blade.php
│   │       ├── donate.blade.php
│   │       ├── search.blade.php
│   │       ├── calendar.blade.php
│   │       ├── downloads.blade.php
│   │       ├── notices.blade.php
│   │       ├── faculty.blade.php
│   │       ├── achievements.blade.php
│   │       ├── news/
│   │       │   ├── index.blade.php    # News list
│   │       │   └── show.blade.php     # News detail
│   │       ├── activities/
│   │       │   ├── index.blade.php
│   │       │   └── show.blade.php
│   │       ├── gallery/
│   │       │   ├── index.blade.php    # Album grid
│   │       │   └── show.blade.php     # Album detail + lightbox
│   │       └── enrollment/
│   │           ├── apply.blade.php    # Application form
│   │           └── track.blade.php    # Track application status
│   │
│   ├── admin/                         # Admin CMS pages
│   │   ├── dashboard.blade.php
│   │   ├── settings.blade.php
│   │   ├── audit-logs.blade.php
│   │   ├── news/ (index, create, edit)
│   │   ├── activities/ (index, create, edit)
│   │   ├── achievements/ (index, create, edit)
│   │   ├── gallery/ (index, create, edit, show)
│   │   ├── events/ (index, create, edit)
│   │   ├── notices/ (index, create, edit)
│   │   ├── downloads/ (index, create, edit)
│   │   ├── hero-slides/ (index, create, edit)
│   │   ├── pages/ (index, create, edit)
│   │   ├── leadership/ (index, create, edit)
│   │   ├── enrollments/ (index, show, stats)
│   │   ├── messages/ (index, show)
│   │   ├── users/ (index, create, edit)
│   │   └── statistics/ (index, create, edit)
│   │
│   ├── auth/                          # Auth pages
│   │   ├── login.blade.php
│   │   ├── register.blade.php
│   │   ├── forgot-password.blade.php
│   │   └── reset-password.blade.php
│   │
│   ├── emails/                        # Email templates
│   │   ├── enrollment-submitted.blade.php
│   │   ├── enrollment-status.blade.php
│   │   ├── contact-received.blade.php
│   │   ├── contact-reply.blade.php
│   │   └── password-reset.blade.php
│   │
│   ├── errors/                        # HTTP error pages
│   │   ├── 404.blade.php
│   │   ├── 403.blade.php
│   │   └── 500.blade.php
│   │
│   └── partials/                      # Reusable HTML snippets
│       ├── head.blade.php             # <head> meta, fonts
│       ├── scripts.blade.php          # JS includes
│       └── analytics.blade.php        # GA / GTM placeholder
│
├── css/
│   └── app.css                        # Tailwind imports + custom utilities
│
└── js/
    ├── app.js                         # Alpine.js init + Chart.js
    └── bootstrap.js                   # Axios setup
```

---

## `database/` — Schema & Seed Data

```
database/
├── migrations/                        # 24 migration files
│   ├── 0001_01_01_*                   # Users, cache, sessions
│   ├── 0002_01_01_*                   # Spatie permissions
│   ├── 0003_01_01_*                   # Site settings
│   ├── 0004_01_* - 0007_01_*          # Content entities (news, events, etc.)
│   ├── 0005_01_*                      # Enrollments + contact
│   ├── 0006_01_*                      # Audit logs
│   ├── 0007_01_*                      # Jobs + notifications
│   └── 0008_01_01_*                   # FAQs
│
├── seeders/                           # 17 seeder classes
│   ├── DatabaseSeeder.php             # Main seeder (calls all others)
│   ├── RolePermissionSeeder.php       # Admin, Editor, Viewer roles
│   ├── AdminUserSeeder.php            # Default accounts
│   ├── FaqSeeder.php                  # FAQ content
│   ├── NewsSeeder.php                 # Sample news
│   ├── ...                            # (one per entity)
│
└── factories/                         # 13 model factories for testing
    ├── UserFactory.php
    ├── NewsFactory.php
    ├── ActivityFactory.php
    └── ...
```

---

## `routes/` — URL Routing

```
routes/
├── web.php            # All web routes (public + admin + auth)
├── api.php            # API routes (reserved for future mobile app)
├── console.php        # Scheduled tasks (sitemap, sync statuses)
└── channels.php       # Broadcasting channels
```

**`web.php` route organization:**
| Group | Prefix | Middleware | Purpose |
|-------|--------|-----------|---------|
| Public | `/` | web | Home, news, activities, gallery, etc. |
| Auth | `/login`, `/register` | guest | Login, register, password reset |
| Admin | `/admin` | auth, admin | All CMS CRUD routes |

---

## `config/` — Configuration

```
config/
├── app.php                  # App name, timezone (Asia/Phnom_Penh), locale
├── auth.php                 # Auth guards
├── database.php             # MySQL connection
├── filesystems.php          # Local / S3 storage
├── mail.php                 # SMTP (Gmail)
├── permission.php           # Spatie roles/permissions
├── scout.php                # MeiliSearch
├── services.php             # Google OAuth
├── queue.php                # Database queue
├── cache.php                # Database cache
└── logging.php              # Log channels
```

---

## `tests/` — Pest PHP Tests

```
tests/
├── Pest.php                            # Pest bootstrap
├── TestCase.php                        # Base test case
├── Feature/
│   ├── Public/
│   │   ├── HomePageTest.php            # Home, about, contact page responses
│   │   ├── NewsPageTest.php            # News index + show
│   │   ├── ContactFormTest.php         # Contact form submission
│   │   └── EnrollmentSubmissionTest.php # Enrollment flow
│   ├── Admin/
│   │   ├── DashboardTest.php           # Admin dashboard access
│   │   ├── NewsCrudTest.php            # News CRUD operations
│   │   └── AuthorizationTest.php       # Role-based access control
│   └── Auth/
│       ├── LoginTest.php
│       └── RegistrationTest.php
└── Unit/
    └── Services/
        └── TrackingCodeGeneratorTest.php
```

---

## Naming Conventions

| What | Convention | Example |
|------|-----------|---------|
| **Controllers** | `{Entity}Controller.php` in Admin/ or Public/ | `NewsController.php` |
| **Models** | Singular, PascalCase | `EnrollmentApplication.php` |
| **Migrations** | `YYYY_MM_DD_HHMMSS_create_{table}_table.php` | `0004_01_01_000000_create_news_table.php` |
| **Form Requests** | `{Action}{Entity}Request.php` | `StoreNewsRequest.php` |
| **Notifications**| PascalCase, descriptive | `EnrollmentSubmitted.php` |
| **Views (admin)** | `admin/{entity}/{action}.blade.php` | `admin/news/index.blade.php` |
| **Views (public)** | `public/pages/{entity}/{action}.blade.php` | `public/pages/news/show.blade.php` |
| **Routes** | `{area}.{entity}.{action}` | `admin.news.index`, `news.show` |
| **Bilingual fields** | `{field}_en`, `{field}_kh` | `title_en`, `title_kh` |

---

## How Routing Works

1. A visitor navigates to `/news/some-article`
2. `routes/web.php` matches `GET /news/{slug}` to `NewsController@show`
3. The controller queries the `News` model and returns `view('public.pages.news.show', ...)`
4. The view extends `layouts.app` which renders the public navigation + footer
5. Bilingual content is selected via `app()->getLocale() === 'kh' ? $item->title_kh : $item->title_en`

Admin routes are protected by the `admin` middleware (checks for Spatie `admin` role).

---

## Key Technical Decisions

- **Bilingual**: All content models have `_en` and `_kh` field pairs. Locale is stored in session and switched via `/language/{locale}`.
- **Authorization**: Spatie Laravel Permission with roles (admin, editor, viewer).
- **File Storage**: Local `public/` disk for development; S3 for production.
- **Queue**: Database driver for simplicity; processes emails and image processing asynchronously.
- **Frontend**: Tailwind CSS for styling, Alpine.js for interactivity, Chart.js for admin analytics.
- **Testing**: Pest PHP for feature/unit tests, Laravel Dusk for browser tests.
