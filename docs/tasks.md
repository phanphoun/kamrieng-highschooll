# Product Backlog — User Stories & Tasks

**Project**: EduBridge Cambodia — Bilingual School CMS & Communications Platform

**Total**: 28 issues, 122 tasks across 4 sprints

---

## Sprint 1 — Auth, RBAC & Public Website Foundation (9 issues)

### #174 — US-01: Auth — Register & Login (Must, 5pts)

**As a** visitor, **I want to** register and log in, **so that** I can access the admin panel.

**Tasks:**
- [ ] T-01: Create Auth\AuthenticatedSessionController
- [ ] T-02: Create Auth\RegisteredUserController
- [ ] T-03: Implement role-based redirect after login
- [ ] T-04: Add password reset flow
- [ ] T-05: Build auth/login.blade.php
- [ ] T-06: Build auth/register.blade.php
- [ ] T-07: Write login/register feature tests
- [ ] T-08: Write forgotten password test

### #175 — US-02: Role-based Access Control (Must, 3pts)

**As an** admin, **I want** role-based access control, **so that** only authorized users access admin features.

**Tasks:**
- [ ] T-09: Create AdminMiddleware
- [ ] T-10: Register middleware aliases in bootstrap/app.php
- [ ] T-11: Define route groups in routes/web.php
- [ ] T-12: Write middleware tests (unauthorized gets 403)

### #176 — US-03: Home Page with Hero Slides (Must, 5pts)

**As a** visitor, **I want to** view the Home page with hero slides, **so that** I see school highlights.

**Tasks:**
- [ ] T-13: Create HeroSlide model + migration + seeder
- [ ] T-14: Create HeroSlideController (public display + order)
- [ ] T-15: Build public/home.blade.php (hero slideshow, featured sections)
- [ ] T-16: Write home page display tests

### #177 — US-04: About Page CMS (Must, 3pts)

**As a** visitor, **I want to** view the About page, **so that** I can learn about the school.

**Tasks:**
- [ ] T-17: Create Page model + migration (for CMS-managed pages)
- [ ] T-18: Create PageController (public view + admin CRUD)
- [ ] T-19: Build public/about.blade.php
- [ ] T-20: Write About page tests

### #178 — US-05: Contact Form (Must, 3pts)

**As a** visitor, **I want to** contact the school via a form, **so that** I can send inquiries.

**Tasks:**
- [ ] T-21: Create ContactController + message model + migration
- [ ] T-22: Add contact form validation + store logic
- [ ] T-23: Build public/contact.blade.php
- [ ] T-24: Write contact form submission tests

### #179 — US-06: Site Search (Should, 3pts)

**As a** visitor, **I want to** search the site, **so that** I can find content quickly.

**Tasks:**
- [ ] T-25: Create search controller + query logic
- [ ] T-26: Build public/search.blade.php
- [ ] T-27: Write search functionality tests

### #180 — US-07: Site Map (Could, 2pts)

**As a** visitor, **I want a** Site Map, **so that** I can navigate the site.

**Tasks:**
- [ ] T-28: Create SiteMap controller + generate all public routes
- [ ] T-29: Build public/sitemap.blade.php
- [ ] T-30: Write Site Map tests

### #181 — US-08: Hero Slides Admin (Must, 2pts)

**As an** admin, **I want to** manage Hero Slides, **so that** I can update homepage banners.

**Tasks:**
- [ ] T-31: Build admin/hero-slides/index.blade.php
- [ ] T-32: Build admin/hero-slides/create.blade.php + edit.blade.php
- [ ] T-33: Write hero slide CRUD tests

### #182 — Sprint 1 — Chores: Layout, Components, Tooling

**Foundation tasks for Sprint 1.**

**Tasks:**
- [ ] T-34: Configure Tailwind CSS v4 theme
- [ ] T-35: Build layouts/app.blade.php
- [ ] T-36: Build layouts/admin.blade.php
- [ ] T-37: Build shared components (button, card, table, modal, input)
- [ ] T-38: Build shared components (alert, pagination, badge)
- [ ] T-39: Build public navbar + footer
- [ ] T-40: Set up Pest testing framework + CI config

---

## Sprint 2 — Content Modules: News, Gallery, Events, Activities, Achievements (7 issues)

### #183 — US-09: View News (Must, 5pts)

