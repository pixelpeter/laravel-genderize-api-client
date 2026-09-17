# Changelog

All notable changes for the Laravel 12+ Genderize.io API Client will be documented in this file.

## v13.0.0 - 2026-09-17

Added support for Laravel 12 and 13.

From this release on, the package major version matches the highest Laravel major version it supports, so `^13.0` covers Laravel 13.x and 12.x. Development happens on `master`; the `v13.x` branch tracks it and carries the released state.

### Added

- Support for Laravel 13.x on PHP 8.5, 8.4 and 8.3.

### Changed

- `laravel/framework` is constrained to `^12.61.1|^13.0`, which excludes the framework versions affected by the published CRLF injection and temporary signed URL advisories.
- The test matrix covers Laravel 13.x and 12.x against PHP 8.5, 8.4 and 8.3, using `orchestra/testbench` 11.x and 10.x.
- `phpunit/phpunit` is constrained to `^12.5.8`, and `phpunit.xml` follows the 12.5 schema.
- PHPStan runs on PHP 8.3, the lowest supported version.
- The `Update Changelog` workflow checks out with an admin-owned token when `CHANGELOG_TOKEN` is set, and its actions are pinned to commit SHAs.

### Fixed

- Package discovery registered the facade under the alias `Woocommerce`, a leftover from another package. The alias is now `Genderize`, which is what the README documents.

### Removed

- Support for Laravel 11.x and 10.x. Both are past their security support window, and Composer refuses to install them because of published security advisories.
- Support for PHP 8.2 and 8.1. Laravel 12 still runs on PHP 8.2, but that version reaches end of life in December 2026 and Laravel 13 requires PHP 8.3 or later.

### Upgrading

Require `^13.0` and make sure the application runs Laravel 12.61.1 or later on PHP 8.3 or later. If you registered the facade manually because discovery gave you `Woocommerce`, drop that alias; `Genderize` is registered for you. Applications on Laravel 11.x or 10.x stay on `v12.0.0`, which is deprecated and receives no further releases.

## v12.0.0

**Deprecated.** This release supports Laravel 12.x, 11.x and 10.x and is no longer maintained. The Laravel 12.x line
continues in `v13.0.0`; there is no successor for Laravel 11.x and 10.x.

- Added support for Laravel 12.x, in #30.
- Updated the README, in #31.
- Moved the coveralls integration from the PHP package to the GitHub Action, in #29.
- Updated `phpstan/phpstan` from `^1.12.6` to `^2.1.2`, in #26.

## 10.0.0

**Deprecated.** This release line supports Laravel 10.x and 11.x and is no longer maintained. There is no successor
release for those Laravel versions.

- Added support for Laravel 10.x and 11.x<br>
  *(Laravel 8.x and 9.x support will be in the v8.x tags)*
- Fix phpstan
- Add coverage tracking by coveralls
- General cleanup of the codebase

## 8.1.1

**Deprecated.** The v8.x line supports Laravel 8.x and 9.x and is no longer maintained.

- Fix Genderize link by @Stroemgren in #8
- UPDATE: github actions by @pixelpeter in #9

## 8.1.0
- Added support for Laravel 9.x and 10.x
- Update README

## 8.0.2
- The changed from "x-rate-reset" to "x-limit-rate-reset"
  Thanks to @agustinzamar

## 8.0.1
- Fix headers issue. Thanks to @agustinzamar

## 8.0.0
- Laravel 8+ and php8 compatible version based on https://github.com/pixelpeter/laravel5-genderize-api-client
