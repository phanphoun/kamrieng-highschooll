# Team Contribution Guide (Agile)

## Agile Workflow

We follow **Scrum** with 1-week sprints.

### Roles

| Role | Person | Responsibility |
|------|--------|---------------|
| **Scrum Master** | SM | Facilitate ceremonies, remove blockers, protect the team |
| **Product Owner** | Stakeholder / SM proxy | Prioritize backlog, define acceptance criteria |
| **Backend Developers** | BE-1, BE-2 | Controllers, models, migrations, business logic, database |
| **Frontend Developers** | FE-1, FE-2 | Blade views, Tailwind CSS, Alpine.js, responsive design |
| **QA Engineers** | QA-1, QA-2 | Test automation, manual testing, UAT support |

---

## Ceremonies

### Sprint Planning (Mon 10:00, 1hr)

- Product Owner presents top-priority user stories from the backlog
- Team estimates story points (planning poker)
- Team commits to stories for the sprint
- Stories broken into tasks and assigned

### Daily Standup (Mon–Thu 9:00, 15min)

Each person answers:
1. What did I complete yesterday?
2. What will I work on today?
3. Any blockers?

Keep it brief. Blockers are handled offline after standup.

### Backlog Grooming (Thu 14:00, 30min)

- SM + BE/FE leads review and refine the product backlog
- Add new user stories, re-prioritize, split large stories
- Ensure next sprint's stories have clear acceptance criteria

### Sprint Review (Fri 14:00, 1hr)