**As a** visitor, **I want to** read news articles, **so that** I stay informed about the school.

**Tasks:**
- [ ] T-41: Create NewsController (admin CRUD + bilingual)
- [ ] T-42: Create News model + migration (bilingual fields)
- [ ] T-43: Build admin/news/index.blade.php
- [ ] T-44: Build admin/news/create.blade.php + edit.blade.php (bilingual)
- [ ] T-45: Build public/news/index.blade.php
- [ ] T-46: Build public/news/show.blade.php
- [ ] T-47: Write news CRUD + viewing tests

### #184 — US-10: Manage News (Must, 5pts)

**As an** admin, **I want to** manage news (CRUD) with bilingual content, **so that** I can publish updates.

→ Combined with US-09 tasks above.

### #185 — US-11: View Gallery (Should, 5pts)

**As a** visitor, **I want to** view a photo gallery, **so that** I can see school events and campus.

**Tasks:**
- [ ] T-48: Create GalleryController + AlbumController
- [ ] T-49: Create Album + Photo models + migrations
- [ ] T-50: Create image upload handling + thumbnails
- [ ] T-51: Build admin/gallery/index.blade.php
- [ ] T-52: Build admin/gallery/album.blade.php
- [ ] T-53: Build public/gallery/index.blade.php
- [ ] T-54: Build public/gallery/album.blade.php
- [ ] T-55: Write gallery CRUD tests

### #186 — US-12: Manage Gallery (Should, 5pts)

**As an** admin, **I want to** manage gallery albums and photos, **so that** I can showcase the school.

→ Combined with US-11 tasks above.

### #187 — US-13: Events Calendar (Must, 5pts)

**As a** visitor, **I want to** view a school events calendar, **so that** I know upcoming dates.

**Tasks:**
- [ ] T-56: Create EventController (admin CRUD)
- [ ] T-57: Create Event model + migration
- [ ] T-58: Build admin/events/index.blade.php + create + edit
- [ ] T-59: Build public/calendar.blade.php (monthly view)
- [ ] T-60: Write event CRUD tests

### #188 — US-14: Activities (Should, 3pts)

**As a** visitor, **I want to** view school activities, **so that** I can see what's happening.

**Tasks:**
- [ ] T-61: Create ActivityController (admin CRUD)
- [ ] T-62: Build admin/activities/index.blade.php + create + edit
- [ ] T-63: Build public/activities.blade.php
- [ ] T-64: Write activity CRUD tests

### #189 — US-15: Achievements (Should, 3pts)

**As a** visitor, **I want to** view achievements, **so that** I can celebrate student/staff success.

**Tasks:**
- [ ] T-65: Create AchievementController (admin CRUD)
- [ ] T-66: Build admin/achievements/index.blade.php + create + edit
- [ ] T-67: Build public/achievements.blade.php
- [ ] T-68: Write achievement CRUD tests

---

## Sprint 3 — School Modules: Faculty, Leadership, Downloads, Notices, Enrollment (5 issues)

### #190 — US-16: Faculty Directory (Must, 5pts)

**As a** visitor, **I want to** view the faculty directory, **so that** I can find teacher information.

**Tasks:**
- [ ] T-69: Create FacultyController (admin CRUD)
- [ ] T-70: Create Faculty model + migration
- [ ] T-71: Build admin/faculty/index.blade.php + create + edit
- [ ] T-72: Build public/faculty.blade.php
- [ ] T-73: Write faculty CRUD tests

### #191 — US-17: Leadership Team (Should, 3pts)

**As a** visitor, **I want to** view the school leadership team, **so that** I know who runs the school.

**Tasks:**
- [ ] T-74: Create LeadershipController (admin CRUD)
- [ ] T-75: Build admin/leadership/index.blade.php + create + edit
- [ ] T-76: Build public/leadership.blade.php
- [ ] T-77: Write leadership CRUD tests

### #192 — US-18: Downloads (Must, 3pts)

**As a** visitor, **I want to** download files (forms, documents), **so that** I can access resources.

**Tasks:**
- [ ] T-78: Create DownloadController (admin CRUD + file upload)
- [ ] T-79: Create Download model + migration
- [ ] T-80: Build admin/downloads/index.blade.php + create + edit
- [ ] T-81: Build public/downloads.blade.php
- [ ] T-82: Write download CRUD + file upload tests

