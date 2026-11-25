# Changelog

## 4.0.0 - TBD

### Changed

* Requires PHP 8.3, 8.4, 8.5 or 8.6.
* `RouteHelperFactory` throws `Dot\Helpers\Exception\RuntimeException` when the container returns a service of the wrong type.
* Requires `mezzio/mezzio-helpers` 5.21.0 or later and `laminas/laminas-diactoros` 3.10.0 or later.
* Requires `psr/container` directly.
* Uses PHPUnit 12 and PHPStan level 8.
* Uses `actions/checkout@v7`, `actions/cache@v6` and `codecov/codecov-action@v7` in the workflows.

### Added

* `Dot\Helpers\Exception\ExceptionInterface` and `Dot\Helpers\Exception\RuntimeException`.
* Array shape types for `RouteHelper::generateUri()` and `ConfigProvider`.
* Usage and upgrade pages in the v4 documentation.

### Deprecated

* Nothing

### Removed

* PHP 8.2 support.
* The requirement `laminas/laminas-servicemanager`. The factories work with any PSR-11 container.

### Fixed

* `RouteHelper::appendQueryParam()` encoded the value two times.
* `RouteHelper::appendQueryParam()` changed the names of other query parameters and removed the query `0`.

## 3.9.0 - 2025-10-31

### Changed

* Nothing

### Added

* PHP 8.4 and 8.5 support (#36).

### Deprecated

* Nothing

### Removed

* PHP 8.1 support (#36).

### Fixed

* Nothing

## 3.8.0 - 2025-03-07

### Changed

* Replaced Psalm with PHPStan (#34).

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.7.1 - 2025-01-28

### Changed

* Psalm 6.x (#32).

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.7.0 - 2025-01-20

### Changed

* Nothing

### Added

* Support for `laminas/laminas-servicemanager` 4.x (#30).

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.6.0 - 2024-10-28

### Changed

* Documentation linting, fixed `index.md`, removed a badge that did not work (#28).

### Added

* PHP 8.4 support (#28).

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.5.1 - 2024-06-29

### Changed

* README note that the package is a wrapper of `mezzio/mezzio-helpers` (#26).

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.5.0 - 2024-05-03

### Changed

* Nothing

### Added

* Documentation (#24).

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.4.3 - 2024-01-23

### Changed

* Updated dependencies (#22).

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.4.2 - 2023-11-29

### Changed

* Nothing

### Added

* PHP 8.3 support (#20).

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.4.1 - 2023-08-24

### Changed

* `psr/http-message` 2.x allowed (#16).

### Added

* Codecov and its badge (#16, #18).

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.4.0 - 2023-07-25

### Changed

* A return type (#13).

### Added

* Coding standard check, unit tests, Psalm and static analysis (#13).

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.3.0 - 2023-03-29

### Changed

* Nothing

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* `laminas/laminas-dependency-plugin` (#12).

### Fixed

* Nothing

## 3.2.0 - 2022-04-14

### Changed

* Updated package versions (#10).

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.1.0 - 2020-11-03

### Changed

* Composer 2 compatibility.
* Update composer.json to require version 2 of laminas/laminas-dependency-plugin to be Composer 2 compatible.

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* bump min version of laminas/laminas-dependency-plugin

## 3.0.1 - 2020-04-23

### Changed

* Dependencies at their latest versions, keywords, license file.

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 3.0.0 - 2020-04-16

### Changed

* Requires PHP `^7.4`.

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 2.0.0 - 2020-01-30

### Changed

* Laminas and Mezzio migration.

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Support

### Fixed

* Nothing

## 1.0.0 - 2018-04-12

### Changed

* updated to dependency expressive helpers > 5.0

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 0.2.1 - 2017-03-18

### Changed

* updated to dependency expressive helpers > 4.0

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 0.2.0 - 2017-03-15

### Changed

* Updated factories to PSR11 container typehint

### Added

* RouteHelper class, derived from previous RouteOptionHelper class and updated
* RouteHelper `uriEquals` and `appendQueryParam` methods

### Deprecated

* Nothing

### Removed

* RouteOptionsHelper class(moved to RouteHelper)
* UriHelperTrait class(its functionality was moved to RouteHelper)

### Fixed

* Nothing

## 0.1.1 - 2017-03-11

Updated php file headers doc blocks

### Added

* Nothing

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing

## 0.1.0 - 2017-03-07

Initial tagged release

### Added

* Everything

### Deprecated

* Nothing

### Removed

* Nothing

### Fixed

* Nothing
