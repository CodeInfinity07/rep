# BETGURU - Sports Trading Platform

## Overview
BETGURU is a sports betting and trading platform that provides interfaces for various sports including cricket, soccer, tennis, horse racing, and greyhound racing. Originally a static HTML/CSS/JavaScript application, it has been converted to a Laravel-based project.

## Project Structure
- **Framework**: Laravel 12.x (PHP 8.2)
- **Views**: 
  - `/resources/views/layouts/management.blade.php` - Shared layout for management section
  - `/resources/views/management/` - Management dashboard and admin pages
  - `/resources/views/bettor/` - Bettor-facing pages
  - `/resources/views/` - Other sport and feature pages
- **Public Assets**: CSS, JavaScript, images, and fonts in `/public` directory
- **Routes**: Web routes defined in `/routes/web.php`
- **Database**: SQLite (development)

### Available Pages
**Management Section** (uses shared layout):
- Dashboard (/) - Management index with user search and sport highlights
- Users, Reports, Position, Lock
- Star Casino, World Casino, BetFair Games

**Bettor Section**:
- Bettor Dashboard (/bettor) - User betting interface

**Sports Pages**:
- Cricket, Soccer, Tennis (sports betting pages)
- Horse Racing, Greyhound Racing
- Match details, History, Ledger, Results
- Login and authentication pages

## Recent Changes
- **2025-11-20**: Complete management section conversion
  - Created shared layout (`layouts/management.blade.php`) for all management pages
  - Converted all 6 management pages to extend shared layout (index, users, report, position, lock, star)
  - Organized views into `/bettor` and `/management` folders
  - Replaced Vue.js variables (v-model, v-for, v-if, v-show) with static dummy data in management index
  - Updated routes to point to `management.*` views
  - Removed duplicate HTML structure and legacy blade files
  - All management pages now use consistent layout pattern with `@extends` and `@section`

- **2025-11-20**: Converted to Laravel project
  - Installed PHP 8.2 with Composer
  - Created Laravel 12 project structure
  - Migrated static HTML files to Blade templates
  - Moved CSS, JS, images to `/public` directory
  - Set up routes for all pages
  - Configured Laravel to run on 0.0.0.0:5000
  - Enabled proxy trust for Replit environment
  - Configured deployment for autoscale

## Tech Stack
- **Backend**: Laravel 12.x, PHP 8.2
- **Frontend**: HTML, CSS, JavaScript, Vue.js
- **Database**: SQLite (development)
- **External APIs**: Prices and orders from mgs11.com
- **Server**: Laravel Artisan development server

## Architecture
Laravel MVC application serving blade templates with static assets. The application connects to external APIs for live betting/trading functionality.

**Layout Structure**:
- Management section uses a shared Blade layout (`layouts/management.blade.php`)
- Layout includes header with navigation, sidebar with sports menu, and main content area
- Views extend the layout using `@extends` and populate content with `@section`
- Bettor section currently standalone, can be migrated to use layouts in future

Each route returns a blade view with all necessary assets served from the public directory.

## Development
- Server runs on port 5000 via Laravel Artisan
- Host: 0.0.0.0 (configured for Replit's proxy environment)
- Proxy trust: Enabled for all proxies (Replit requirement)
- Workflow: `php artisan serve --host=0.0.0.0 --port=5000`

## Deployment
- Target: Autoscale
- Command: `php artisan serve --host=0.0.0.0 --port=8080`
- Environment: Production-ready Laravel configuration
