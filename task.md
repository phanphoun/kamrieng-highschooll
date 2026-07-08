# EduKhmer High School — Fix Tasks

## Priority 1: Admin CRUD Views (Build All Missing Views)

The controllers exist and work — the admin Blade views are completely missing.

### 1.1 Admin News Views
Create `resources/views/admin/news/`:
- `index.blade.php` — paginated table with title, category, status, actions
- `create.blade.php` — form with EN/KH title, content, excerpt, featured image, category, publish toggle
- `edit.blade.php` — same as create, pre-filled

### 1.2 Admin Activities Views
Create `resources/views/admin/activities/`:
- `index.blade.php`, `create.blade.php`, `edit.blade.php`

### 1.3 Admin Achievements Views
Create `resources/views/admin/achievements/`:
- `index.blade.php`, `create.blade.php`, `edit.blade.php`

### 1.4 Admin Gallery Views
Create `resources/views/admin/gallery/`:
- `index.blade.php` — album list with cover + image count
- `create.blade.php`, `edit.blade.php` — album form
- `show.blade.php` — album detail with image grid + upload

### 1.5 Admin Events Views
Create `resources/views/admin/events/`:
- `index.blade.php`, `create.blade.php`, `edit.blade.php`

### 1.6 Admin Notices Views
Create `resources/views/admin/notices/`:
- `index.blade.php`, `create.blade.php`, `edit.blade.php`

### 1.7 Admin Downloads Views
Create `resources/views/admin/downloads/`:
- `index.blade.php`, `create.blade.php`, `edit.blade.php`

### 1.8 Admin Hero Slides Views
Create `resources/views/admin/hero-slides/`:
- `index.blade.php`, `create.blade.php`, `edit.blade.php`

### 1.9 Admin Pages Views
Create `resources/views/admin/pages/`:
- `index.blade.php`, `create.blade.php`, `edit.blade.php`

### 1.10 Admin Leadership Views
Create `resources/views/admin/leadership/`:
- `index.blade.php`, `create.blade.php`, `edit.blade.php`

### 1.11 Admin Enrollments Views
Create `resources/views/admin/enrollments/`:
- `index.blade.php` — filterable table of applications
- `show.blade.php` — detail view with status update form

### 1.12 Admin Messages Views
Create `resources/views/admin/messages/`:
- `index.blade.php` — inbox table
- `show.blade.php` — message detail + reply form

### 1.13 Other Admin Views
Create:
- `admin/settings.blade.php` — site settings form
- `admin/users/index.blade.php` — user management table
- `admin/audit-logs/index.blade.php` — audit log table
- `admin/statistics/index.blade.php` — school statistics form

---

## Priority 2: Fix Homepage Dynamic Data

File: `resources/views/public/pages/home.blade.php`

The controller passes `$featuredNews`, `$upcomingEvents`, `$activities`, `$achievements` but the view uses hardcoded data.

### 2.1 Wire up News Section
Replace hardcoded news items with a loop over `$featuredNews`:
- Use dynamic title, date, image, slug link instead of `href="#"`

### 2.2 Wire up Activities/Achievements
Add sections or cards that render `$activities` and `$achievements` where appropriate.

### 2.3 Wire up Upcoming Events
Use `$upcomingEvents` in the calendar or events section instead of placeholder content.

---

## Priority 3: Extract Form Request Classes

Create `app/Http/Requests/` directory and extract validation from controllers:

- `StoreNewsRequest.php` / `UpdateNewsRequest.php`
- `StoreActivityRequest.php` / `UpdateActivityRequest.php`
- `StoreEnrollmentRequest.php`
- `StoreContactRequest.php`
- `StoreGalleryRequest.php` / `UpdateGalleryRequest.php`
- `StoreEventRequest.php` / `UpdateEventRequest.php`
- `StoreNoticeRequest.php` / `UpdateNoticeRequest.php`
- `StoreDownloadRequest.php` / `UpdateDownloadRequest.php`
- `StoreHeroSlideRequest.php` / `UpdateHeroSlideRequest.php`
- `StorePageRequest.php` / `UpdatePageRequest.php`
- `StoreLeadershipRequest.php` / `UpdateLeadershipRequest.php`
- `StoreEnrollmentStatusRequest.php`
- `StoreSettingsRequest.php`
- `StoreUserRequest.php` / `UpdateUserRequest.php`

All controllers using inline `$request->validate(...)` should be updated to type-hint the corresponding form request class.

---

## Priority 4: Implement Notifications

