# BETGURU - Sports Trading Platform

## Overview
BETGURU is a sports betting and trading platform that facilitates trading on various sports including cricket, soccer, tennis, horse racing, and greyhound racing. The platform provides a comprehensive interface for users to engage in sports betting, offering features like real-time odds, detailed match information, and financial management tools. Originally a static application, it has been re-engineered as a robust Laravel-based system. The business vision is to provide a reliable, feature-rich, and user-friendly platform for sports trading with a clear hierarchical user management system and real-time data integration.

## User Preferences
I prefer simple language and detailed explanations when new concepts or changes are introduced. I want iterative development, with clear communication before major changes are implemented. Please do not make changes to the `public/assets` folder unless specifically instructed. Ensure all financial calculations are precise and thoroughly tested.

## System Architecture
BETGURU is a Laravel 12.x MVC application utilizing PHP 8.2.

**UI/UX Decisions:**
- **Consistent Layouts:** A shared Blade layout (`resources/views/layouts/management.blade.php`) ensures a consistent look and feel across all management pages, including a header with navigation and a sidebar for sports menus.
- **Dynamic Content:** Dashboards and sports pages dynamically display real-time data, user-specific information (e.g., username, balance), and betting odds.
- **Interactive Elements:** Features like AJAX polling for odds updates, date pickers for ledger filtering, and interactive user hierarchy views enhance user experience.
- **Color Coding:** Market cards are color-coded (primary for Match Odds, success for Bookmaker, danger for Fancy markets) for easy identification.

**Technical Implementations:**
- **Authentication:** Custom, session-based authentication using usernames only, with a `RoleMiddleware` for hierarchical access control.
- **User Management:** A robust role-based user management system with a defined hierarchy (Owner → Admin/Bettor | Admin → SuperMaster/Bettor | SuperMaster → Master/Bettor | Master → Bettor). Share distribution is managed hierarchically.
- **Financial Management:** `ledger_entries` table tracks all financial transactions (cash deposit/withdraw, credit given/taken back), with comprehensive ledger views, date range filtering, and export options.
- **Betting System:** A `bets` table meticulously tracks all betting activities, including bet type, odds, stake, liability, profit, and status (pending, matched, cancelled, settled). Real-time calculation and display of user balances, liabilities, and active bets.
- **Sports Data Integration:** A `MatchController` orchestrates multiple API calls to fetch detailed market information, odds, and event IDs, handling various API response structures.
- **Odds Display:** Displays back/lay odds in a 6-column format (B3, B2, B1 | L1, L2, L3) with highlighting for best prices and status indicators for suspended runners.
- **Backend Validation:** Extensive backend validation for user creation, share distribution, and financial transactions ensures data integrity and security.
- **Database Transactions:** All critical financial operations are wrapped in database transactions to prevent data inconsistencies.

**Feature Specifications:**
- **Dynamic Dashboards:** Root route `/` dynamically serves either the bettor dashboard or management dashboard based on the user's role.
- **Comprehensive Sports Pages:** Dedicated pages for various sports (Cricket, Soccer, Tennis, Horse Racing, Greyhound Racing) featuring real-time odds, match details, history, ledger, and results.
- **Cash/Credit Management:** Dedicated interface for managing cash deposits/withdrawals and credit allocation/retrieval among hierarchical users.
- **Account Ledger:** Detailed ledger system tracking all financial activities with filtering, printing, and export capabilities.
- **Live Sports Data:** Integration with an external API to display live match data, including in-play status and matched amounts, with a 30-second caching mechanism.

**System Design Choices:**
- **Laravel MVC:** Follows the Model-View-Controller pattern for clear separation of concerns.
- **Blade Templating:** Utilizes Blade for efficient and organized frontend templating.
- **MySQL Database:** Primary database for robust data storage and retrieval.
- **Environment Configuration:** Uses Replit Secrets for secure management of sensitive environment variables.
- **Deployment:** Configured for autoscale deployment, running on Laravel Artisan development server for development and production-ready configuration for deployment.

