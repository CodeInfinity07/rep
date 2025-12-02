# BETGURU - Sports Trading Platform

## Overview
BETGURU is a sports betting and trading platform that facilitates trading on various sports including cricket, soccer, tennis, horse racing, and greyhound racing. The platform provides a comprehensive interface for users to engage in sports betting, offering features like real-time odds, detailed match information, and financial management tools. The business vision is to provide a reliable, feature-rich, and user-friendly platform for sports trading with a clear hierarchical user management system and real-time data integration.

## User Preferences
I prefer simple language and detailed explanations when new concepts or changes are introduced. I want iterative development, with clear communication before major changes are implemented. Please do not make changes to the `public/assets` folder unless specifically instructed. Ensure all financial calculations are precise and thoroughly tested.

## System Architecture
BETGURU is a Laravel 12.x MVC application utilizing PHP 8.2.

**UI/UX Decisions:**
- **Consistent Layouts:** Uses a shared Blade layout (`resources/views/layouts/management.blade.php` and `resources/views/layouts/bettor.blade.php`) for a consistent look and feel across all pages, including dynamic navigation and sidebars. Bettor pages (homepage, match pages, profile) use consistent homepage layout structure with footer positioned below main-page div.
- **Dynamic Content:** Dashboards and sports pages dynamically display real-time data, user-specific information, and betting odds.
- **Interactive Elements:** Features like AJAX polling for odds updates, date pickers, and interactive user hierarchy views enhance user experience.
- **Color Coding:** Market cards are color-coded for easy identification (primary for Match Odds, success for Bookmaker, danger for Fancy markets).
- **Logout Functionality:** Implemented with POST route, CSRF token protection, and `javascript:void(0)` href to prevent navigation issues on all pages.

**Technical Implementations:**
- **Authentication:** Custom, session-based authentication with `RoleMiddleware` for hierarchical access control.
- **User Management:** Robust role-based user management system with a defined hierarchy (Owner → Admin/Bettor, Admin → SuperMaster/Bettor, etc.) and hierarchical share distribution.
- **Financial Management:** `ledger_entries` table tracks all financial transactions (deposits, withdrawals, credit), with comprehensive views, filtering, and export. All critical financial operations use database transactions.
- **Betting System:** A `bets` table tracks all betting activities including type, odds, stake, liability, profit, and status. Real-time calculation and display of user balances, liabilities, and active bets.
- **Sports Data Integration:** A `MatchController` orchestrates multiple API calls for detailed market information, odds, and event IDs.
- **Odds Display:** Displays back/lay odds in a 6-column format with highlighting for best prices and status indicators.
- **Backend Validation:** Extensive validation for user creation, share distribution, and financial transactions.

**Feature Specifications:**
- **Dynamic Dashboards:** Root route `/` dynamically serves either the bettor or management dashboard based on user role.
- **Comprehensive Sports Pages:** Dedicated pages for various sports (Cricket, Soccer, Tennis, Horse Racing, Greyhound Racing) featuring real-time odds, match details, history, ledger, and results, with separate bettor and management views.
- **Cash/Credit Management:** Interface for managing cash deposits/withdrawals and credit allocation/retrieval among hierarchical users.
- **Account Ledger:** Detailed ledger system tracking all financial activities.
- **Live Sports Data:** Integration with external APIs to display live match data, including in-play status and matched amounts, with caching.
- **Bettor Profile Page:** `/Customer/Profile` provides bettors with stake management (Stake1-4, Plus1-4), password change functionality, and 2FA settings. Uses the same homepage layout structure with footer positioned below main-page div for consistency.

**System Design Choices:**
- **Laravel MVC:** Follows the Model-View-Controller pattern.
- **Blade Templating:** Utilizes Blade for efficient frontend templating.
- **MySQL Database:** Primary database for data storage.
- **Environment Configuration:** Uses Replit Secrets for secure management of sensitive environment variables.

## External Dependencies
- **Database:** MySQL (bguru69 on remote server 94.72.106.77)
- **Live Sports Data API:** ScoreSwift API (http://89.116.20.218:8085/api/home, /api/inplay, /api/GetMarketOdds, /api/GetMarketDetails) for live match data.
- **Betting Prices and Orders API:** mgs11.com for prices and order management.

## CricketID API Integration (December 2024)

**API Base URL:** `https://api.cricketid.xyz`
**Authentication:** API key passed as `key` query parameter
**IP Whitelisting:** Required - production server IP must be registered with CricketID

### Endpoints Available

| Endpoint | Purpose | Parameters |
|----------|---------|------------|
| `/allSportid` | Get all sport IDs | `key` |
| `/esid` | Get match list for a sport | `key`, `sid` |
| `/tree` | Get hierarchical sports/matches | `key` |
| `/getDetailsData` | Get match metadata | `key`, `gmid`, `sid` |
| `/getPriveteData` | Get live odds/bookmaker/fancy | `key`, `gmid`, `sid` |
| `/score` | Get live scorecard | `key`, `gtv`, `sid` |

### Key Identifiers
- `sid` - Sport ID (4 = Cricket)
- `gmid` - Game Match ID (unique match identifier)
- `gtv` - Score/TV ID (for scorecard data)
- `eid` - Event ID

### Response Data Structure

**Market Data (`/getPriveteData`):**
- `t1[]` - Match Odds and Bookmaker markets
- `t2[]`, `t3[]` - Fancy/Session markets
- Each market contains `section[]` with runners

**Runner Price Structure:**
```
section[].b1/b2/b3 - Back prices (best to worst)
section[].l1/l2/l3 - Lay prices (best to worst)
section[].bs1/bs2/bs3 - Back sizes
section[].ls1/ls2/ls3 - Lay sizes
```

**Status Fields:**
- `iplay` - In-play status (true/false)
- `gstatus` - Game status
- `block` - Market blocked status

### Laravel Routes

| Route | Controller Method | Description |
|-------|------------------|-------------|
| `GET /match/{gmid}` | `MatchController@showCricketIdMatch` | View match using CricketID |
| `GET /api/cricketid/matches` | `MatchController@getCricketIdMatches` | Get match list |
| `GET /api/cricketid/odds/{gmid}` | `MatchController@getCricketIdOdds` | Get live odds |
| `GET /api/cricketid/score` | `MatchController@proxyCricketIdScore` | Secure score proxy |

### Security Notes
- API key stored in `CRICKETID_API_KEY` secret
- Score endpoint uses server-side proxy to hide API key from client
- Never expose API key in frontend JavaScript