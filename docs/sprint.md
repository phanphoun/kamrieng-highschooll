# Sprint Plan (Agile)

**Team**: 7 members (1 SM, 2 BE, 2 FE, 2 QA)
**Sprint Duration**: 1 week (Mon 9:00 – Fri 17:00)
**Ceremonies**: Daily Standup (15min), Sprint Review (1hr Fri), Retrospective (45min Fri)
**Estimation**: Story points (Fibonacci: 1, 2, 3, 5, 8, 13)
**Team Velocity Target**: 30–35 story points per sprint

---

## Product Backlog (Prioritized)

| ID | User Story | MoSCoW | Points | Sprint |
|----|-----------|--------|--------|--------|
| US-01 | As a visitor, I want to register an account and log in, so that I can access the system | Must | 5 | 1 |
| US-02 | As an admin, I want role-based access control, so that users only see their permitted features | Must | 3 | 1 |
| US-03 | As an admin, I want a dashboard with key stats, so that I can see system status at a glance | Must | 5 | 1 |
| US-04 | As an admin, I want to manage users (CRUD), so that I can add/edit/remove system users | Must | 8 | 1 |
| US-05 | As an admin, I want to manage students (CRUD), so that I can maintain student records | Must | 8 | 2 |
| US-06 | As an admin, I want to manage teachers (CRUD), so that I can maintain teacher records | Must | 5 | 2 |
| US-07 | As a student, I want to view my class schedule, so that I know when and where my classes are | Must | 5 | 2 |
| US-08 | As a teacher, I want to record attendance for my classes, so that I can track student participation | Must | 8 | 2 |
| US-09 | As a teacher, I want to enter grades for my students, so that I can record their performance | Must | 8 | 3 |
| US-10 | As a student, I want to view my grades, so that I can track my academic progress | Must | 3 | 3 |
| US-11 | As a teacher, I want to create assignments for my class, so that students can submit work | Should | 5 | 3 |
| US-12 | As a student, I want to submit assignments online, so that I don't need paper submissions | Should | 5 | 3 |
| US-13 | As an admin, I want to publish announcements, so that I can communicate with all users | Must | 5 | 3 |
| US-14 | As a user, I want to receive notifications, so that I stay informed about updates | Should | 5 | 3 |
| US-15 | As an admin, I want to generate reports, so that I can analyze student and class performance | Must | 8 | 4 |
| US-16 | As a teacher, I want to view class reports, so that I can assess teaching effectiveness | Should | 5 | 4 |
| US-17 | As a student, I want to view my own performance report, so that I can see my progress | Should | 3 | 4 |
| US-18 | As a student, I want to edit my profile, so that I can keep my information up to date | Could | 3 | 4 |
| US-19 | As a teacher, I want to edit my profile, so that I can keep my information current | Could | 2 | 4 |
| US-20 | As a user, I want the system to be tested and secure, so that my data is safe | Must | 8 | 4 |

---

## Sprint 1 — Authentication, Role Permission, Dashboard, User Management

**Sprint Goal**: Working auth with RBAC, admin dashboard, and user CRUD.

| User Story | Points | BE | FE | QA | Acceptance Criteria |
|------------|--------|----|----|----|-------------------|
| US-01 Register & Login | 5 | Auth controllers, password reset | Login/register Blade views | Auth feature tests | User can register, login, logout; password reset works |
| US-02 Role-based Access | 3 | Middleware (admin, teacher, student, parent), route groups | — | Middleware tests | Admin cannot access teacher routes; unauthenticated redirected to login |
| US-03 Admin Dashboard | 5 | Stats endpoint (student/teacher/class counts) | Dashboard with KPI cards, recent activity | Dashboard tests | Dashboard shows correct counts; charts render |
| US-04 User Management | 8 | Admin UserController (CRUD) | User list, create, edit, delete views | User CRUD tests | Admin can list, create, edit, delete users; validation works |
| **Spike/Chore** | — | Middleware registration, route definitions, shared components | Layouts, navbar, sidebar, base components | Test framework setup | All environments consistent; CI passes |

**Sprint Backlog**: 21 story points
**Daily Standup**: 9:00 AM, 3 questions (yesterday, today, blockers)
**Sprint Review**: Fri 14:00 — demo working auth, dashboard, user management
**Retrospective**: Fri 15:30 — what went well, what to improve, action items

---

## Sprint 2 — Student, Teacher, Schedule, Attendance

**Sprint Goal**: Student/Teacher CRUD, class scheduling, and attendance tracking.

