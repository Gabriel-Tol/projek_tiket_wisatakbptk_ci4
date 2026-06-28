# Copilot instructions for Wisata CI4

This file helps Copilot/Copilot-powered assistants and AI sessions work effectively in this repository. It collects the repository's actual commands, architecture notes, and non-obvious conventions.

---

## Quick commands (Windows examples)

- Install dependencies: `composer install`
- Serve dev site: `php spark serve`
- Run full tests: `vendor\bin\phpunit`
- Run a single test file: `vendor\bin\phpunit tests\unit\HealthTest.php` (or any specific test path)
- Format/lint: `vendor\bin\php-cs-fixer fix` (install via composer)
- Run migrations (if you add them): `php spark migrate`
- Clear CI4 caches: `php spark cache:clear`

Note: PHPUnit can accept a directory or single file path to limit scope.

---

## High-level architecture (what matters)

- CodeIgniter 4 MVC app. Public web root is `public/`; `public/index.php` is front controller.
- Controllers live in `app/Controllers/` (key controllers: `Home`, `Admin`, `Auth`, `Booking`, `Dashboard`, `Destinasi`).
- Views in `app/Views/` with templates: landing page `app/Views/landing_page.php`, visitor layout `app/Views/visitor/layout.php`, admin templates under `app/Views/backend/Template/`.
- Models follow `M_` prefix convention and live in `app/Models/` (e.g., `M_Destinasi`, `M_Pengunjung`). Models use the DB Query Builder (`$this->db->table(...)`) rather than CI4 Model convenience methods.
- Routes are explicitly defined in `app/Config/Routes.php` — do not rely on auto-routing. Route groups are used and protected by filters (`auth`, `adminAuth`).
- Key libraries used via Composer: `endroid/qr-code` (QR generation), `dompdf/dompdf` (PDF tickets).
- Tests live in `tests/`. Current suite is minimal (example: `tests/unit/HealthTest.php`). Tests use in-memory SQLite in CI runs by default.

---

## Key repo-specific conventions (non-obvious)

- Model & table conventions:
  - Model class names start with `M_`.
  - Database tables use `tbl_` prefix.
  - Soft deletes implemented via `is_delete` column: active rows use `is_delete = '0'`, deleted rows use `'1'`. Always filter `is_delete = '0'` in queries.
  - IDs use custom auto-numbering patterns (examples: `P00001`, `DST001`, `K00001`, `TR0001`) implemented by each model's `autoNumber()` logic.

- Data access:
  - Codebase uses `$this->db->table(...)->...` (Query Builder) instead of relying on CI4 Model features. When writing or refactoring, preserve Query Builder usage unless migrating intentionally.

- Authentication & sessions:
  - Session-based auth flags: `is_login` / `isLoggedIn` (session keys vary across code — inspect `Auth` controller and `app/Filters/AuthFilter.php`).
  - Two roles: `admin` and `pengunjung` (visitor). Protect groups accordingly.

- Assets and generated files:
  - Public assets under `public/Assets/` and referenced with `base_url('Assets/...')`.
  - Generated QR codes stored in `public/Assets/qrcode/`.

- Data bootstrapping:
  - There are no seeders in `app/Database/Seeds/`. Use `wisata_db.sql` (repo root) for initial data import if available.

- Routes & structure:
  - All routes are explicit in `app/Config/Routes.php`. Important groups: public (`/`, `/destinasi`), auth (`/login`, `/auth/*`), visitor (`booking/*`, `user/*` with `auth` filter), admin (`/admin/*` with `adminAuth`).

- Testing notes:
  - To run a single test or directory, pass the path to PHPUnit (example above). The repo includes `phpunit.xml.dist`; copy to `phpunit.xml` locally to customize.

---

## Files and AI/assistant configs to respect

- `GEMINI.md`, `AGENTS.md`, and `Wisata CI4 — Agent Guide` contain project context and developer conventions; reuse those facts when making changes.
- There are small AI skill files under `.opencode/skills/` (ui-ux-designer-expert, codeigniter4-expert, ci4-auth-expert). These include guidelines the team has used for automated agents — consult them for behavior expectations (e.g., migrations preferred, use Query Builder, security rules).

When assisting, prefer minimal, surgical edits and avoid changing unrelated files. Follow PSR-4 `App\\` namespace and ensure controllers extend `BaseController`.

---

## When editing or adding code

- Prefer migrations + seeders for schema changes. If you add migrations, include migration filenames and run `php spark migrate` in the repo root.
- Preserve `is_delete` semantics when soft-deleting records.
- If adding tests, mirror existing patterns; tests use PHPUnit and may expect SQLite in-memory. Use `vendor\\bin\\phpunit <path>` for single-test runs.
- When modifying composer.json, run `composer update` (or `composer install` for fresh env) and keep versions compatible with PHP 8.1+.

---

## Quick references for Copilot sessions

- Build & run: `composer install` → `php spark serve`
- Tests: `vendor\\bin\\phpunit` (single file: `vendor\\bin\\phpunit tests\\unit\\HealthTest.php`)
- Lint/format: `vendor\\bin\\php-cs-fixer fix`
- Routes: `app/Config/Routes.php`
- Main models: look under `app/Models/` for `M_*` classes and their `autoNumber()` methods.

---

If this file already exists, suggest incremental improvements rather than replacing it wholesale.

