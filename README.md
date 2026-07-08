# EduKhmer High School

A comprehensive, bilingual (Khmer/English) school management and communications platform for Cambodian high schools — combining a premium public website with a full admin CMS.

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 11 (PHP 8.2+) |
| Frontend | Blade + Tailwind CSS v3 + Alpine.js |
| Database | MySQL |
| Build | Vite 5 |
| Auth | Laravel Breeze + Spatie Permissions |
| i18n | Bilingual (Khmer / English) |

## Features

### Public Website
- Home page with hero slides and statistics
- News articles with categories and featured posts
- Activities and events calendar
- Photo gallery with albums
- Achievements showcase
- Faculty/Leadership directory
- Downloadable resources
- Online enrollment application with tracking
- Contact form
- Full-text search
- Bilingual EN/KH support

### Admin CMS
- Dashboard with analytics
- News management (CRUD)
- Activity management
- Achievement management
- Gallery management with image uploads
- Event calendar management
- Notice board management
- Download management
- Hero slide management
- Leadership profile management
- Static page management
- Enrollment application review workflow
- Contact message inbox with reply
- User management with roles (Admin, Editor, Viewer)
- Site settings configuration
- Audit logs

## Quick Start

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & npm
- MySQL

### Installation

```bash
# 1. Clone the repository
git clone <repo-url>
cd edukhmer

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Environment setup
cp .env.example .env
php artisan key:generate

# 5. Configure your database in .env
# DB_DATABASE=edukhmer
# DB_USERNAME=root
# DB_PASSWORD=

# 6. Run migrations and seeders
php artisan migrate --seed

# 7. Create storage link
php artisan storage:link

# 8. Start development servers
php artisan serve
npm run dev
```

### Default Credentials
- **Admin**: admin@edukhmer.edu.kh / password
- **Editor**: editor@edukhmer.edu.kh / password

## Project Structure

```
edukhmer/
├── app/
│   ├── Http/Controllers/    # Public, Auth, and Admin controllers
│   ├── Http/Middleware/      # Admin, Audit Log, Locale middleware
│   ├── Models/              # 19 Eloquent models
│   ├── Policies/            # Authorization policies
│   ├── Services/            # Business logic services
│   ├── Notifications/       # Email notifications
│   └── Jobs/                # Queue jobs
├── database/
│   ├── migrations/          # 22 migration files
│   ├── seeders/             # 15 seeder classes
│   └── factories/           # Model factories
├── lang/
│   ├── en/                  # English translations
│   └── kh/                  # Khmer translations
├── resources/
│   ├── views/               # Blade templates
│   ├── css/                 # Tailwind CSS
│   └── js/                  # Alpine.js + Chart.js
├── routes/
│   ├── web.php              # Web routes
│   ├── api.php              # API routes
│   └── console.php          # Schedule tasks
└── tests/                   # Pest tests
```

## License

This project is open-sourced software licensed under the MIT license.
