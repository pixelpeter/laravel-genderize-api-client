# Changelog

All notable changes for the Laravel 12+ Genderize.io API Client will be documented in this file.

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
