# វិទ្យាល័យកំរៀង — Kamrieng High School Management System

School management system built with Laravel 12 + Blade + Tailwind CSS v4 + Alpine.js.

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 12 (PHP 8.2+) |
| Frontend | Laravel Blade + Tailwind CSS v4 + Alpine.js |
| Database | MySQL / SQLite |
| Build | Vite 7 |
| Auth | Laravel built-in + role-based middleware |

## Features

| Module | Roles |
|--------|-------|
| Authentication & RBAC | Admin, Teacher, Student, Parent |
| Dashboard | Role-specific KPI dashboards |
| User Management | Admin CRUD for all users |
| Student Management | Enroll, update, view profiles |
| Teacher Management | Assign subjects, manage profiles |
| Class Management | Create classes, assign teachers, enroll students |
| Schedule | Weekly timetable for students and teachers |
| Attendance | Daily attendance tracking with bulk entry |
| Grades | Score entry, grade letters, performance view |
| Assignments | Create, submit, grade with file upload |
| Announcements | Targeted announcements by audience |
| Notifications | Auto-generated on grades, announcements |
| Reports | Student/class performance, attendance summary |
| Profile | Self-service profile editing |

## Sprint Plan

| Sprint | Duration | Focus |
|--------|----------|-------|
| 1 | Week 1 | Authentication, Role Permission, Dashboard, User Management |
| 2 | Week 2 | Student, Teacher, Schedule, Attendance |
| 3 | Week 3 | Grades, Assignments, Announcements, Notifications |
| 4 | Week 4 | Reports, Profile, Testing, Deployment |

## Quick Start

```bash
git clone <repo-url>
cd kamrieng-highschooll

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link

npm install
npm run build
php artisan serve
```

Default login: `admin@example.com` / `password`

## Documentation

- [Sprint Plan](docs/sprint.md)
- [Task Breakdown](docs/tasks.md)
- [Project Roadmap](docs/roadmap.md)
- [Team Contribution Guide](docs/team-contribute.md)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
