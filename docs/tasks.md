# Product Backlog — User Stories & Tasks

**Project**: EduBridge Cambodia — Bilingual School CMS & Communications Platform

**Total**: 28 issues, 122 tasks across 4 sprints

---

## Sprint 1 — Auth, RBAC & Public Website Foundation (9 issues)

### #174 — US-01: Auth — Register & Login (Must, 5pts)

**As a** visitor, **I want to** register and log in, **so that** I can access the admin panel.

**Acceptance Criteria:**
- Given a visitor on the register page, when they fill in valid details and submit, then they are registered and can log in
- Given a registered user on the login page, when they enter correct credentials, then they are logged in and redirected to the admin dashboard
- Given a user on the login page, when they enter invalid credentials, then they see an error message
- Given a logged-in user, when they click logout, then they are logged out and redirected to login
- Given a user on the forgot password page, when they enter their email, then they receive a password reset link

**Tasks:**
- [ ] T-01: Create Auth\AuthenticatedSessionController
- [ ] T-02: Create Auth\RegisteredUserController
- [ ] T-03: Implement role-based redirect after login
- [ ] T-04: Add password reset flow
- [ ] T-05: Build auth/login.blade.php
- [ ] T-06: Build auth/register.blade.php
- [ ] T-07: Write login/register feature tests
- [ ] T-08: Write forgotten password test

---

### #175 — US-02: Role-based Access Control (Must, 3pts)

**As an** admin, **I want** role-based access control, **so that** only authorized users access admin features.

**Acceptance Criteria:**
- Given an admin user, when they access `/admin/*`, then they see the page
- Given a non-admin user, when they access `/admin/*`, then they get a 403 response
- Given an unauthenticated user, when they access any protected route, then they are redirected to login
- Given any user, when they access public routes, then they always see the page

**Tasks:**
- [ ] T-09: Create AdminMiddleware
- [ ] T-10: Register middleware aliases in bootstrap/app.php
- [ ] T-11: Define route groups in routes/web.php
- [ ] T-12: Write middleware tests (unauthorized gets 403)

---

### #176 — US-03: Home Page with Hero Slides (Must, 5pts)

**As a** visitor, **I want to** view the Home page with hero slides, **so that** I see school highlights.

**Acceptance Criteria:**
- Given a visitor on the home page, when the page loads, then they see a hero slideshow with images and text
- Given the home page, when auto-play is active, then slides transition every 5 seconds
- Given a visitor, when they click the prev/next arrows, then the slide changes manually
- Given the home page, when viewed on mobile, then the layout is responsive
- Given the home page, when slides exist in the database, then they display in the configured order

**Tasks:**
- [ ] T-13: Create HeroSlide model + migration + seeder
- [ ] T-14: Create HeroSlideController (public display + order)
- [ ] T-15: Build public/home.blade.php (hero slideshow, featured sections)
- [ ] T-16: Write home page display tests

---

### #177 — US-04: About Page CMS (Must, 3pts)

**As a** visitor, **I want to** view the About page, **so that** I can learn about the school.

**Acceptance Criteria:**
- Given a visitor on the about page, when the page loads, then they see school information (history, mission, vision)
- Given an admin, when they edit the about content via Pages CMS, then the public about page reflects changes
- Given the about page, when viewed on mobile, then it is responsive

**Tasks:**
- [ ] T-17: Create Page model + migration (for CMS-managed pages)
- [ ] T-18: Create PageController (public view + admin CRUD)
- [ ] T-19: Build public/about.blade.php
- [ ] T-20: Write About page tests

---

### #178 — US-05: Contact Form (Must, 3pts)

**As a** visitor, **I want to** contact the school via a form, **so that** I can send inquiries.

**Acceptance Criteria:**
- Given a visitor on the contact page, when they fill in name, email, subject, message and submit, then the message is saved
- Given a visitor, when they submit the form with missing required fields, then they see validation errors
- Given a visitor, when they enter an invalid email, then they see an email validation error
- Given a visitor, after successful submission, then they see a confirmation message

