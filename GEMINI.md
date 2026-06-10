# Gemini Project Context: Wisata CI4

This project is a **Tourism Ticket Booking Information System** ("Sistem Informasi Pemesanan Tiket Wisata") built using the CodeIgniter 4 framework.

## Project Overview

- **Purpose:** Provide a platform for managing tourism destinations, visitors, and processing ticket bookings for West Kalimantan attractions.
- **Technology Stack:**
  - **Framework:** PHP 8.1+ with CodeIgniter 4.6
  - **Frontend:** Server-rendered PHP views with Bootstrap 5.
  - **Database:** MySQL (configured in `app/Config/Database.php`)
  - **Key Libraries:** `endroid/qr-code` for ticket QR codes.
- **Architecture:** Standard MVC (Model-View-Controller) structure.
  - **Controllers:** `Admin.php` handles backend CRUD and transaction logic; `Home.php` handles the public landing page.
  - **Models:** Prefixed with `M_` (e.g., `M_Destinasi`, `M_Pengunjung`).
  - **Views:** Public views in `app/Views/` and administrative views in `app/Views/backend/`.
  - **Public Root:** `public/` is the web root. `public/index.php` is the front controller.

## Key Features

- **Landing Page:** Modern, responsive design showcasing destinations and system features.
- **Admin Dashboard:** Statistical overview and management interface.
- **CRUD Operations:** Destinations, Visitors, and Categories management.
- **Booking System:** Multi-step ticket ordering process with automated QR code generation.
- **Reporting:** Filterable ticket booking reports.

## Building and Running

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL Database

### Installation
1. Clone the repository.
2. Run `composer install`.
3. Copy `env` to `.env` and configure your database and `app.baseURL`.
4. Import the database schema (if provided) or set up tables manually (migrations are not currently used).

### Development Commands
- **Serve Application:** `php spark serve`
- **Run Tests:** `vendor/bin/phpunit`
- **Lint/Format Code:** `vendor/bin/php-cs-fixer fix`
- **Clear Cache:** `php spark cache:clear`

## Development Conventions

### General Conventions
- **Naming:** 
  - Models should follow the `M_[Name].php` pattern.
  - Controllers use PascalCase.
  - Maintain existing Indonesian identifiers: `kategori`, `destinasi`, `pengunjung`, `transaksi`.
- **Routing:** All routes are defined in `app/Config/Routes.php`.
- **Assets:** Store all public assets (CSS, JS, Images, QR codes) in `public/Assets/`.
- **Security:**
  - Authentication is handled via session-based checks in the `Admin` controller (e.g., `is_login`).
  - Use `password_hash()` for user passwords.

### Conventions for AI Code Changes
- **Namespace:** Follow CI4 PSR-4 autoloading (e.g., `namespace App\Controllers;`).
- **Inheritance:** Controllers must extend `BaseController`.
- **Database Access:** Use CodeIgniter 4 query builder methods in Models (e.g., `getResultArray()`, `getRowArray()`).
- **Web Root:** Always assume `public/` is the web root. Do not assume the repository root is directly accessible.
- **Dependencies:** Use Composer for managing dependencies. If `composer.json` is modified, run `composer update`.
