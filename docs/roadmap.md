# Project Roadmap (Agile) — EduBridge Cambodia

**EduBridge Cambodia** — Bilingual School CMS & Communications Platform
**Total**: 28 issues, 122 tasks, 105 story points

---

## Sprint Overview

```
Sprint 1 (26 pts)    Sprint 2 (28 pts)    Sprint 3 (27 pts)    Sprint 4 (24 pts)
9 issues             7 issues             5 issues             7 issues
──────────────────    ──────────────────    ──────────────────    ──────────────────
US-01 Auth            US-09 View News       US-16 Faculty         US-21 Messages
US-02 RBAC            US-10 Manage News     US-17 Leadership      US-22 Settings
US-03 Home Page       US-11 View Gallery    US-18 Downloads       US-23 Audit Logs
US-04 About Page      US-12 Manage Gallery  US-19 Notices         US-24 Statistics
US-05 Contact Form    US-13 Events          US-20 Enrollment      US-25 i18n
US-06 Site Search     US-14 Activities                           US-26 Donate
US-07 Site Map        US-15 Achievements                         Testing & Deploy
US-08 Hero Admin
Chores Sprint 1
```

---

## Sprint 1 — Auth, RBAC & Public Website Foundation

**Goal**: Working auth with RBAC, public-facing pages, Hero Slides CMS, layout foundation.

| Day | Ceremony | BE-1 | BE-2 | FE-1 | FE-2 | QA |
|-----|----------|------|------|------|------|----|
| Mon | Sprint Planning | Auth controllers + middleware | Route groups + HeroSlide model | Tailwind config + app layout | Home page + Hero slides | Set up Pest |
| Tue | Daily Standup | Password reset + role redirect | Page CMS model + CRUD | x-components (card, table, modal, input) | About + Contact pages | Auth tests |
| Wed | Daily Standup | Search controller + SiteMap | Form request validation | Site Map + Search views | Contact form submission | Page + Hero tests |
| Thu | Backlog Grooming | Bug fixes | Bug fixes | Navbar + footer responsive | Bug fixes | Middleware + search tests |
| Fri | Sprint Review + Retro | Demo prep | Demo prep | — | UI polish | Full Sprint 1 regression |

**Issues**: #174–#182

---

## Sprint 2 — Content Modules

**Goal**: Full CRUD for content modules with public views.

| Day | Ceremony | BE-1 | BE-2 | FE-1 | FE-2 | QA |
|-----|----------|------|------|------|------|----|
| Mon | Sprint Planning | NewsController + GalleryController | EventController + validation | News index + create (admin) | News public page + detail | News CRUD tests |
| Tue | Daily Standup | ActivityController + AchievementController | Image upload handling | Gallery admin (albums + photos) | Gallery public page + lightbox | Gallery tests |
| Wed | Daily Standup | Bilingual content support | Bug fixes | Events admin (CRUD) | Calendar + Activities pages | Events + Activity tests |
| Thu | Backlog Grooming | Bug fixes | Bug fixes | Activities + Achievements admin | Achievements public page | Achievement tests |
| Fri | Sprint Review + Retro | Demo prep | Demo prep | — | UI polish | Full Sprint 2 regression |

**Issues**: #183–#189

---

## Sprint 3 — School Modules

**Goal**: School-specific modules with public pages and online enrollment.

| Day | Ceremony | BE-1 | BE-2 | FE-1 | FE-2 | QA |
|-----|----------|------|------|------|------|----|
| Mon | Sprint Planning | FacultyController + LeadershipController | NoticeController + validation | Faculty admin (CRUD) | Faculty public directory | Faculty CRUD tests |
| Tue | Daily Standup | DownloadController + file upload | Enrollment form + validation | Leadership admin (CRUD) | Leadership public page | Leadership tests |
| Wed | Daily Standup | Enrollment management | File type/size validation | Downloads admin (CRUD) | Downloads public page | Download + Notice tests |
| Thu | Backlog Grooming | Bug fixes | Bug fixes | Notices admin (CRUD) | Enrollment form + Notices page | Enrollment tests |
| Fri | Sprint Review + Retro | Demo prep | Demo prep | — | UI polish | Full Sprint 3 regression |

**Issues**: #190–#194

---

## Sprint 4 — Admin Features, i18n, Testing, Deployment

**Goal**: Admin tools, bilingual i18n, Donate, full test coverage, production deployment.

| Day | Ceremony | BE-1 | BE-2 | FE-1 | FE-2 | QA |
|-----|----------|------|------|------|------|----|
| Mon | Sprint Planning | MessageController + SettingsController | Audit logging service | Messages admin (inbox) | Settings page | Message + Settings tests |
| Tue | Daily Standup | Statistics + Enrollment Stats endpoints | Bilingual i18n setup (km/en) | Statistics dashboard + charts | Donate page | Stats tests |
| Wed | Daily Standup | Security audit (XSS, CSRF, SQLi) | Production config + deploy script | Audit Logs admin view | i18n language switcher | Security + i18n tests |
| Thu | UAT Session | Bug fixes + deployment | Bug fixes | UI polish + loading states | Performance optimization | Full regression + Lighthouse |
| Fri | Sprint Review + Retro + Launch | — | Production deployment | — | Performance + final polish | UAT sign-off + QA report |

**Issues**: #195–#201

---

## Velocity Tracking

| Sprint | Issues | Planned Pts | Actual | Running Avg |
|--------|--------|-------------|--------|-------------|
| 1 — Auth & Public Foundation | 9 | 26 | — | — |
| 2 — Content Modules | 7 | 28 | — | — |
| 3 — School Modules | 5 | 27 | — | — |
| 4 — Admin, i18n, Deploy | 7 | 24 | — | — |

---

## Risk Register

| Risk | Likelihood | Impact | Mitigation |
|------|-----------|--------|-----------|
| Khmer text rendering issues | Medium | High | Test Khmer Unicode early; use proper fonts |
| File upload security | Medium | High | Validate file type + size + magic bytes server-side |
| Enrollment form spam | Medium | Medium | Add CAPTCHA + rate limiting |
| Hero slide image optimization | Low | Medium | Auto-resize/compress on upload |
| Stakeholder unavailable for UAT | Medium | High | Schedule early; have backup contact |