| User Story | Points | BE | FE | QA | Acceptance Criteria |
|------------|--------|----|----|----|-------------------|
| US-05 Student Management | 8 | SubjectController, EnrollmentController | Student list, create, edit, detail views | Student CRUD tests | Admin can manage students; search works; enrollment works |
| US-06 Teacher Management | 5 | — | Teacher list, create, edit, detail views | Teacher CRUD tests | Admin can manage teachers; assign subjects works |
| US-07 Class Schedule | 5 | Fix ScheduleController relationship | Weekly timetable (student), daily view | Schedule tests | Student sees weekly schedule; teacher sees class schedule |
| US-08 Attendance | 8 | Attendance controller (store, report) | Attendance form (teacher), Alpine.js checkboxes | Attendance tests | Teacher records attendance; validation prevents duplicates |
| **Spike/Chore** | — | Form request validation classes | Cross-browser, responsive fixes | Test writing | All feature tests passing |

**Sprint Backlog**: 26 story points
**Sprint Review**: Fri 14:00 — demo student/teacher CRUD, schedule view, attendance recording
**Retrospective**: Fri 15:30

---

## Sprint 3 — Grades, Assignments, Announcements, Notifications

**Sprint Goal**: Grade entry, assignment submission, announcements, and notification system.

| User Story | Points | BE | FE | QA | Acceptance Criteria |
|------------|--------|----|----|----|-------------------|
| US-09 Enter Grades | 8 | Fix GradeController for proper Grade model | Grade entry form (teacher), Alpine.js bulk save | Grade entry tests | Teacher enters grades; scores validated; stored correctly |
| US-10 View Grades | 3 | — | Grade list + detail (student) | Grade viewing tests | Student sees own grades only; grade letter calculated |
| US-11 Create Assignments | 5 | Teacher AssignmentController | Assignment create form (teacher) | Assignment tests | Teacher creates assignment with due date, file attach |
| US-12 Submit Assignments | 5 | Submission handling, file upload | Submit form (student), file upload | Submission tests | Student submits text + file; file type/size validated |
| US-13 Announcements | 5 | AnnouncementController (CRUD) | Announcement list, create, edit views | Announcement tests | Admin creates announcement; audience targeting works |
| US-14 Notifications | 5 | Notification service, auto-create on events | Dropdown (Alpine.js), list page, mark read | Notification tests | Notification created on grade, announcement; mark read works |
| **Spike/Chore** | — | Audit logging for all writes | UI polish | Validation + upload tests | All write operations logged |

**Sprint Backlog**: 31 story points
**Sprint Review**: Fri 14:00 — demo grades, assignments, announcements, notifications
**Retrospective**: Fri 15:30

---

## Sprint 4 — Reports, Profile, Testing, Deployment

**Sprint Goal**: Reports dashboard, user profiles, full test coverage, production deployment.

| User Story | Points | BE | FE | QA | Acceptance Criteria |
|------------|--------|----|----|----|-------------------|
| US-15 Admin Reports | 8 | ReportController (student, class, attendance) | Report views with charts (Alpine.js + Chart.js) | Report tests | Admin sees student/class/attendance reports; filters work |
| US-16 Teacher Reports | 5 | Teacher ReportController | Teacher report views | Teacher report tests | Teacher sees own class reports only |
| US-17 Student Report | 3 | Student ReportController | Student performance view | Student report tests | Student sees own performance summary |
| US-18 Student Profile | 3 | — | Profile view + edit form | Profile tests | Student edits name, email, phone; validation works |
| US-19 Teacher Profile | 2 | — | Profile view + edit form | — | Teacher edits profile; validation works |
| US-20 Testing & Security | 8 | Security audit (XSS, CSRF, SQLi) | Performance optimization, lazy loading | Full regression, perf, security tests | All tests pass; Lighthouse 90+; OWASP mitigations applied |
| **Spike/Chore** | — | Deployment script, backup, queue worker | Production environment config | UAT with school staff, sign-off | Production live; handover docs complete |

**Sprint Backlog**: 29 story points
**Sprint Review**: Fri 14:00 — demo reports, profiles, present QA sign-off
**Retrospective**: Fri 15:30 — full project retrospective
**Launch**: Fri 17:00 — production deployment

---

## Velocity Tracking

| Sprint | Planned Points | Completed Points | Velocity |
|--------|---------------|-----------------|----------|
| Sprint 1 | 21 | — | — |
| Sprint 2 | 26 | — | — |
| Sprint 3 | 31 | — | — |
| Sprint 4 | 29 | — | — |

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
