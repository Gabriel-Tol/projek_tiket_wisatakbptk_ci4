# AGENTS

## Repository overview

- This is a CodeIgniter 4 PHP application starter customized for a tourism booking/admin site.
- The app is server-rendered with PHP views, not a JavaScript frontend framework.
- The public document root is `public/`; `public/index.php` is the front controller.
- Application code lives under `app/`, tests in `tests/`, and runtime files in `writable/`.

## Key files and folders

- `app/Controllers/` — application controllers. `Admin.php` contains the main business flows for categories, destinations, visitors, and transactions.
- `app/Models/` — data access models using CodeIgniter 4 query builder methods.
- `app/Views/` — PHP view templates and error pages.
- `app/Config/` — application configuration, routing, database connections, and environment boot files.
- `tests/` — PHPUnit tests and local test documentation.
- `README.md` — project overview and installation hints.

## Development workflow

- Use Composer to install dependencies if the project has a `composer.json` file.
- Run tests with PHPUnit from the repository root:
  - Windows: `vendor\bin\phpunit`
  - POSIX: `./phpunit`
- Configure database settings in `.env` and/or `app/Config/Database.php`.
- For CI4-specific behavior, refer to the official CodeIgniter 4 user guide rather than guessing framework internals.

## Conventions for AI code changes

- Follow CodeIgniter 4 conventions: `namespace App\Controllers;`, `namespace App\Models;`, controllers extend `BaseController`, and models use methods like `getResultArray()` or `getRowArray()`.
- Maintain existing naming patterns, including Indonesian identifiers like `kategori`, `destinasi`, `pengunjung`, and `transaksi`.
- Prefer modifying `app/Controllers/`, `app/Models/`, `app/Views/`, and `app/Config/` rather than vendor framework files.
- Use `public/` as the web root and do not assume the web server uses the repository root as document root.

## Important notes

- The project currently does not include a visible `composer.json`; do not assume dependency metadata is available in this workspace.
- The app uses CodeIgniter's built-in bootstrap and configuration flow, so changes should align with CI4 service and routing patterns.

## Useful references

- Project README: `README.md`
- Test docs: `tests/README.md`
- CodeIgniter 4 user guide: https://codeigniter.com/user_guide/
