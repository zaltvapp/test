# AGENTS.md

## Cursor Cloud specific instructions

### Overview

This repository contains a **WHMCS provisioning module** for Brazuca.tv (IPTV service). It is a PHP module (`modules/servers/brazuca/`) that integrates with a WHMCS installation to manage IPTV subscriptions via an external API.

The repository has no build system, no package manager, and no Docker setup — it is a simple PHP module distributed as a zip file (`modules.zip`).

### Development environment

- **PHP 8.3 CLI** is required (installed via `apt-get install -y php-cli php-json php-curl`).
- No other runtime services are needed for development/testing since the module is designed to run within a WHMCS installation.
- The module source lives in `modules/servers/brazuca/` (extracted from `modules.zip`).

### Key commands

| Task | Command |
|------|---------|
| Lint all PHP files | `php -l modules/servers/brazuca/brazuca.php` |
| Run tests | `php tests/bootstrap_test.php` |
| Extract module from zip | `unzip -o modules.zip` |

### Architecture notes

- The module requires the `WHMCS` constant to be defined (it calls `die()` otherwise).
- All provisioning functions (`brazuca_CreateAccount`, `brazuca_Renew`, `brazuca_SuspendAccount`, `brazuca_UnsuspendAccount`) call an external API at `http://18.222.124.50/brazuca.php`.
- Template files (`.tpl`) use the Smarty template engine bundled with WHMCS.
- There are no automated tests in the original repository; the `tests/bootstrap_test.php` file provides basic function-existence and return-value validation.