**Tasks:**
- [ ] T-21: Create ContactController + message model + migration
- [ ] T-22: Add contact form validation + store logic
- [ ] T-23: Build public/contact.blade.php
- [ ] T-24: Write contact form submission tests

---

### #179 — US-06: Site Search (Should, 3pts)

**As a** visitor, **I want to** search the site, **so that** I can find content quickly.

**Acceptance Criteria:**
- Given a visitor on the search page, when they enter a query and submit, then they see matching results from pages, news, and events
- Given a visitor, when they search with no matching results, then they see a "no results" message
- Given a visitor, when they enter an empty query, then they see all content or a prompt to enter a search term

**Tasks:**
- [ ] T-25: Create search controller + query logic
- [ ] T-26: Build public/search.blade.php
- [ ] T-27: Write search functionality tests

---

### #180 — US-07: Site Map (Could, 2pts)

**As a** visitor, **I want a** Site Map, **so that** I can navigate the site.

**Acceptance Criteria:**
- Given a visitor on the site map page, when the page loads, then they see links to all public pages
- Given the site map, when a new public page is added, then it automatically appears in the list
- Given the site map, when clicked, then the link navigates to the correct page

**Tasks:**
- [ ] T-28: Create SiteMap controller + generate all public routes
- [ ] T-29: Build public/sitemap.blade.php
- [ ] T-30: Write Site Map tests

---

### #181 — US-08: Hero Slides Admin (Must, 2pts)

**As an** admin, **I want to** manage Hero Slides, **so that** I can update homepage banners.

**Acceptance Criteria:**
- Given an admin on the hero slides page, when they create a new slide with image and text, then it appears on the home page
- Given an admin, when they edit a slide, then changes are reflected immediately
- Given an admin, when they delete a slide, then it is removed from the home page
- Given an admin, when they reorder slides, then the home page displays them in the new order

**Tasks:**
- [ ] T-31: Build admin/hero-slides/index.blade.php
- [ ] T-32: Build admin/hero-slides/create.blade.php + edit.blade.php
- [ ] T-33: Write hero slide CRUD tests

---

### #182 — Sprint 1 — Chores: Layout, Components, Tooling

**Foundation tasks for Sprint 1.**

**Acceptance Criteria:**
- Given any page, when rendered, then it uses the app layout with navbar and footer
- Given the admin layout, when loaded, then it shows sidebar navigation and header
- Given any page, when using shared components (buttons, cards, tables, modals, inputs), then they render with consistent styling
- Given the site, when viewed on mobile/tablet/desktop, then the layout is responsive
- Given the test suite, when `php artisan test` runs, then all tests pass

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

**Acceptance Criteria:**
- Given a visitor on the news page, when the page loads, then they see a paginated list of published news articles
- Given a visitor, when they click a news article, then they see the full article with title, content, image, and publish date
- Given a visitor, when viewing news in Khmer, then they see the Khmer content; when viewing in English, then they see English content
- Given a visitor, when there are no published articles, then they see a "no news" message

**Tasks:**
- [ ] T-41: Create NewsController (admin CRUD + bilingual)
- [ ] T-42: Create News model + migration (bilingual fields)
- [ ] T-43: Build admin/news/index.blade.php
- [ ] T-44: Build admin/news/create.blade.php + edit.blade.php (bilingual)
- [ ] T-45: Build public/news/index.blade.php
- [ ] T-46: Build public/news/show.blade.php
- [ ] T-47: Write news CRUD + viewing tests

---

### #184 — US-10: Manage News (Must, 5pts)

**As an** admin, **I want to** manage news (CRUD) with bilingual content, **so that** I can publish updates.

**Acceptance Criteria:**
- Given an admin on the news page, when they create an article with Khmer and English content, then both language versions are saved
- Given an admin, when they edit an article, then changes are saved and reflected on the public site
- Given an admin, when they delete an article, then it is removed from the public site
- Given an admin, when they set an article as unpublished, then it is hidden from the public site
- Given an admin, when they upload an image, then it is displayed with the article

