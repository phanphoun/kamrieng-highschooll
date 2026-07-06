# Sprint Plan (Agile) — EduBridge Cambodia

**Team**: 7 members (1 SM, 2 BE, 2 FE, 2 QA)
**Sprint Duration**: 1 week (Mon 9:00 – Fri 17:00)
**Estimation**: Story points (Fibonacci: 1, 2, 3, 5, 8, 13)
**Target Velocity**: 30–35 story points per sprint

---

## Product Backlog (28 issues)

| # | Issue | MoSCoW | Pts | Sprint |
|---|-------|--------|-----|--------|
| 174 | US-01: Auth — Register & Login | Must | 5 | 1 |
| 175 | US-02: Role-based Access Control | Must | 3 | 1 |
| 176 | US-03: Home Page with Hero Slides | Must | 5 | 1 |
| 177 | US-04: About Page CMS | Must | 3 | 1 |
| 178 | US-05: Contact Form | Must | 3 | 1 |
| 179 | US-06: Site Search | Should | 3 | 1 |
| 180 | US-07: Site Map | Could | 2 | 1 |
| 181 | US-08: Hero Slides Admin | Must | 2 | 1 |
| 182 | Sprint 1 Chores: Layout, Components, Tooling | Chore | — | 1 |
| 183 | US-09: View News | Must | 5 | 2 |
| 184 | US-10: Manage News | Must | 5 | 2 |
| 185 | US-11: View Gallery | Should | 5 | 2 |
| 186 | US-12: Manage Gallery | Should | 5 | 2 |
| 187 | US-13: Events Calendar | Must | 5 | 2 |
| 188 | US-14: Activities | Should | 3 | 2 |
| 189 | US-15: Achievements | Should | 3 | 2 |
| 190 | US-16: Faculty Directory | Must | 5 | 3 |
| 191 | US-17: Leadership Team | Should | 3 | 3 |
| 192 | US-18: Downloads | Must | 3 | 3 |
| 193 | US-19: Notices | Should | 3 | 3 |
| 194 | US-20: Online Enrollment | Must | 8 | 3 |
| 195 | US-21: Messages | Must | 5 | 4 |
| 196 | US-22: Settings | Must | 3 | 4 |
| 197 | US-23: Audit Logs | Should | 3 | 4 |
| 198 | US-24: Statistics Dashboard | Should | 5 | 4 |
| 199 | US-25: Bilingual i18n — Khmer/English | Must | 5 | 4 |
| 200 | US-26: Donate Page | Could | 2 | 4 |
| 201 | Sprint 4 Testing, Security & Deployment | Chore | — | 4 |

---

## Sprint 1 — Auth & Public Website Foundation (26 pts + chores)

**Goal**: Working auth with RBAC, public-facing pages, Hero Slides CMS, layout foundation.

| Issue | Pts | BE | FE | QA |
|-------|-----|----|----|----|
| #174 US-01 Auth | 5 | Auth controllers, password reset | Login/register views | Auth feature tests |
| #175 US-02 RBAC | 3 | Role middleware, route groups | — | Middleware tests |
| #176 US-03 Home | 5 | HeroSlide model + controller | Home page with hero slideshow | Home page tests |
| #177 US-04 About | 3 | Page CMS model + controller | About page view | About page tests |
| #178 US-05 Contact | 3 | Contact controller + form handling | Contact form with validation | Contact form tests |
| #179 US-06 Search | 3 | Search controller + logic | Search results view | Search tests |
| #180 US-07 Site Map | 2 | SiteMap controller + logic | Site Map view | Site Map tests |
| #181 US-08 Hero Admin | 2 | — | Hero slides admin view | Hero CRUD tests |
| #182 Chores | — | Route definitions | Layout, components, navbar, footer | Test framework |

**Sprint Backlog**: 9 issues, 26 story points

---

## Sprint 2 — Content Modules: News, Gallery, Events, Activities, Achievements (28 pts)

**Goal**: Full CRUD for content modules with public views.

| Issue | Pts | BE | FE | QA |
|-------|-----|----|----|----|
| #183 US-09 View News | 5 | — | News public list + detail | News viewing tests |
| #184 US-10 Manage News | 5 | NewsController (CRUD + bilingual) | News admin create/edit | News CRUD tests |
| #185 US-11 View Gallery | 5 | — | Gallery public view (albums + lightbox) | Gallery viewing tests |
| #186 US-12 Manage Gallery | 5 | Gallery + Album controllers | Gallery admin (album + photo mgmt) | Gallery CRUD tests |
| #187 US-13 Events | 5 | EventController + calendar logic | Calendar public + admin views | Event tests |
| #188 US-14 Activities | 3 | ActivityController | Activities admin + public | Activity tests |
| #189 US-15 Achievements | 3 | AchievementController | Achievements admin + public | Achievement tests |

**Sprint Backlog**: 7 issues, 28 story points

---

## Sprint 3 — School Modules: Faculty, Leadership, Downloads, Notices, Enrollment (27 pts)

**Goal**: School-specific modules with public pages and online enrollment.

| Issue | Pts | BE | FE | QA |
|-------|-----|----|----|----|
| #190 US-16 Faculty | 5 | FacultyController | Faculty admin + public directory | Faculty tests |
| #191 US-17 Leadership | 3 | LeadershipController | Leadership admin + public | Leadership tests |
| #192 US-18 Downloads | 3 | DownloadController + file upload | Downloads admin + public | Download tests |
| #193 US-19 Notices | 3 | NoticeController | Notices admin + public | Notice tests |
| #194 US-20 Enrollment | 8 | Enrollment form + admin mgmt | Enrollment form + admin views | Enrollment tests |

**Sprint Backlog**: 5 issues, 27 story points

---

## Sprint 4 — Admin Features, i18n, Testing, Deployment (24 pts + chores)

**Goal**: Admin tools, bilingual i18n, Donate, full testing, production deployment.

| Issue | Pts | BE | FE | QA |
|-------|-----|----|----|----|
| #195 US-21 Messages | 5 | MessageController | Messages admin view | Message tests |
| #196 US-22 Settings | 3 | SettingsController + config | Settings admin page | Settings tests |
| #197 US-23 Audit Logs | 3 | Audit logging service | Audit logs admin view | Audit tests |
| #198 US-24 Statistics | 5 | Stats endpoints + chart data | Statistics dashboard | Stats tests |
| #199 US-25 i18n | 5 | Laravel localization (km/en) | Language switcher + translations | i18n tests |
| #200 US-26 Donate | 2 | Donate page CMS | Donate page view | Donate tests |
| #201 Testing & Deploy | — | Security audit, production config | Performance, lazy load, cache | Full regression, Lighthouse |

**Sprint Backlog**: 7 issues, 24 story points

---

## Definition of Ready

- [ ] User story has clear acceptance criteria (Given/When/Then)
- [ ] Dependencies identified and resolved
- [ ] Estimated in story points
- [ ] UI mockup exists (if user-facing)
- [ ] QA test cases drafted

## Definition of Done

- [ ] Code reviewed and merged to `develop`
- [ ] Acceptance criteria pass
- [ ] Tests written and passing
- [ ] Role-based access verified
- [ ] Responsive on mobile, tablet, desktop
- [ ] No critical/high defects open
- [ ] QA verified (manual or automated)
