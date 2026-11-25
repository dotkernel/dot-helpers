# dot-helpers

Dotkernel's helper component, used to handle urls.

> dot-helpers is a wrapper on top of [mezzio/mezzio-helpers](https://packagist.org/packages/mezzio/mezzio-helpers)

## Documentation

Documentation is available at: https://docs.dotkernel.org/dot-helpers/.

## Badges

![OSS Lifecycle](https://img.shields.io/osslifecycle/dotkernel/dot-helpers)
![PHP from Packagist (specify version)](https://img.shields.io/packagist/php-v/dotkernel/dot-helpers/4.0.0)

[![GitHub issues](https://img.shields.io/github/issues/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/issues)
[![GitHub forks](https://img.shields.io/github/forks/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/network)
[![GitHub stars](https://img.shields.io/github/stars/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/stargazers)
[![GitHub license](https://img.shields.io/github/license/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/blob/4.0/LICENSE.md)

[![Build Static](https://github.com/dotkernel/dot-helpers/actions/workflows/continuous-integration.yml/badge.svg?branch=4.0)](https://github.com/dotkernel/dot-helpers/actions/workflows/continuous-integration.yml)
[![codecov](https://codecov.io/gh/dotkernel/dot-helpers/graph/badge.svg?token=LIN5FVL5QP)](https://codecov.io/gh/dotkernel/dot-helpers)
[![PHPStan](https://github.com/dotkernel/dot-helpers/actions/workflows/static-analysis.yml/badge.svg?branch=4.0)](https://github.com/dotkernel/dot-helpers/actions/workflows/static-analysis.yml)

## Requirements

- **PHP**: 8.3, 8.4, 8.5, or 8.6

The factories work with any PSR-11 container that accepts a factory for each service key. This package does not install `laminas/laminas-servicemanager`.

## Upgrading from 3.x

Version 4.0 changes the output of `appendQueryParam()` and removes PHP 8.2 support. Read the [upgrade guide](https://docs.dotkernel.org/dot-helpers/v4/upgrading/) before you update.

## Install

Install dot-helpers in your application by running the following command:

```shell
composer require dotkernel/dot-helpers
```

Next, register the package's `ConfigProvider` to your application config.

> Make sure to register the package under the `// DK packages` section.