- Demo working software to stakeholders
- Show what was completed (not what wasn't)
- Gather feedback for the backlog

### Sprint Retrospective (Fri 15:30, 45min)

The team discusses:
- **What went well** — keep doing
- **What could improve** — try next sprint
- **Action items** — specific, measurable changes

---

## User Story Format

All work is expressed as user stories:

```
**As a** <role>, **I want to** <feature>, **so that** <benefit>.

Acceptance Criteria (Given/When/Then):
- Given <precondition>, when <action>, then <expected result>
```

### Examples

```
As an admin, I want to manage student records, so that I can track student enrollment.

AC: Given an admin on the students page, when they create a new student,
     then the student is added with role=student and appears in the list.
```

```
As a teacher, I want to record attendance, so that I can track student participation.

AC: Given a teacher on the attendance page, when they mark students present/absent
     and save, then attendance is recorded and visible to the student.
```

---

## Estimation — Story Points

We use **Fibonacci sequence** (1, 2, 3, 5, 8, 13) for story points.

| Points | Meaning | Example |
|--------|---------|---------|
| 1 | Trivial — known solution, <2hr | Fix a typo, add a validation rule |
| 2 | Small — well-understood, half day | Add a Blade view for an existing controller |
| 3 | Medium — clear but some effort | New controller + 2-3 views |
| 5 | Large — multiple files, coordination | Full CRUD for a new entity |
| 8 | Very large — cross-cutting concern | Reports module with charts |
| 13 | Epic — must be split | Entire grade management system |

**Team velocity target**: 30–35 points per sprint.

### Planning Poker Guidelines

- Each team member privately estimates
- Reveal simultaneously
- Largest and smallest estimators explain reasoning
- Discuss, then re-estimate until consensus
- If split between two values (e.g., 3 and 5), pick the higher one

---

## Git & GitHub Workflow

### Branch Strategy

```
main         — Production-ready (protected, only from release/*)
develop      — Integration branch (protected)
feature/*    — New features (branch from develop)
fix/*        — Bug fixes (branch from develop)
hotfix/*     — Urgent production fixes (branch from main)
release/*    — Release prep (branch from develop, merge to main + develop)
```

### Branch Naming

```
feature/<module>-<short-description>
fix/<module>-<short-description>
hotfix/<description>
release/v<major>.<minor>.<patch>
```

Examples:
- `feature/auth-login-view`
- `feature/student-crud`
- `fix/grade-calculation`
- `hotfix/login-redirect`
- `release/v1.0.0`

---

## Commit Convention

```
<type>(<scope>): <subject>
```

**Types**: `feat`, `fix`, `docs`, `style`, `refactor`, `perf`, `test`, `chore`, `ci`

**Scopes**: `auth`, `user`, `student`, `teacher`, `class`, `subject`, `schedule`, `attendance`, `grade`, `assignment`, `submission`, `announcement`, `notification`, `report`, `profile`, `migration`, `middleware`, `config`, `ui`, `layout`, `email`

**Subject Rules**: Present tense, imperative, no period, max 72 chars.

Examples:
```
feat(auth): add login Blade view with validation errors
fix(grade): resolve score rounding precision error
feat(attendance): add bulk attendance entry with Alpine.js
test(student): add feature tests for student CRUD
chore(deps): upgrade Tailwind CSS to v4.1
feat(layout): add admin sidebar with collapsible menu
```

---

## Pull Request Process

### Before Creating a PR

1. `git rebase develop` — keep history linear
2. `php artisan test` — all tests pass
3. `./vendor/bin/pint` — Laravel Pint passes
4. No `dd()` / `dump()` / `console.log()` left in code

### PR Template

```markdown
## Description
What does this PR do?

## Related User Story
Closes US-XX

## Type
- [ ] feat
- [ ] fix
- [ ] refactor
- [ ] test
- [ ] chore

## Testing
- [ ] Unit tests added/updated
- [ ] Feature tests added/updated
- [ ] Manual tested on mobile/tablet/desktop

## Acceptance Criteria
- [ ] AC 1 met
- [ ] AC 2 met
- [ ] AC 3 met
- [ ] Role-based access verified
```

### Review Rules

- **At least 1 approval** required before merge
- Reviewer checks: correctness, tests, security (XSS/SQLi/CSRF), performance (N+1), role middleware
- **No self-merging**
- Use **Squash & Merge** for feature/fix branches
- Delete source branch after merge

---

## Code Review Guidelines

### What to Check

1. **Functionality** — Does it meet acceptance criteria?
2. **Blade conventions** — `@extends`, `@section`, `@include`, `<x->` components used correctly?
3. **Security** — All output escaped `{{ }}`, `@csrf` on all forms, Eloquent not raw SQL
4. **Role access** — Routes protected with correct middleware?
5. **Responsive** — Tailwind classes handle mobile/tablet/desktop?
6. **Alpine.js** — Logic in `x-data`/`x-init`, not jQuery?
7. **Performance** — N+1 queries? Missing `->with()`?
8. **Tests** — Adequate coverage?

### Review Comments

```
File.php:42 - Use ->with('relation') to avoid N+1 query.
view.blade.php:15 - Use @lang('file.key') instead of hardcoded string.
```

Be constructive. Ask questions: "What do you think about...?"

---

## Development Setup

```bash
git clone <repo-url>
cd kamrieng-highschooll

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link

npm install
npm run dev     # Terminal 1: Vite hot-reload
php artisan serve  # Terminal 2: Laravel server (http://localhost:8000)
```

### Environment Variables

| Variable | Default | Notes |
|----------|---------|-------|
| `DB_CONNECTION` | `sqlite` | Use `mysql` for production |
| `MAIL_MAILER` | `log` | Use `smtp` for production |
| `APP_ENV` | `local` | Set to `production` for live |
| `APP_DEBUG` | `true` | Set to `false` for production |

Never commit `.env`.

---

## Testing

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter=StudentTest

# Run with coverage
php artisan test --coverage  # requires Xdebug
```

### Minimum Coverage

| Layer | Target |
|-------|--------|
| Controllers | 80% |
| Models | 90% |
| Form Requests | 100% |
| Middleware | 90% |

---

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/         — Admin panel controllers
│   │   ├── Teacher/       — Teacher dashboard controllers
│   │   ├── Student/       — Student dashboard controllers
│   │   ├── Parent/        — Parent dashboard controllers (future)
│   │   └── Auth/          — Authentication controllers
│   ├── Middleware/         — Role-based & request middleware
│   └── Requests/          — Form request validation classes
├── Models/                 — Eloquent models
└── Services/               — Business logic service classes

database/
├── migrations/             — Versioned schema migrations
└── seeders/                — Database seeders

resources/
├── views/
│   ├── layouts/            — Base Blade layouts
│   ├── components/         — Reusable Blade components (x-*)
│   ├── admin/              — Admin panel views
│   ├── teacher/            — Teacher dashboard views
│   ├── student/            — Student dashboard views
│   ├── parent/             — Parent dashboard views (future)
│   ├── auth/               — Login/register views
│   └── emails/             — Email templates
├── css/
│   └── app.css             — Tailwind CSS v4 entry point
├── js/
│   └── app.js              — Alpine.js + Axios entry

routes/
├── web.php                 — All web routes
└── auth.php                — Auth routes (included by web.php)

docs/                       — Project documentation
tests/
├── Unit/                   — Unit tests
└── Feature/                — Feature/integration tests
```

### Blade Conventions

- `@extends('layouts.admin')` for admin, `layouts.teacher` for teacher, etc.
- `@section('content')` / `@endsection` for page content
- `<x-component-name>` for shared components
- Keep views under 200 lines; extract repeated HTML into components
- Alpine.js `x-data`, `x-bind`, `x-on` for interactivity — no jQuery

---

## Definition of Ready

A user story is ready for a sprint when:
- [ ] Acceptance criteria defined in Given/When/Then format
- [ ] Estimated in story points
- [ ] Dependencies identified and resolved
- [ ] UI mockup exists (if user-facing)
- [ ] QA test cases drafted

## Definition of Done

A user story is done when:
- [ ] Code reviewed and merged to `develop`
- [ ] All acceptance criteria pass
- [ ] Tests written and passing
- [ ] Role-based access verified (middleware on routes)
- [ ] Responsive on mobile, tablet, desktop
- [ ] No critical or high-severity defects open
- [ ] QA verified (manual test or automated)

---

## Communication

### Daily Standup (9:00 AM)

3 questions. Keep it under 15 minutes.

### Channels

- `#khs-dev` — development discussion
- `#khs-standup` — daily standup notes
- `#khs-qa` — bug reports and test results
- `#khs-deploy` — deployment announcements

### Issue Labels

| Label | Meaning |
|-------|---------|
| `bug` | Something isn't working |
| `enhancement` | New feature or request |
| `priority-critical` | Must fix immediately |
| `priority-high` | Must fix this sprint |
| `priority-medium` | Should fix this sprint |
| `priority-low` | Nice to have |
| `good-first-issue` | Good for newcomers |

---

## Security Guidelines

- **Never commit secrets**: API keys, passwords, tokens in `.env` only
- **Never commit large files**: Uploaded media goes to `storage/app/`, not git
- **Never expose `APP_KEY`** or database credentials
- Use Eloquent ORM — no raw SQL (`DB::raw` only when unavoidable)
- All Blade output uses `{{ }}` — never `{!! !!}` with user content
- All forms must include `@csrf`
- All admin routes must use role middleware (`admin`, `teacher`, etc.)
- Validate file uploads server-side (type, size, content magic bytes)
- HTTPS only in production