### #193 — US-19: Notices (Should, 3pts)

**As a** visitor, **I want to** see notices/bulletins, **so that** I stay informed of announcements.

**Tasks:**
- [ ] T-83: Create NoticeController (admin CRUD)
- [ ] T-84: Build admin/notices/index.blade.php + create + edit
- [ ] T-85: Build public/notices.blade.php
- [ ] T-86: Write notice CRUD tests

### #194 — US-20: Online Enrollment (Must, 8pts)

**As a** prospective student, **I want to** submit an online enrollment form, **so that** I can apply to the school.

**Tasks:**
- [ ] T-87: Create EnrollmentController (form + admin management)
- [ ] T-88: Create Enrollment model + migration
- [ ] T-89: Add enrollment form validation + CAPTCHA
- [ ] T-90: Build public/enrollment.blade.php (multi-step form)
- [ ] T-91: Build admin/enrollments/index.blade.php
- [ ] T-92: Build admin/enrollments/show.blade.php
- [ ] T-93: Write enrollment submission + management tests

---

## Sprint 4 — Admin Features, i18n, Testing, Deployment (7 issues)

### #195 — US-21: Messages (Must, 5pts)

**As an** admin, **I want to** manage incoming messages, **so that** I can respond to inquiries.

**Tasks:**
- [ ] T-94: Create Message model + migration (from contact form)
- [ ] T-95: Build admin/messages/index.blade.php (inbox)
- [ ] T-96: Build admin/messages/show.blade.php (detail + reply)
- [ ] T-97: Write message tests

### #196 — US-22: Settings (Must, 3pts)

**As an** admin, **I want to** configure site settings, **so that** I can manage site-wide options.

**Tasks:**
- [ ] T-98: Create SettingsController + Settings model
- [ ] T-99: Build admin/settings/index.blade.php
- [ ] T-100: Write settings update tests

### #197 — US-23: Audit Logs (Should, 3pts)

**As an** admin, **I want to** view audit logs, **so that** I can track system activity.

**Tasks:**
- [ ] T-101: Create AuditLog model + migration
- [ ] T-102: Create audit logging middleware/service
- [ ] T-103: Build admin/audit-logs/index.blade.php
- [ ] T-104: Write audit log tests

### #198 — US-24: Statistics Dashboard (Should, 5pts)

**As an** admin, **I want** statistics dashboards, **so that** I can analyze data.

**Tasks:**
- [ ] T-105: Create statistics endpoints
- [ ] T-106: Build admin/statistics/index.blade.php (charts)
- [ ] T-107: Write statistics tests

### #199 — US-25: Bilingual i18n — Khmer/English (Must, 5pts)

**As a** visitor, **I want to** view the site in Khmer or English, **so that** I can read in my language.

**Tasks:**
- [ ] T-108: Set up Laravel localization (lang/km, lang/en)
- [ ] T-109: Create language switcher component
- [ ] T-110: Translate all static UI text to Khmer
- [ ] T-111: Add locale middleware
- [ ] T-112: Write i18n switching tests

### #200 — US-26: Donate Page (Could, 2pts)

**As a** visitor, **I want a** Donate page, **so that** I can support the school.

**Tasks:**
- [ ] T-113: Build public/donate.blade.php (CMS-managed)
- [ ] T-114: Write donate page tests

### #201 — Sprint 4 — Testing, Security & Deployment

**Final sprint testing, security, and production launch.**

**Tasks:**
- [ ] T-115: Security audit (middleware, XSS, CSRF)
- [ ] T-116: Production env config, queue worker, backup
- [ ] T-117: UI polish (loading states, transitions)
- [ ] T-118: Performance optimization (lazy load, cache, minify)
- [ ] T-119: Full regression test (all modules)
- [ ] T-120: Lighthouse audit + performance
- [ ] T-121: UAT sessions with school staff
- [ ] T-122: Production deployment + QA sign-off

---

## Backlog Summary

| Sprint | Issues | Tasks | Points |
|--------|--------|-------|--------|
| 1 — Auth & Public Foundation | 9 | 40 | 26 |
| 2 — Content Modules | 7 | 28 | 28 |
| 3 — School Modules | 5 | 25 | 27 |
| 4 — Admin, i18n, Deploy | 7 | 29 | 24 |
| **Total** | **28** | **122** | **105** |