→ Combined with US-09 tasks above.

---

### #185 — US-11: View Gallery (Should, 5pts)

**As a** visitor, **I want to** view a photo gallery, **so that** I can see school events and campus.

**Acceptance Criteria:**
- Given a visitor on the gallery page, when the page loads, then they see a grid of photo albums
- Given a visitor, when they click an album, then they see photos in a grid layout
- Given a visitor, when they click a photo, then they see it in a lightbox viewer
- Given the gallery page, when viewed on mobile, then the grid adapts to screen size

**Tasks:**
- [ ] T-48: Create GalleryController + AlbumController
- [ ] T-49: Create Album + Photo models + migrations
- [ ] T-50: Create image upload handling + thumbnails
- [ ] T-51: Build admin/gallery/index.blade.php
- [ ] T-52: Build admin/gallery/album.blade.php
- [ ] T-53: Build public/gallery/index.blade.php
- [ ] T-54: Build public/gallery/album.blade.php
- [ ] T-55: Write gallery CRUD tests

---

### #186 — US-12: Manage Gallery (Should, 5pts)

**As an** admin, **I want to** manage gallery albums and photos, **so that** I can showcase the school.

**Acceptance Criteria:**
- Given an admin on the gallery page, when they create an album with title and description, then it appears in the public gallery
- Given an admin, when they upload photos to an album, then thumbnails are auto-generated
- Given an admin, when they reorder photos, then the public gallery reflects the new order
- Given an admin, when they delete a photo or album, then it is removed from the public site

→ Combined with US-11 tasks above.

---

### #187 — US-13: Events Calendar (Must, 5pts)

**As a** visitor, **I want to** view a school events calendar, **so that** I know upcoming dates.

**Acceptance Criteria:**
- Given a visitor on the calendar page, when the page loads, then they see a monthly calendar with event markers
- Given a visitor, when they click an event, then they see event details (title, date, time, location, description)
- Given a visitor, when they navigate to previous/next months, then events update accordingly
- Given an admin, when they create/edit/delete an event, then the calendar reflects changes

**Tasks:**
- [ ] T-56: Create EventController (admin CRUD)
- [ ] T-57: Create Event model + migration
- [ ] T-58: Build admin/events/index.blade.php + create + edit
- [ ] T-59: Build public/calendar.blade.php (monthly view)
- [ ] T-60: Write event CRUD tests

---

### #188 — US-14: Activities (Should, 3pts)

**As a** visitor, **I want to** view school activities, **so that** I can see what's happening.

**Acceptance Criteria:**
- Given a visitor on the activities page, when the page loads, then they see a list of activities with images and descriptions
- Given a visitor, when they click an activity, then they see the full details
- Given an admin, when they create/edit/delete an activity, then the public page reflects changes

**Tasks:**
- [ ] T-61: Create ActivityController (admin CRUD)
- [ ] T-62: Build admin/activities/index.blade.php + create + edit
- [ ] T-63: Build public/activities.blade.php
- [ ] T-64: Write activity CRUD tests

---

### #189 — US-15: Achievements (Should, 3pts)

**As a** visitor, **I want to** view achievements, **so that** I can celebrate student/staff success.

**Acceptance Criteria:**
- Given a visitor on the achievements page, when the page loads, then they see a list of achievements with title, description, and date
- Given a visitor, when there are many achievements, then they are paginated
- Given an admin, when they create/edit/delete an achievement, then the public page reflects changes

**Tasks:**
- [ ] T-65: Create AchievementController (admin CRUD)
- [ ] T-66: Build admin/achievements/index.blade.php + create + edit
- [ ] T-67: Build public/achievements.blade.php
- [ ] T-68: Write achievement CRUD tests

---

## Sprint 3 — School Modules: Faculty, Leadership, Downloads, Notices, Enrollment (5 issues)

### #190 — US-16: Faculty Directory (Must, 5pts)

