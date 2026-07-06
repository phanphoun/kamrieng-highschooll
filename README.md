# EduBridge Cambodia

A comprehensive, bilingual (Khmer/English) school management and communications platform for Cambodian high schools — combining a premium public website with a full admin CMS.

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 12 (PHP 8.2+) |
| Frontend | Laravel Blade + Tailwind CSS v4 + Alpine.js |
| Database | MySQL / SQLite |
| Build | Vite 7 |
| Auth | Laravel built-in + role-based middleware |
| i18n | Bilingual (Khmer / English) |

## Modules

### Public Website
| Module | Route | Issue |
|--------|-------|-------|
| Home | `/` | [#176](https://github.com/phanphoun/kamrieng-highschooll/issues/176) |
| About | `/about` | [#177](https://github.com/phanphoun/kamrieng-highschooll/issues/177) |
| News | `/news` | [#183](https://github.com/phanphoun/kamrieng-highschooll/issues/183) |
| Gallery | `/gallery` | [#185](https://github.com/phanphoun/kamrieng-highschooll/issues/185) |
| Events | `/calendar` | [#187](https://github.com/phanphoun/kamrieng-highschooll/issues/187) |
| Activities | `/activities` | [#188](https://github.com/phanphoun/kamrieng-highschooll/issues/188) |
| Achievements | `/achievements` | [#189](https://github.com/phanphoun/kamrieng-highschooll/issues/189) |
| Faculty | `/faculty` | [#190](https://github.com/phanphoun/kamrieng-highschooll/issues/190) |
| Leadership | `/leadership` | [#191](https://github.com/phanphoun/kamrieng-highschooll/issues/191) |
| Downloads | `/downloads` | [#192](https://github.com/phanphoun/kamrieng-highschooll/issues/192) |
| Enrollment | `/enrollment` | [#194](https://github.com/phanphoun/kamrieng-highschooll/issues/194) |
| Notices | `/notices` | [#193](https://github.com/phanphoun/kamrieng-highschooll/issues/193) |
| Donate | `/donate` | [#200](https://github.com/phanphoun/kamrieng-highschooll/issues/200) |
| Contact | `/contact` | [#178](https://github.com/phanphoun/kamrieng-highschooll/issues/178) |
| Search | `/search` | [#179](https://github.com/phanphoun/kamrieng-highschooll/issues/179) |
| Site Map | `/sitemap` | [#180](https://github.com/phanphoun/kamrieng-highschooll/issues/180) |

### Admin Panel
| Module | Issue |
|--------|-------|
| Dashboard | [#176](https://github.com/phanphoun/kamrieng-highschooll/issues/176) |
| Statistics | [#198](https://github.com/phanphoun/kamrieng-highschooll/issues/198) |
| Users | [#174](https://github.com/phanphoun/kamrieng-highschooll/issues/174) |
| News | [#184](https://github.com/phanphoun/kamrieng-highschooll/issues/184) |
| Gallery | [#186](https://github.com/phanphoun/kamrieng-highschooll/issues/186) |
| Events | [#187](https://github.com/phanphoun/kamrieng-highschooll/issues/187) |
| Activities | [#188](https://github.com/phanphoun/kamrieng-highschooll/issues/188) |
| Achievements | [#189](https://github.com/phanphoun/kamrieng-highschooll/issues/189) |
| Faculty | [#190](https://github.com/phanphoun/kamrieng-highschooll/issues/190) |
| Leadership | [#191](https://github.com/phanphoun/kamrieng-highschooll/issues/191) |
| Downloads | [#192](https://github.com/phanphoun/kamrieng-highschooll/issues/192) |
| Enrollments | [#194](https://github.com/phanphoun/kamrieng-highschooll/issues/194) |
| Notices | [#193](https://github.com/phanphoun/kamrieng-highschooll/issues/193) |
| Messages | [#195](https://github.com/phanphoun/kamrieng-highschooll/issues/195) |
| Hero Slides | [#181](https://github.com/phanphoun/kamrieng-highschooll/issues/181) |
| Pages | [#177](https://github.com/phanphoun/kamrieng-highschooll/issues/177) |
| Settings | [#196](https://github.com/phanphoun/kamrieng-highschooll/issues/196) |
| Audit Logs | [#197](https://github.com/phanphoun/kamrieng-highschooll/issues/197) |

## Sprint Plan

| Sprint | Issues | Points | Focus |
|--------|--------|--------|-------|
| 1 | 9 | 26 | Auth, RBAC, Public Pages, Foundation |
| 2 | 7 | 28 | News, Gallery, Events, Activities, Achievements |
| 3 | 5 | 27 | Faculty, Leadership, Downloads, Notices, Enrollment |
| 4 | 7 | 24 | Messages, Settings, Audit, Stats, i18n, Donate, Deploy |

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
- [Wiki](https://github.com/phanphoun/kamrieng-highschooll/wiki)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
