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

## Auth Endpoints

### Guest routes

| Method | URL | Description |
|--------|-----|-------------|
| GET | `/login` | Login form |
| POST | `/login` | Validate credentials → role-based dashboard redirect |
| GET | `/register` | Registration form (Admin / Content Editor roles) |
| POST | `/register` | Create account → redirect to login |
| GET | `/forgot-password` | Request a password reset code |
| POST | `/forgot-password` | Email a 6-digit reset code (throttled) |
| GET | `/reset-password` | Step 1 — enter the reset code |
| POST | `/reset-password/verify` | Verify the code (throttled 6/min) |
| GET | `/reset-password/new` | Step 2 — new password form (requires verified code) |
| POST | `/reset-password` | Save the new password → redirect to login |

### Authenticated routes

| Method | URL | Description |
|--------|-----|-------------|
| POST | `/logout` | End the session |
| GET | `/dashboard`, `/admin/dashboard`, `/teacher/dashboard`, `/student/dashboard`, `/parent/dashboard`, `/editor/dashboard` | Role dashboards (placeholders until US-03/T-11) |

## Email Configuration (Password Reset Codes)

Forgot-password emails the user a **6-digit reset code**, verified in a two-step flow:
enter code → set new password. Codes are stored hashed, are single-use, expire after
60 minutes, and requests are rate-limited.

### Development (default — no setup needed)

```env
MAIL_MAILER=log
```

Emails are not really sent; the reset code appears at the bottom of `storage/logs/laravel.log`.

### Sending real email (Gmail SMTP)

1. Enable **2-Step Verification** on the Google account that will send mail
2. Create an **App Password**: https://myaccount.google.com/apppasswords
3. Update your local `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-address@gmail.com
MAIL_PASSWORD=your-16-char-app-password
MAIL_FROM_ADDRESS="your-address@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
```

4. Apply it: `php artisan config:clear`

The configured account is only the **sender** — reset codes are delivered to each user's own
registered email address, on any provider.

> ⚠️ Never commit `.env` or the app password. `.env.example` stays on `MAIL_MAILER=log`.

## Documentation

- [Sprint Plan](docs/sprint.md)
- [Task Breakdown](docs/tasks.md)
- [Project Roadmap](docs/roadmap.md)
- [Team Contribution Guide](docs/team-contribute.md)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
