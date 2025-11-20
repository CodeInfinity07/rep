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
- **Database**: MySQL (bguru69 on remote server 94.72.106.77)
- **Authentication**: Custom Laravel session-based auth with role hierarchy
- **Middleware**: RoleMiddleware for access control, auth middleware for protected routes

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
- **2025-11-20**: Cash/Credit Management System
  - Added financial database fields: credit_received, credit_remaining, balance, cash
  - Created cash-credit.blade.php with two tabs (Cash and Credit) for deposit/withdraw operations
  - Implemented CashCreditController with transaction processing:
    * Cash deposit: adds to cash and balance
    * Cash withdraw: subtracts from cash and balance (validates available cash)
    * Credit give: adds to user's credit_received/credit_remaining, subtracts from parent's credit_remaining
    * Credit take back: reverses credit allocation back to parent
  - Balance field only reflects cash, not credit
  - Owner has unlimited credit (no validation on available credit when giving)
  - Non-owner users can only give credit up to their credit_remaining amount
  - Updated users table to display credit_received and balance values
  - C button in users table opens cash/credit page in a popup window (900x700px)
  - All transactions wrapped in database transactions for data integrity
  - Security: Blocks self-targeted cash/credit operations to prevent unlimited balance exploit
  - Owner account initialized with 1,000,000 credit for testing

- **2025-11-20**: Username-Only Authentication & Share Distribution System
  - Removed email field entirely - authentication now uses username-only login
  - Implemented hierarchical share distribution:
    * Owner starts with 100% share
    * Bettor accounts automatically inherit parent's full share (no manual input needed)
    * Non-bettor accounts (Admin/SuperMaster/Master) must have share LESS than parent's share
  - Created hierarchical users page with drill-down navigation
    * Shows downline users in table format
    * Non-bettor usernames are clickable to view their downlines
    * Bettor usernames are non-clickable (end of hierarchy)
    * Back button to navigate up the hierarchy
  - Login credentials: username=owner, password=password123 (100% share)
  - User fields: username, password, type, parent_id, downline_share, is_active, phone, reference, notes
  - Credit balance and financial data set to 0 (to be implemented later)

- **2025-11-20**: Authentication System Implementation
  - Implemented custom Laravel authentication with session-based login/logout
  - Created AuthController with username-only login and remember me functionality
  - Built RoleMiddleware for hierarchical access control
  - Protected all management routes with auth middleware (/, /users, /position, /report, /lock, /star)
  - Updated login page (resources/views/login.blade.php) with CSRF protection and error/success display
  - Session management with CSRF tokens and remember me cookies
  - Redirects unauthenticated users to /login with flash messages

- **2025-11-20**: Role-Based User Management System
  - Created comprehensive User model with role hierarchy support
  - Implemented UserController with user creation logic and hierarchy validation
  - Role hierarchy: Owner → Admin/Bettor | Admin → SuperMaster/Bettor | SuperMaster → Master/Bettor | Master → Bettor
  - Created owner account seeder (username=owner, 100% share)
  - Dynamic create-user form that shows only allowed child types based on logged-in user's role
  - Password security (type="password"), and dynamic Downline Share visibility (hidden for bettor)
  - JavaScript validation ensures password has min 8 chars with letters and numbers
  - Backend validation enforces: unique username, role hierarchy, downline share rules
  - Form integrates with backend via POST /users/create with CSRF protection
  - Success/error messages with form repopulation on validation failures

- **2025-11-20**: MySQL Database Migration
  - Migrated from SQLite to MySQL (bguru69 on remote server 94.72.106.77)
  - Configured database credentials via Replit Secrets (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
  - Updated start-server.sh to inject database configuration from environment variables
  - Ran Laravel migrations to create necessary tables (users, cache, jobs, migrations)
  - Switched cache driver to file-based storage for improved performance

- **2025-11-20**: Live Sports Data Integration
  - Integrated ScoreSwift API (http://89.116.20.218:8085/api/home) for live match data
  - Created SportsDataController using API's sport category names for accurate categorization
  - Fixed categorization logic to use API's 'name' field instead of unreliable keyword matching
  - Implemented 30-second caching to optimize API calls
  - Added /api/sports-data endpoint serving categorized live data
  - Updated management dashboard to display live match data with auto-refresh every 30 seconds
  - Shows match names, in-play status indicators, and total matched amounts
  - Configured start-server.sh wrapper to inject SCORESWIFT_API_KEY from Replit secrets
  - Correctly categorizes Cricket, Soccer, Tennis (plus Rugby Union and Boxing available in API)

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
- **Database**: MySQL (bguru69 on remote server 94.72.106.77)
- **External APIs**: 
  - Live sports data from ScoreSwift API (http://89.116.20.218:8085/api/home)
  - Prices and orders from mgs11.com
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
- Login: username=owner, password=password123 (owner account with 100% share)

## User Management
- **Role Hierarchy**: Owner → Admin/Bettor | Admin → SuperMaster/Bettor | SuperMaster → Master/Bettor | Master → Bettor only
- **User Creation**: Each role can only create their permitted child types
- **Share Distribution**:
  * Owner has 100% share to start
  * Bettor accounts automatically inherit parent's full share (no input required)
  * Non-bettor accounts must have share LESS than parent's share
- **Hierarchical View**: 
  * Click non-bettor usernames to drill down into their downlines
  * Bettor accounts are non-clickable (end nodes)
  * Navigate back up hierarchy with back button
- **Password Requirements**: Minimum 8 characters with both letters and numbers
- **Owner Account**: username=owner, password=password123, share=100%

## Deployment
- Target: Autoscale
- Command: `php artisan serve --host=0.0.0.0 --port=8080`
- Environment: Production-ready Laravel configuration
