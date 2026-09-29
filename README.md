# Terabyte ISP — Laravel 13 Starter / Phase 1

Original Laravel + PHP + MySQL implementation inspired by the public information architecture of an ISP website.
This project is not a copy of the target site's proprietary source code.

## Stack
- Laravel 13
- PHP 8.3+
- MySQL 8+
- Blade
- Bootstrap 5
- Vite

Laravel 13 is the current major release as of September 2026.

## Install

1. Create a fresh Laravel 13 project:
   composer create-project laravel/laravel terabyte-isp "^13.0"

2. Copy the contents of this package into that Laravel project, replacing files where applicable.

3. Configure `.env`:
   DB_DATABASE=terabyte_isp
   DB_USERNAME=root
   DB_PASSWORD=

4. Run:
   php artisan migrate --seed
   php artisan storage:link
   npm install
   npm run build
   php artisan serve

## Admin
URL: /admin/login
Default:
Email: admin@terabyte.test
Password: password

Change the password immediately in a real deployment.

## Included in Phase 1
- Public home
- Packages
- Order form
- About
- Contact
- Admin login
- Dashboard
- Package CRUD
- Orders listing/status
- Customers listing
- Settings
- Testimonials
- abouts
- MySQL migrations + seed data
- WhatsApp order link
- Responsive original Blade UI
