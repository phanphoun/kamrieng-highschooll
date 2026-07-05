# Project Roadmap (Agile)

**Kamrieng High School Management System** — 4 Sprints, 4 Weeks
**Team Velocity Target**: 30–35 story points / sprint
**Estimated Total**: 107 story points

---

## Sprint Overview

```
Sprint 1 (21 pts)    Sprint 2 (26 pts)    Sprint 3 (31 pts)    Sprint 4 (29 pts)
──────────────────    ──────────────────    ──────────────────    ──────────────────
Auth & Login          Student CRUD          Grade Entry           Admin Reports
RBAC Middleware       Teacher CRUD          Grade Viewing         Teacher Reports
Admin Dashboard       Class Schedule        Assignments Create   Student Report
User Management       Attendance Tracking   Submit Assignments    Profile Edit
                                            Announcements         Testing & Security
                                            Notifications         Deployment
```

---

## Burndown Chart (Target)

```
Points
107 │
100 │  ██
 90 │  ██
 80 │  ██  ██
 70 │  ██  ██
 60 │  ██  ██  ██
 50 │  ██  ██  ██
 40 │  ██  ██  ██  ██
 30 │  ██  ██  ██  ██
 20 │  ██  ██  ██  ██
 10 │  ██  ██  ██  ██
  0 └────────────────────
     S1    S2    S3    S4
     (21)  (26)  (31)  (29)
```

---

## Sprint 1 — Authentication, Role Permission, Dashboard, User Management

**Sprint Goal**: Working auth with RBAC, admin dashboard, user CRUD.

| Day | Ceremony | BE-1 | BE-2 | FE-1 | FE-2 | QA |
|-----|----------|------|------|------|------|----|
| Mon | Sprint Planning (10:00, 1hr) | Auth controllers | Middleware files | Tailwind config + app layout | Login view + register | Set up Pest |
| Tue | Daily Standup (9:00, 15min) | Password reset flow | Route groups in web.php | x-table, x-modal, x-card, x-input | Admin navbar + sidebar | Login + register tests |
| Wed | Daily Standup (9:00, 15min) | Fix role redirect | Named routes all roles | x-button, x-badge, x-alert, x-pagination | Teacher/student navbar | Role redirect tests |
| Thu | Backlog Grooming (14:00, 30min) | Bug fixes | Bug fixes | Admin/teacher/student layouts | Admin + teacher dashboard | Middleware tests |
| Fri | Sprint Review (14:00, 1hr) + Retro (15:30, 45min) | Demo prep | Demo prep | — | Student dashboard | User CRUD tests + dashboard test |

**What to demo at Sprint Review**:
1. Register a new user → login → redirected to correct dashboard
2. Admin dashboard showing KPI stats
3. Create/edit/delete a user in admin panel
4. Teacher cannot access admin routes (403)

---

## Sprint 2 — Student, Teacher, Schedule, Attendance

**Sprint Goal**: Student/Teacher CRUD, class scheduling, attendance tracking.

| Day | Ceremony | BE-1 | BE-2 | FE-1 | FE-2 | QA |
|-----|----------|------|------|------|------|----|
| Mon | Sprint Planning (10:00, 1hr) | SubjectController + EnrollmentController | Verify model relationships | Students index + create | Classes index + create | Student CRUD tests |
| Tue | Daily Standup (9:00, 15min) | Fix ScheduleController | StoreStudentRequest + StoreTeacherRequest | Students edit + show | Classes edit + show | Teacher CRUD tests |
| Wed | Daily Standup (9:00, 15min) | Teacher schedule routes | StoreClassRequest + StoreAttendanceRequest | Teachers index + create + edit + show | Schedule (student weekly) | Class CRUD tests |
| Thu | Backlog Grooming (14:00, 30min) | Bug fixes | Bug fixes | — | Attendance (teacher) record form | Attendance tests |
| Fri | Sprint Review (14:00) + Retro (15:30) | Demo prep | Demo prep | — | Fix UI issues | Schedule tests + cross-browser |

**What to demo at Sprint Review**:
1. Create a student, assign to class, view profile
2. Create a teacher, assign subjects, view profile
3. Student views weekly schedule
4. Teacher marks attendance for a class → student sees it

---

## Sprint 3 — Grades, Assignments, Announcements, Notifications

**Sprint Goal**: Grade entry, assignment submission, announcements, notifications.

