# Wisata CI4 — Agent Guide

## Project

Tourism Ticket Booking System ("Sistem Informasi Pemesanan Tiket Wisata") for West Kalimantan. CI4.6 + MySQL 8.0 + Bootstrap 5 (Lumino admin template). Server-rendered MVC.

## Dev Commands

| Action | Command |
|---|---|
| Dev server | `php spark serve` (default port 8080, see `.env` `app.baseURL`) |
| Run all tests | `vendor/bin/phpunit` |
| Run single test | `vendor/bin/phpunit tests/unit/HealthTest.php` |
| E2E tests | `npm run test:e2e` (Playwright, requires dev server running) |
| Format code | `vendor/bin/php-cs-fixer fix` |
| Run migrations | `php spark migrate` |
| Clear caches | `php spark cache:clear` |

## Architecture Gotchas

- **Models** use `M_` prefix (`M_Destinasi`, `M_Pengunjung`, `M_Transaksi`, `M_Kategori`, `M_KategoriWisata`, `M_Availability`), table prefix `tbl_`. They use `$this->db->table()` (raw Query Builder), **not** CI4's built-in ORM / Model features.
- **Soft deletes**: `is_delete = '0'` (active) / `'1'` (deleted). Values are strings, not integers. All queries must filter `is_delete = '0'`.
- **Custom auto-numbering**: IDs like `P00001`, `DST001`, `K00001`, `TR0001`. Each model has its own `autoNumber()` method with manual logic.
- **No seeders** — `app/Database/Seeds/` is empty. Use `wisata_db.sql` for initial data.
- **Migrations exist** in `app/Database/Migrations/` (8 files). Run `php spark migrate` to apply.
- **Indonesian identifiers** throughout: `kategori`, `destinasi`, `pengunjung`, `transaksi`.
- **Assets** in `public/Assets/`, referenced via `base_url('Assets/...')`. QR codes stored in `public/Assets/qrcode/`.

## Auth System

- Session-based (`is_login` session flag), two separate filters:
  - `auth` → `AuthFilter` (`app/Filters/AuthFilter.php`) — checks `is_login` only. Used for visitor routes.
  - `adminAuth` → `AdminFilter` (`app/Filters/AdminFilter.php`) — checks `is_login` **and** `role === 'admin'`. Used for admin routes.
- Two roles: `admin` and `pengunjung` (enum in `tbl_pengunjung.role`).
- Visitor auth via `Auth` controller (`/auth/*` routes). Admin login at `/admin/login` (outside admin filter group).
- Route groups protected by filters: `booking/*` and `user/*` use `auth`; all `/admin/*` routes use `adminAuth`.

## Routes

All explicit in `app/Config/Routes.php` (no auto-routing). Key groups:
- Public: `/`, `/destinasi`, `/destinasi/detail/(:any)`, `/galeri`
- Auth: `/login`, `/register`, `/auth/*`
- Visitor (auth filter): `/booking/*`, `/user/*`
- Admin (adminAuth filter): `/admin/*`, `/dashboard`

## Key Libraries

- `endroid/qr-code` — ticket QR generation (stored as PNG in `public/Assets/qrcode/`)
- `dompdf/dompdf` — PDF ticket download

## View Layouts

- **Landing page**: `app/Views/landing_page.php` (standalone, no layout)
- **Visitor dashboard**: `app/Views/visitor/layout.php` (sidebar + navbar)
- **Admin**: `app/Views/backend/Template/` (separate layout for admin panel)

## Tests

- **Unit**: `tests/unit/HealthTest.php` (minimal, uses CI4 test bootstrap)
- **Model**: `tests/Models/AvailabilityModelTest.php` (uses DB, creates table in setUp for SQLite/MySQL)
- **E2E**: `tests/e2e/landing.spec.ts` (Playwright, Chromium, requires dev server on port 8080)
- PHPUnit config in `phpunit.xml.dist`. Tests use in-memory SQLite by default.

## Reference Docs

- `GEMINI.md` — project context summary for AI
- `Pengguna.md` — user requirements (Indonesian)
- `prd.md` — landing page PRD
- `wisata_db.sql` — complete DB dump with sample data
- `.github/copilot-instructions.md` — additional agent guidance

## Agent Skills

- `.opencode/skills/codeigniter4-expert/SKILL.md` — CI4 MVC, CRUD, migrations, best practices
- `.opencode/skills/ci4-auth-expert/SKILL.md` — CI4 auth, sessions, filters, roles
- `.opencode/skills/ui-ux-designer-expert/SKILL.md` — UI/UX for web apps and dashboards