**As a** visitor, **I want to** view the faculty directory, **so that** I can find teacher information.

**Acceptance Criteria:**
- Given a visitor on the faculty page, when the page loads, then they see a grid of faculty members with name, photo, position, and subjects
- Given a visitor, when they search or filter faculty, then results update in real-time
- Given an admin, when they create/edit/delete a faculty member, then the directory reflects changes
- Given the faculty page, when viewed on mobile, then the grid adapts to single column

**Tasks:**
- [ ] T-69: Create FacultyController (admin CRUD)
- [ ] T-70: Create Faculty model + migration
- [ ] T-71: Build admin/faculty/index.blade.php + create + edit
- [ ] T-72: Build public/faculty.blade.php
- [ ] T-73: Write faculty CRUD tests

---

### #191 — US-17: Leadership Team (Should, 3pts)

**As a** visitor, **I want to** view the school leadership team, **so that** I know who runs the school.

**Acceptance Criteria:**
- Given a visitor on the leadership page, when the page loads, then they see leadership members with name, title, photo, and bio
- Given an admin, when they create/edit/delete a leadership member, then the public page reflects changes

**Tasks:**
- [ ] T-74: Create LeadershipController (admin CRUD)
- [ ] T-75: Build admin/leadership/index.blade.php + create + edit
- [ ] T-76: Build public/leadership.blade.php
- [ ] T-77: Write leadership CRUD tests

---

### #192 — US-18: Downloads (Must, 3pts)

**As a** visitor, **I want to** download files (forms, documents), **so that** I can access resources.

**Acceptance Criteria:**
- Given a visitor on the downloads page, when the page loads, then they see a categorized list of downloadable files with name and description
- Given a visitor, when they click a download link, then the file is downloaded
- Given an admin, when they upload a file, then it appears in the correct category
- Given an admin, when they upload an invalid file type, then they see a validation error

**Tasks:**
- [ ] T-78: Create DownloadController (admin CRUD + file upload)
- [ ] T-79: Create Download model + migration
- [ ] T-80: Build admin/downloads/index.blade.php + create + edit
- [ ] T-81: Build public/downloads.blade.php
- [ ] T-82: Write download CRUD + file upload tests

---

### #193 — US-19: Notices (Should, 3pts)

**As a** visitor, **I want to** see notices/bulletins, **so that** I stay informed of announcements.

**Acceptance Criteria:**
- Given a visitor on the notices page, when the page loads, then they see a list of notices with title, date, and content
- Given a visitor, when a notice has an expiry date past, then it is not shown
- Given an admin, when they create/edit/delete a notice, then the public page reflects changes

**Tasks:**
- [ ] T-83: Create NoticeController (admin CRUD)
- [ ] T-84: Build admin/notices/index.blade.php + create + edit
- [ ] T-85: Build public/notices.blade.php
- [ ] T-86: Write notice CRUD tests

---

### #194 — US-20: Online Enrollment (Must, 8pts)

**As a** prospective student, **I want to** submit an online enrollment form, **so that** I can apply to the school.

**Acceptance Criteria:**
- Given a prospective student on the enrollment page, when they fill in all required fields (student name, DOB, grade, parent info, contact) and submit, then the enrollment is saved
- Given a user, when they submit with missing required fields, then they see validation errors
- Given a user, when they submit without completing the CAPTCHA, then they are blocked
- Given an admin on the enrollments page, when they view the list, then they see all submissions with status
- Given an admin, when they update the enrollment status (approved/rejected/pending), then the status is saved

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

**Acceptance Criteria:**
- Given an admin on the messages page, when the page loads, then they see an inbox with all contact form submissions
- Given an admin, when they click a message, then they see the full message with sender details
- Given an admin, when they view an unread message, then it is marked as read
- Given an admin, when they delete a message, then it is removed from the inbox

