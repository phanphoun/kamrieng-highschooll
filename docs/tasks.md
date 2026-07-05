# Product Backlog — User Stories

**Prioritization**: MoSCoW (Must, Should, Could, Won't)
**Estimation**: Story points (Fibonacci: 1, 2, 3, 5, 8, 13)

---

## Sprint 1 — Auth, Role Permission, Dashboard, User Management

### US-01: Register & Login (Must, 5 pts)

**As a** visitor, **I want to** register an account and log in, **so that** I can access the system.

**Acceptance Criteria:**
- Given a visitor on the register page, when they fill in valid details and submit, then they are registered and redirected to login
- Given a registered user on the login page, when they enter correct credentials, then they are logged in and redirected to their role dashboard
- Given a user on the login page, when they enter invalid credentials, then they see an error message
- Given a logged-in user, when they click logout, then they are logged out and redirected to login

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-01 | Create `Auth\AuthenticatedSessionController` (create, store, destroy) | BE-1 | 2 |
| T-02 | Create `Auth\RegisteredUserController` (create, store with role) | BE-1 | 1 |
| T-03 | Implement role-based redirect after login | BE-1 | 1 |
| T-04 | Add password reset flow (ForgotPassword + ResetPassword controllers) | BE-1 | 1 |
| T-05 | Build `auth/login.blade.php` (email, password, remember me, validation errors) | FE-2 | 1 |
| T-06 | Build `auth/register.blade.php` (name, email, password, confirm, role) | FE-2 | 1 |
| T-07 | Write login/register feature tests | QA-1 | 1 |
| T-08 | Write forgotten password test | QA-1 | 1 |

---

### US-02: Role-based Access Control (Must, 3 pts)

**As an** admin, **I want to** role-based access control, **so that** users only see their permitted features.

**Acceptance Criteria:**
- Given an admin user, when they access `/admin/*`, then they see the page
- Given a teacher user, when they access `/admin/*`, then they get a 403
- Given a student user, when they access `/teacher/*`, then they get a 403
- Given an unauthenticated user, when they access any protected route, then they are redirected to login

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-09 | Create `AdminMiddleware`, `TeacherMiddleware`, `StudentMiddleware`, `ParentMiddleware` | BE-2 | 1 |
| T-10 | Register middleware aliases in `bootstrap/app.php` | BE-2 | 1 |
| T-11 | Define route groups in `routes/web.php` with middleware per role | BE-2 | 1 |
| T-12 | Write middleware tests (unauthorized gets 403) | QA-1 | 1 |

---

### US-03: Admin Dashboard (Must, 5 pts)

**As an** admin, **I want to** a dashboard with key statistics, **so that** I can see system status at a glance.

**Acceptance Criteria:**
- Given an admin on the dashboard, when it loads, then they see KPI cards (total students, teachers, classes, parents)
- Given the dashboard, when data changes, then stats reflect current database counts
- Given the dashboard, when viewed on mobile, then layout is responsive

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-13 | Build `admin/dashboard.blade.php` (KPI cards, recent activity, stats) | FE-2 | 2 |
| T-14 | Build `teacher/dashboard.blade.php` (my classes, recent grades, schedule) | FE-2 | 1 |
| T-15 | Build `student/dashboard.blade.php` (schedule, grades, attendance, announcements) | FE-2 | 1 |
| T-16 | Verify dashboard controller returns correct counts from DB | BE-1 | 1 |
| T-17 | Write dashboard stat tests | QA-2 | 1 |

---

### US-04: User Management (Must, 8 pts)

**As an** admin, **I want to** manage users (CRUD), **so that** I can add, edit, and remove system users.

**Acceptance Criteria:**
- Given an admin on the users page, when they click create, then they can add a new user with role
- Given an admin on the users page, when they click edit, then they can update user details and change password
- Given an admin on the users page, when they click delete, then the user is removed
- Given an admin on the users page, when they search, then results filter in real-time

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-18 | Build `admin/users/index.blade.php` (table, search, pagination, actions) | FE-2 | 2 |
| T-19 | Build `admin/users/create.blade.php` (form with role select, validation) | FE-2 | 1 |
| T-20 | Build `admin/users/edit.blade.php` (pre-filled form, optional password) | FE-2 | 1 |
| T-21 | Build `admin/users/show.blade.php` (user detail card) | FE-2 | 1 |
| T-22 | Write user CRUD feature tests | QA-2 | 2 |
| T-23 | Write role assignment tests | QA-2 | 1 |

---

### Chores — Sprint 1 Foundation

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-24 | Configure Tailwind CSS v4 theme (colors, fonts, spacing) | FE-1 | 1 |
| T-25 | Build `layouts/app.blade.php` (HTML shell, CSRF, Vite, fonts) | FE-1 | 1 |
| T-26 | Build shared components: `x-button`, `x-card`, `x-table`, `x-modal` | FE-1 | 2 |
| T-27 | Build shared components: `x-input`, `x-select`, `x-textarea`, `x-badge`, `x-alert`, `x-pagination` | FE-1 | 2 |
| T-28 | Build `components/admin-navbar.blade.php` + `components/admin-sidebar.blade.php` | FE-2 | 2 |
| T-29 | Build `components/teacher-navbar.blade.php` + `components/student-navbar.blade.php` | FE-2 | 1 |
| T-30 | Build `layouts/admin.blade.php`, `layouts/teacher.blade.php`, `layouts/student.blade.php` | FE-1 | 1 |
| T-31 | Set up Pest testing framework + CI config | QA-1 | 1 |

**Sprint 1 Totals**: 8 user stories/tasks broken into 31 sub-tasks, 21 story points.

---

## Sprint 2 — Student, Teacher, Schedule, Attendance

### US-05: Student Management (Must, 8 pts)

**As an** admin, **I want to** manage student records, **so that** I can track student information and enrollment.

**Acceptance Criteria:**
- Given an admin on the students page, when they create a student, then the student is added with role=student
- Given an admin on the students page, when they edit, then student details update
- Given an admin on the students page, when they delete, then the student is removed
- Given an admin on the student detail page, then they see enrollments, attendance, and grades summary

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-32 | Create `Admin\SubjectController` (CRUD for subjects) | BE-1 | 1 |
| T-33 | Create `Admin\EnrollmentController` (enroll, batch enroll, drop) | BE-1 | 2 |
| T-34 | Build `admin/students/index.blade.php` (table, search, filter by class/status) | FE-1 | 2 |
| T-35 | Build `admin/students/create.blade.php` (form) | FE-1 | 1 |
| T-36 | Build `admin/students/edit.blade.php` (pre-filled) | FE-1 | 1 |
| T-37 | Build `admin/students/show.blade.php` (profile, enrollment, attendance, grades) | FE-1 | 2 |
| T-38 | Write student CRUD feature tests | QA-1 | 2 |

---

### US-06: Teacher Management (Must, 5 pts)

**As an** admin, **I want to** manage teacher records, **so that** I can maintain staff information.

**Acceptance Criteria:**
- Given an admin on the teachers page, when they create, then the teacher is added with role=teacher
- Given an admin, when they edit a teacher, then details update
- Given an admin, when they delete, then the teacher is removed
- Given an admin on teacher detail, then they see assigned classes and subjects

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-39 | Build `admin/teachers/index.blade.php` (table, search, filter by specialization) | FE-1 | 1 |
| T-40 | Build `admin/teachers/create.blade.php` (form with specialization, qualification) | FE-1 | 1 |
| T-41 | Build `admin/teachers/edit.blade.php` (pre-filled) | FE-1 | 1 |
| T-42 | Build `admin/teachers/show.blade.php` (detail, class list, subjects) | FE-1 | 1 |
| T-43 | Write teacher CRUD feature tests | QA-1 | 2 |

---

### US-07: Class Schedule (Must, 5 pts)

**As a** student, **I want to** view my class schedule, **so that** I know when and where my classes are.

**Acceptance Criteria:**
- Given a student on the schedule page, when it loads, then they see a weekly timetable grid
- Given a student, when they click a day, then they see detailed schedule for that day
- Given a teacher, when they view schedule, then they see their teaching timetable

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-44 | Fix `Student\ScheduleController` — ensure `schedule` relationship exists on model | BE-1 | 1 |
| T-45 | Add schedule routes for teacher (view class schedule) | BE-1 | 1 |
| T-46 | Build `student/schedule.blade.php` (weekly timetable grid with Alpine.js) | FE-2 | 2 |
| T-47 | Build `student/schedule-daily.blade.php` (day view) | FE-2 | 1 |
| T-48 | Write schedule display tests | QA-2 | 2 |

---

### US-08: Attendance (Must, 8 pts)

**As a** teacher, **I want to** record attendance for my classes, **so that** I can track student participation.

**Acceptance Criteria:**
- Given a teacher on the attendance page, when they select a class and date, then they see the student list
- Given a teacher, when they mark students as present/absent/late/excused and save, then attendance is recorded
- Given a teacher, when they try to record duplicate attendance for same date, then they see a warning
- Given a student, when they view attendance, then they see their attendance record

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-49 | Verify AttendanceController relationships match new migrations | BE-2 | 1 |
| T-50 | Add `StoreAttendanceRequest` validation | BE-2 | 1 |
| T-51 | Build `teacher/attendance.blade.php` (class list with today's date, action button) | FE-2 | 1 |
| T-52 | Build `teacher/attendance-class.blade.php` (student list with status radios, Alpine.js bulk save) | FE-2 | 3 |
| T-53 | Build `student/attendance.blade.php` (attendance history table) | FE-2 | 1 |
| T-54 | Write attendance recording tests | QA-2 | 2 |

**Sprint 2 Totals**: 4 user stories → 23 sub-tasks, 26 story points.

---

## Sprint 3 — Grades, Assignments, Announcements, Notifications

### US-09: Enter Grades (Must, 8 pts)

**As a** teacher, **I want to** enter grades for my students, **so that** I can record their academic performance.

**Acceptance Criteria:**
- Given a teacher on the grade entry page, when they select a class, then they see the student list
- Given a teacher, when they enter scores and save, then grades are stored in the grades table
- Given a teacher, when they enter a score outside 0-100, then they see a validation error
- Given a teacher, when they add comments, then comments are saved with the grade

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-55 | Refactor `Teacher\GradeController` to use proper `Grade` model | BE-1 | 2 |
| T-56 | Add `StoreGradeRequest` validation (score range, required fields) | BE-2 | 1 |
| T-57 | Build `teacher/grades.blade.php` (class list, click to grade) | FE-1 | 1 |
| T-58 | Build `teacher/grade-class.blade.php` (student list, score input, comments, Alpine.js) | FE-1 | 3 |
| T-59 | Write grade entry tests | QA-1 | 2 |

---

### US-10: View Grades (Must, 3 pts)

**As a** student, **I want to** view my grades, **so that** I can track my academic progress.

**Acceptance Criteria:**
- Given a student on the grades page, when it loads, then they see a table of their grades by subject
- Given a student, when they click a grade, then they see detailed view with teacher feedback
- Given a student, when another student's grades are accessed, then they get a 403

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-60 | Build `student/grades.blade.php` (table: subject, score, grade letter, comments, date) | FE-1 | 1 |
| T-61 | Build `student/grade-detail.blade.php` (detailed view with teacher comments) | FE-1 | 1 |
| T-62 | Write grade viewing tests | QA-1 | 1 |

---

### US-11: Create Assignments (Should, 5 pts)

**As a** teacher, **I want to** create assignments for my class, **so that** students can submit work.

**Acceptance Criteria:**
- Given a teacher on the assignment creation page, when they fill in title, description, due date, and file, then the assignment is created
- Given a teacher, when they edit an assignment, then changes are saved
- Given a teacher, when they close an assignment, then students cannot submit anymore

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-63 | Create `Teacher\AssignmentController` (full CRUD) | BE-1 | 2 |
| T-64 | Add `StoreAssignmentRequest` validation | BE-2 | 1 |
| T-65 | Build assignment create/edit form (teacher) | FE-1 | 2 |
| T-66 | Write assignment CRUD tests | QA-1 | 2 |

---

### US-12: Submit Assignments (Should, 5 pts)

**As a** student, **I want to** submit assignments online, **so that** I don't need paper submissions.

**Acceptance Criteria:**
- Given a student on an assignment detail page, when they upload a file and submit, then the submission is saved
- Given a student, when they submit after the due date, then they see a late submission warning
- Given a student, when they upload a file over 10MB, then they see a size validation error

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-67 | Build `student/assignments.blade.php` (list: title, class, due date, status, submit) | FE-1 | 1 |
| T-68 | Build `student/assignment-detail.blade.php` (detail + submission form with file upload) | FE-1 | 2 |
| T-69 | Write submission tests (text + file upload, validation) | QA-1 | 2 |

---

### US-13: Announcements (Must, 5 pts)

**As an** admin, **I want to** publish announcements, **so that** I can communicate with students, teachers, and parents.

**Acceptance Criteria:**
- Given an admin on the announcements page, when they create with title, content, and target audience, then it's published
- Given an admin, when they set a publish date in the future, then it's scheduled
- Given an admin, when they set an expiry date, then it auto-hides after that date
- Given a user, when they log in, then they see active announcements for their role

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-70 | Build `admin/announcements/index.blade.php` (table, status, dates) | FE-2 | 1 |
| T-71 | Build `admin/announcements/create.blade.php` (form with audience, dates) | FE-2 | 1 |
| T-72 | Build `admin/announcements/edit.blade.php` + `admin/announcements/show.blade.php` | FE-2 | 1 |
| T-73 | Write announcement CRUD tests | QA-1 | 2 |
| T-74 | Write announcement scheduling tests | QA-2 | 1 |

---

### US-14: Notifications (Should, 5 pts)

**As a** user, **I want to** receive notifications, **so that** I stay informed about grades, assignments, and announcements.

**Acceptance Criteria:**
- Given a grade is entered, when it's saved, then the student receives a notification
- Given an announcement is published, when it goes live, then the target audience receives notifications
- Given a user with unread notifications, when they click the bell icon, then they see the dropdown list
- Given a user, when they mark a notification as read, then the unread count decreases

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-75 | Create `Admin\NotificationController` (list, mark read) | BE-1 | 1 |
| T-76 | Create notification service (auto-create on grade, announcement, assignment) | BE-2 | 2 |
| T-77 | Add audit logging to grade/assignment write operations | BE-2 | 1 |
| T-78 | Build notifications dropdown in navbar (Alpine.js, unread count, mark read) | FE-2 | 2 |
| T-79 | Build notifications list page (filter read/unread, mark all read) | FE-2 | 1 |
| T-80 | Write notification creation tests | QA-2 | 2 |

**Sprint 3 Totals**: 6 user stories → 26 sub-tasks, 31 story points.

---

## Sprint 4 — Reports, Profile, Testing, Deployment

### US-15: Admin Reports (Must, 8 pts)

**As an** admin, **I want to** generate reports, **so that** I can analyze student and class performance.

**Acceptance Criteria:**
- Given an admin on the reports page, when they select a student, then they see grades per subject and term
- Given an admin, when they select a class, then they see average scores and pass rates
- Given an admin, when they select a date range for attendance, then they see attendance rates
- Given an admin, when they view grade distribution, then they see a chart breakdown

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-81 | Build `Admin\ReportController` — student performance | BE-1 | 2 |
| T-82 | Build `Admin\ReportController` — class performance, attendance, grade distribution | BE-1 | 3 |
| T-83 | Build `admin/reports/index.blade.php` (report type cards) | FE-1 | 1 |
| T-84 | Build `admin/reports/students.blade.php` (selector, subject filter, grade table, chart) | FE-1 | 2 |
| T-85 | Build `admin/reports/classes.blade.php` (selector, year, report table) | FE-1 | 1 |
| T-86 | Build `admin/reports/attendance.blade.php` (date range, rates, trend) | FE-1 | 1 |
| T-87 | Write report generation tests | QA-1 | 2 |

---

### US-16: Teacher Reports (Should, 5 pts)

**As a** teacher, **I want to** view class reports, **so that** I can assess teaching effectiveness.

**Acceptance Criteria:**
- Given a teacher on reports, when they select one of their classes, then they see grade summary and distribution
- Given a teacher, when they view attendance report, then they see rates per student

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-88 | Build `Teacher\ReportController` (class-specific reports) | BE-1 | 2 |
| T-89 | Build `teacher/reports/index.blade.php` (class list, click for report) | FE-1 | 1 |
| T-90 | Write teacher report tests | QA-1 | 1 |

---

### US-17: Student Report (Should, 3 pts)

**As a** student, **I want to** view my own performance report, **so that** I can see my progress.

**Acceptance Criteria:**
- Given a student on their report page, when it loads, then they see grades, attendance rate, and summary

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-91 | Build `Student\ReportController` (own performance summary) | BE-1 | 1 |
| T-92 | Build `student/reports/index.blade.php` (grades table, attendance rate, summary) | FE-1 | 1 |
| T-93 | Write student report tests | QA-1 | 1 |

---

### US-18 & US-19: Profiles (Could, 5 pts)

**As a** student/teacher, **I want to** edit my profile, **so that** I can keep my information up to date.

**Acceptance Criteria:**
- Given a user on their profile, when they edit name, email, etc., then changes are saved
- Given a user, when they enter invalid data, then validation errors show

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-94 | Build `student/profile.blade.php` + `student/profile-edit.blade.php` | FE-2 | 2 |
| T-95 | Build `teacher/profile.blade.php` + edit form | FE-2 | 1 |
| T-96 | Write profile update tests | QA-2 | 1 |

---

### US-20: Testing & Security (Must, 8 pts)

**As a** user, **I want to** the system to be tested and secure, **so that** my data is safe.

**Acceptance Criteria:**
- All critical paths have automated tests
- All forms have CSRF protection
- All user input is escaped in Blade
- All admin routes have role middleware
- File uploads validate type and size
- Lighthouse score 90+ on mobile

**Tasks:**

| ID | Task | Owner | Points |
|----|------|-------|--------|
| T-97 | Security audit: verify middleware on all routes, XSS escaping, CSRF tokens | BE-2 | 2 |
| T-98 | Set up production env config, queue worker (supervisor), backup | BE-2 | 3 |
| T-99 | Add Alpine.js Chart.js for report charts | FE-2 | 2 |
| T-100 | UI polish: loading states, transitions, spacing, responsive fixes | FE-2 | 2 |
| T-101 | Performance: lazy load images, cache views, minify assets | FE-2 | 1 |
| T-102 | Full regression test (all modules) | QA-1 | 3 |
| T-103 | Performance test (page load times) + Lighthouse audit | QA-1 | 1 |
| T-104 | Security tests: SQL injection, XSS, CSRF, file upload bypass | QA-1 | 2 |
| T-105 | UAT sessions with school staff (admin, teacher, student flows) | QA-2 | 3 |
| T-106 | Acceptance criteria sign-off matrix | QA-2 | 2 |
| T-107 | Cross-browser + responsive final check | QA-2 | 1 |
| T-108 | Production deployment + QA sign-off report | QA-2 | 1 |

**Sprint 4 Totals**: 6 user stories → 28 sub-tasks, 29 story points.

---

## Backlog Summary

| Sprint | User Stories | Sub-tasks | Story Points |
|--------|-------------|-----------|-------------|
| 1 — Auth, RBAC, Dashboard, Users | 4 | 31 | 21 |
| 2 — Student, Teacher, Schedule, Attendance | 4 | 23 | 26 |
| 3 — Grades, Assignments, Announcements, Notifications | 6 | 26 | 31 |
| 4 — Reports, Profile, Testing, Deployment | 6 | 28 | 29 |
| **Total** | **20** | **108** | **107** |
