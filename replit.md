# BETGURU - Sports Trading Platform

## Overview
This is a static HTML/CSS/JavaScript sports betting and trading platform called BETGURU. It provides interfaces for various sports including cricket, soccer, tennis, horse racing, and greyhound racing.

## Project Structure
- **HTML Pages**: Multiple pages for different sports and features (index.html, cricket.html, soccer.html, tennis.html, horse.html, hound.html, etc.)
- **CSS**: Styling files in `/css` directory
- **JavaScript**: Client-side scripts in `/js` directory (Vue.js, custom scripts)
- **Images**: Icons and graphics in `/img` directory
- **Fonts**: Web fonts in `/webfonts` directory

## Recent Changes
- **2025-11-20**: Initial setup for Replit environment
  - Added Express.js server to serve static files on port 5000
  - Configured server with cache control headers for development
  - Set up Node.js project with package.json
  - Created workflow configuration

## Tech Stack
- Frontend: HTML, CSS, JavaScript, Vue.js
- Server: Node.js with Express (for serving static files)
- External APIs: Uses external endpoints for prices and orders (mgs11.com)

## Architecture
This is primarily a static frontend application that connects to external APIs for betting/trading functionality. The server simply serves the static HTML/CSS/JS files.

## Development
- Server runs on port 5000
- Host: 0.0.0.0 (configured for Replit's proxy environment)
- Cache control disabled for development