## External Dependencies
- **Database:** MySQL (bguru69 on remote server 94.72.106.77)
- **Live Sports Data API:** ScoreSwift API (http://89.116.20.218:8085/api/home) for live match data, and /api/inplay for inplay matches.
- **Betting Prices and Orders API:** mgs11.com for prices and order management.

## Recent Updates (November 21, 2025)

### Role-Based Sport Pages and Access Control (November 21, 2025)
- **Separate Bettor and Management Views**: Sport pages now serve different views based on user role
  * Bettors see dedicated bettor sport pages (resources/views/bettor/cricket.blade.php, soccer.blade.php, tennis.blade.php)
  * Management users see management sport pages (resources/views/sports/)
  * SportsPageController checks user role and serves appropriate view
- **Bettor Layout**: Created dedicated bettor layout (resources/views/layouts/bettor.blade.php)
  * Includes sidebar with dynamic sports menus
  * Header with user info and logout dropdown
  * Consistent design across all bettor pages
  * Auto-loads sidebar menus from API
- **Access Control Middleware**: Created RestrictBettors middleware
  * Prevents bettors from accessing management pages (/users, /position, /report, /lock, /star)
  * Returns 403 Forbidden error if bettor attempts to access management routes
  * Applied to all management routes via 'restrictBettors' middleware alias
- **Bettor Sport Pages Features**:
  * Display all matches for the sport (not just inplay)
  * Auto-refresh every 60 seconds
  * Show "LIVE" badge for inplay matches
  * Display match cards with odds, sizes, and matched amounts
  * Link to match detail pages via /Common/market/?id={marketId}
  * Clean, card-based design matching bettor interface style

## Recent Updates (November 21, 2025)

### Cricket Page Rewritten with Clean Structure (November 21, 2025)
- **Bettor Cricket Listing Page**: Completely rewritten from scratch with clean, maintainable code
  * Removed all problematic code (broken slick carousel, static HTML)
  * Dynamically loads all cricket matches from `/api/cricket-matches`
  * Modern card-based UI with match cards showing:
    - Match name (clickable to view details at `/cricket/{marketId}`)
    - LIVE badge for inplay matches
    - Odds table with runner names, back/lay prices, and sizes
    - Matched amount display
  * Features: Preloader, auto-refresh every 60 seconds, error handling
  * Properly extends layouts.bettor with sidebar and header

### Match Detail Page CSS Fix (November 21, 2025)
- **Fixed Bootstrap CSS Conflict**: Resolved layout breaking issue in match detail page
  * Changed generic `.container` class to `.match-iframe-container`
  * Updated LIVEDIV element to use new class name
  * Removed duplicate `.responsive-iframe` CSS
  * Header and sidebar now display completely and correctly
  * No CSS conflicts with Bootstrap layout classes

### Bettor Pages Refactored to Extend Layout (November 21, 2025)
- **All bettor pages now extend layouts.bettor**: Cricket, soccer, tennis, and match detail pages
  * Sidebar and header are in the layout (not duplicated in each page)
  * Each page only contains its specific content section using @section('content')
  * Consistent structure across all bettor pages
  * Match detail page (/cricket/{marketId}) uses dynamic marketId and eventId from controller
  * All pages use the shared bettor layout with dynamic sidebar menus

### Sidebar Navigation Updated with Real Match Data (November 21, 2025)
- **Sidebar Menus**: Cricket, Soccer, and Tennis sidebar dropdowns now display real matches from API
  * Replaced all hardcoded dummy data (Al Najma Club, Australia v India, etc.)
  * Each sidebar shows up to 10 latest matches from the API
  * Dynamically populated when dashboard loads
  * Links to individual match detail pages
  * Shows "Loading..." while fetching data
  * Shows "No matches available" when sport has no matches

### All Tabs and Pages Now Show Real Data
- **Bettor Dashboard Tabs**: All tabs (Inplay, Cricket, Tennis, Soccer) now display real data from API
  * Inplay tab shows only inplay matches from all sports
  * Cricket tab shows all cricket matches (inplay + upcoming)
  * Tennis tab shows all tennis matches (inplay + upcoming)
  * Soccer tab shows all soccer matches (inplay + upcoming)
  * Tab counts update dynamically with real match counts
- **Preloader Implementation**: Added loading spinner that shows until API data is fully loaded
  * Page only displays when complete data is received
  * Prevents showing empty/partial data during load
  * Smooth fade-out transition when data is ready
- **Sidebar Sport Pages**: Created dedicated pages for cricket, soccer, and tennis sports
  * /cricket - Shows all cricket matches with live odds and data
  * /soccer - Shows all soccer matches with live odds and data
  * /tennis - Shows all tennis matches with live odds and data
  * Each page auto-refreshes every 60 seconds
  * Displays match cards with runner odds, sizes, and matched amounts
  * "LIVE" badge for inplay matches
  * All pages use real API data (no dummy data)

### Inplay Matches Display on Bettor Dashboard
- Updated /api/cricket-matches endpoint to fetch live odds for inplay matches:
  * Returns cricket, soccer, tennis matches from ScoreSwift /api/home
  * For inplay matches, fetches odds via /api/GetMarketOdds
  * Fetches runner names via /api/GetMarketDetails
  * Combines selectionId-based odds with runner names
  * Includes back/lay prices, sizes, and totalMatched for each match
  * Multi-level caching: 30s for match list, 30s for details, 5s for odds
- Updated bettor dashboard JavaScript:
  * Filters inplay matches client-side based on inplay === true
  * Updates tab counts (Inplay, Cricket, Tennis, Soccer)
  * Populates tables with inplay matches showing match names and live odds
  * Displays back/lay odds and sizes for each runner in styled boxes
  * Blue boxes for back prices/sizes, pink boxes for lay prices/sizes
  * Empty boxes (with -empty_blue/-empty_pink classes) when no odds available
  * formatOdds() function shows blank for zero values
  * formatSize() function formats sizes (>1000 as "Xk", e.g., "20.43k", "4.68k")
  * formatMatched() function formats total matched (M for millions, k for thousands)
  * Refreshes every 60 seconds automatically
- Match display features:
  * Cricket: 3 runners (team 1/team 2/The Draw) with back/lay odds and sizes
  * Soccer: 3 runners (home/draw/away) with back/lay odds and sizes
  * Tennis: 2 runners with back/lay odds and sizes
  * Total matched amount displayed per match (formatted)
  * Clickable match names linking to /cricket/{marketId}
  * Original HTML table structure preserved with .box -blue and .box -pink styling
  * Info icon in action column for each match
- API Performance:
  * 2 API calls per inplay match (GetMarketDetails + GetMarketOdds)
  * Response time: ~3-4 seconds for 8-10 inplay matches
  * Heavy caching to minimize API load

### Bettor Dashboard with Real Values
- Created bets table with comprehensive structure for tracking all betting activity:
  * Fields: user_id, market_id, market_name, selection_name, bet_type (back/lay), odds, stake, liability, profit
  * Status tracking: pending, matched, cancelled, settled
  * Timestamps: placed_at, matched_at, settled_at
- Implemented BettorController to calculate and display real-time values:
  * Username display in header (replaces hardcoded username)
  * Credit balance from user's credit_remaining field
  * Account balance from user's balance field
  * Liable amount calculated from active bets (SUM of liability for pending/matched bets)
  * Active bets count (COUNT of pending/matched bets)
- Updated bettor dashboard view:
  * Header dropdown shows actual username in uppercase
  * Balance and liable displayed in header: "B: Rs. X | L: Y"
  * Dashboard info bar shows: Credit, Balance, Liable, Active Bets (all real values)
  * Values formatted with number_format for proper display
- Updated routes to use BettorController for dynamic data
- Created Bet model with relationships and casts

### Management Header with User Info
- Updated management layout header to display "username(Role)" format
- Dropdown menu with Profile and Logout options
- Added jQuery 3.6.0 and Bootstrap 4.6.0 JavaScript for dropdown functionality
- Logout form with CSRF protection (POST to /logout)
- Profile link uses placeholder href="#" for now