| Day | Ceremony | BE-1 | BE-2 | FE-1 | FE-2 | QA |
|-----|----------|------|------|------|------|----|
| Mon | Sprint Planning (10:00, 1hr) | Fix GradeController + AssignmentController | Notification service | Grades (teacher) entry view | Announcements index + create | Grade entry tests |
| Tue | Daily Standup (9:00, 15min) | NotificationController | Audit logging | Grades (student) view | Announcements edit + show | Grade viewing tests |
| Wed | Daily Standup (9:00, 15min) | Bug fixes | StoreGradeRequest + StoreAssignmentRequest | Assignments (student) list + detail | Notifications dropdown | Submission tests |
| Thu | Backlog Grooming (14:00, 30min) | Bug fixes | Bug fixes | — | Notifications list page | Announcement tests |
| Fri | Sprint Review (14:00) + Retro (15:30) | Demo prep | Demo prep | — | UI fixes | Notification + validation tests |

**What to demo at Sprint Review**:
1. Teacher enters grades → student sees them
2. Teacher creates assignment → student submits with file
3. Admin publishes announcement → target audience notified
4. Notification bell shows unread count → mark as read

---

## Sprint 4 — Reports, Profile, Testing, Deployment

**Sprint Goal**: Reports dashboards, user profiles, full test coverage, production live.

| Day | Ceremony | BE-1 | BE-2 | FE-1 | FE-2 | QA |
|-----|----------|------|------|------|------|----|
| Mon | Sprint Planning (10:00, 1hr) | Admin ReportController (student + class) | Security audit | Reports index + student report | Profile (student) view + edit | Report tests |
| Tue | Daily Standup (9:00, 15min) | Attendance + grade distribution reports | Production config + deploy script | Class + attendance report views | Profile (teacher) view + edit | Teacher report tests |
| Wed | Daily Standup (9:00, 15min) | Teacher + Student ReportController | Queue + backup setup | Teacher reports | Alpine.js charts for reports | Full regression |
| Thu | UAT Session (10:00, 2hr) | Bug fixes | Final deployment | Student reports | UI polish + loading states | Performance + security tests |
| Fri | Sprint Review (14:00) + Retro (15:30) + Launch (17:00) | — | Production deployment | — | Performance optimization | UAT + sign-off + QA report |

**What to demo at Sprint Review**:
1. Admin generates student/class/attendance reports with charts
2. Teacher views class performance report
3. Student views own report card
4. Profile editing works
5. QA sign-off report + test results

**Launch**: Production deployment Friday 17:00.

---

## Velocity Tracking

| Sprint | Planned | Actual | Running Avg |
|--------|---------|--------|-------------|
| 1 | 21 | — | — |
| 2 | 26 | — | — |
| 3 | 31 | — | — |
| 4 | 29 | — | — |

*Update actual points completed after each Sprint Review.*

---

## Key Ceremonies Schedule

| Ceremony | When | Duration | Attendees | Purpose |
|----------|------|----------|-----------|---------|
| Sprint Planning | Mon 10:00 | 1hr | Full team | Commit to sprint backlog, assign tasks |
| Daily Standup | Mon–Thu 9:00 | 15min | Full team | Sync, identify blockers |
| Backlog Grooming | Thu 14:00 | 30min | SM + leads | Refine product backlog for next sprint |
| Sprint Review | Fri 14:00 | 1hr | Full team + stakeholders | Demo completed work, gather feedback |
| Sprint Retrospective | Fri 15:30 | 45min | Full team | Inspect and adapt process |
| UAT | Sprint 4 Thu 10:00 | 2hr | SM + QA + School staff | Stakeholder validation |

---

## Risk Register

| Risk | Likelihood | Impact | Mitigation |
|------|-----------|--------|-----------|
| Auth controllers (AuthenticatedSessionController) don't exist | High | High | Sprint 1 Day 1 priority |
| All Blade views need building from scratch | High | High | 2 FE devs parallel; shared component library |
| GradeController uses wrong model (updateOrCreate on User) | High | Medium | Refactor in Sprint 3 Day 1 |
| No middleware exists | High | High | Build Sprint 1 Day 1 |
| Velocity overestimated for first sprint | Medium | Medium | Start with 21 pts; adjust in Sprint Planning |
| Stakeholder unavailable for UAT | Medium | High | Schedule early; have backup contact |
