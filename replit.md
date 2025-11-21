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
- **Live Sports Data API:** ScoreSwift API (http://89.116.20.218:8085/api/home) for live match data.
- **Betting Prices and Orders API:** mgs11.com for prices and order management.