**Tasks:**
- [ ] T-94: Create Message model + migration (from contact form)
- [ ] T-95: Build admin/messages/index.blade.php (inbox)
- [ ] T-96: Build admin/messages/show.blade.php (detail + reply)
- [ ] T-97: Write message tests

---

### #196 — US-22: Settings (Must, 3pts)

**As an** admin, **I want to** configure site settings, **so that** I can manage site-wide options.

**Acceptance Criteria:**
- Given an admin on the settings page, when they update the school name, then it is reflected site-wide
- Given an admin, when they upload a site logo, then it replaces the current logo
- Given an admin, when they update contact information (address, phone, email), then it is reflected on the contact page and footer
- Given an admin, when they save settings, then changes persist after page reload

**Tasks:**
- [ ] T-98: Create SettingsController + Settings model
- [ ] T-99: Build admin/settings/index.blade.php
- [ ] T-100: Write settings update tests

---

### #197 — US-23: Audit Logs (Should, 3pts)

**As an** admin, **I want to** view audit logs, **so that** I can track system activity.

**Acceptance Criteria:**
- Given an admin on the audit logs page, when the page loads, then they see a table of all CRUD actions with user, action, model, and timestamp
- Given an admin, when they filter by action type or date range, then results update
- Given any CRUD operation, when it completes, then an audit log entry is created automatically

**Tasks:**
- [ ] T-101: Create AuditLog model + migration
- [ ] T-102: Create audit logging middleware/service
- [ ] T-103: Build admin/audit-logs/index.blade.php
- [ ] T-104: Write audit log tests

---

### #198 — US-24: Statistics Dashboard (Should, 5pts)

**As an** admin, **I want** statistics dashboards, **so that** I can analyze data.

**Acceptance Criteria:**
- Given an admin on the statistics page, when the page loads, then they see charts for enrollment counts, page views, and content distribution
- Given an admin, when they apply date range filters, then charts update accordingly
- Given the statistics page, when data is loading, then a loading state is displayed
- Given the statistics page, when there is no data, then an empty state message is shown

**Tasks:**
- [ ] T-105: Create statistics endpoints
- [ ] T-106: Build admin/statistics/index.blade.php (charts)
- [ ] T-107: Write statistics tests

---

### #199 — US-25: Bilingual i18n — Khmer/English (Must, 5pts)

**As a** visitor, **I want to** view the site in Khmer or English, **so that** I can read in my language.

**Acceptance Criteria:**
- Given a visitor on any page, when they click the language switcher, then the page content switches between Khmer and English
- Given a visitor, when they switch language, then their preference is remembered across pages
- Given a visitor, when they return to the site, then their language preference persists
- Given all public pages, when viewed in Khmer, then all static UI text is translated

**Tasks:**
- [ ] T-108: Set up Laravel localization (lang/km, lang/en)
- [ ] T-109: Create language switcher component
- [ ] T-110: Translate all static UI text to Khmer
- [ ] T-111: Add locale middleware
- [ ] T-112: Write i18n switching tests

---

### #200 — US-26: Donate Page (Could, 2pts)

**As a** visitor, **I want a** Donate page, **so that** I can support the school.

**Acceptance Criteria:**
- Given a visitor on the donate page, when the page loads, then they see donation information (bank details, QR code, instructions)
- Given an admin, when they edit the donate page content via CMS, then the public page reflects changes

**Tasks:**
- [ ] T-113: Build public/donate.blade.php (CMS-managed)
- [ ] T-114: Write donate page tests

---

### #201 — Sprint 4 — Testing, Security & Deployment

**Final sprint testing, security, and production launch.**

**Acceptance Criteria:**
- Given the application, when all tests run via `php artisan test`, then all tests pass with no failures
- Given the application, when a Lighthouse audit is run, then the score is 90+ on mobile and desktop
- Given the production environment, when deployed, then HTTPS is enforced and all security headers are set
- Given all admin routes, when accessed by a non-admin user, then they return 403
- Given all forms, when submitted, then CSRF protection is active
- Given the production server, when a failure occurs, then the queue worker and backup system handle recovery

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