Create `app/Notifications/`:
- `EnrollmentSubmitted.php` — notify admissions team when a new enrollment is submitted
- `EnrollmentStatusUpdated.php` — notify applicant when their status changes
- `ContactMessageReceived.php` — notify admin when a contact message comes in

Wire into controllers:
- `Public\EnrollmentController@store` — dispatch `EnrollmentSubmitted`
- `Admin\EnrollmentController@updateStatus` — dispatch `EnrollmentStatusUpdated`
- `Public\ContactController@store` — dispatch `ContactMessageReceived`

---

## Priority 5: Implement Missing Jobs

Create `app/Jobs/`:
- `ProcessImageUpload.php` — resize/optimize uploaded images (use Intervention Image)
- `SendEnrollmentEmail.php` — queue email for enrollment notifications

Wire into controllers where appropriate (gallery upload, enrollment submission).

---

## Priority 6: Implement Console Commands

Create `app/Console/Commands/`:
- `SeedProductionData.php` — seed realistic production content
- `SyncApplicationStatuses.php` — sync/correct enrollment statuses

Register in `app/Console/Kernel.php` schedule.

---

## Priority 7: Add Error Pages

Create in `resources/views/errors/`:
- `404.blade.php` — extends `layouts.app`, friendly message + search/home link
- `403.blade.php` — unauthorized message
- `500.blade.php` — server error message

Publish with: `php artisan vendor:publish --tag=laravel-errors`

---

## Priority 8: Expand Test Coverage

### Feature Tests
- `tests/Feature/Public/NewsPageTest.php`
- `tests/Feature/Public/ActivitiesTest.php`
- `tests/Feature/Public/GalleryTest.php`
- `tests/Feature/Public/CalendarTest.php`
- `tests/Feature/Public/SearchTest.php`
- `tests/Feature/Public/EnrollmentSubmissionTest.php`
- `tests/Feature/Public/EnrollmentTrackingTest.php`
- `tests/Feature/Admin/DashboardTest.php`
- `tests/Feature/Admin/NewsCrudTest.php`
- `tests/Feature/Admin/EnrollmentManagementTest.php`
- `tests/Feature/Admin/MessageManagementTest.php`
- `tests/Feature/Admin/SettingsTest.php`
- `tests/Feature/Admin/AuthorizationTest.php`

### Unit Tests
- `tests/Unit/Models/NewsTest.php`
- `tests/Unit/Models/EnrollmentApplicationTest.php`
- `tests/Unit/Services/TrackingCodeGeneratorTest.php`
- `tests/Unit/Services/FileUploadServiceTest.php`

### Browser Tests (Dusk)
- `tests/Browser/AuthLoginTest.php`
- `tests/Browser/NavigationTest.php`
- `tests/Browser/EnrollmentFlowTest.php`
- `tests/Browser/AdminCrudTest.php`

---

## Priority 9: Homepage FAQ Dynamic

Convert the FAQ section in `home.blade.php` to load from a DB model or config. Options:
- Create a `Faq` model + migration
- Or hardcode in a config file / lang file

---

## Priority 10: Add Missing Email Templates

Create in `resources/views/emails/`:
- `enrollment-submitted.blade.php` — confirmation to admissions
- `enrollment-status.blade.php` — status change to applicant
- `contact-received.blade.php` — auto-reply to sender
- `contact-reply.blade.php` — admin reply email

---

## Priority 11: Add SEO / Meta Partials

Create in `resources/views/partials/`:
- `head.blade.php` — meta tags, OG tags, fonts, favicon
- `scripts.blade.php` — JS includes
- `analytics.blade.php` — Google Analytics / GTM snippet

Include these in `layouts/app.blade.php`.

---

## Priority 12: Add Missing Factories

Create in `database/factories/`:
- `NewsFactory.php`
- `ActivityFactory.php`
- `AchievementFactory.php`
- `GalleryAlbumFactory.php`
- `GalleryImageFactory.php`
- `EventFactory.php`
- `NoticeFactory.php`
- `HeroSlideFactory.php`
- `PageFactory.php`
- `LeadershipFactory.php`
- `DownloadFactory.php`
- `EnrollmentApplicationFactory.php`
- `ContactMessageFactory.php`

---

## Verification

After all fixes:

```bash
composer test              # Run Pest tests
vendor/bin/pint            # Check code style
npm run build              # Verify Vite build
php artisan route:list     # Verify all routes work
php artisan migrate:fresh --seed  # Verify DB seeding
```
