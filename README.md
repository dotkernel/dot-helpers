# dot-helpers

Dotkernel's component used to handle urls.

> dot-helpers is a wrapper on top of [mezzio/mezzio-helpers](https://packagist.org/packages/mezzio/mezzio-helpers)

## Documentation

Documentation is available at: https://docs.dotkernel.org/dot-helpers/.

## Badges

![OSS Lifecycle](https://img.shields.io/osslifecycle/dotkernel/dot-helpers)
![PHP from Packagist (specify version)](https://img.shields.io/packagist/php-v/dotkernel/dot-helpers/3.8.0)

[![GitHub issues](https://img.shields.io/github/issues/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/issues)
[![GitHub forks](https://img.shields.io/github/forks/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/network)
[![GitHub stars](https://img.shields.io/github/stars/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/stargazers)
[![GitHub license](https://img.shields.io/github/license/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/blob/3.0/LICENSE.md)

[![Build Static](https://github.com/dotkernel/dot-helpers/actions/workflows/continuous-integration.yml/badge.svg?branch=3.0)](https://github.com/dotkernel/dot-helpers/actions/workflows/continuous-integration.yml)
[![codecov](https://codecov.io/gh/dotkernel/dot-helpers/graph/badge.svg?token=LIN5FVL5QP)](https://codecov.io/gh/dotkernel/dot-helpers)
[![PHPStan](https://github.com/dotkernel/dot-helpers/actions/workflows/static-analysis.yml/badge.svg?branch=3.0)](https://github.com/dotkernel/dot-helpers/actions/workflows/static-analysis.yml)

## Requirements

- **PHP**: 8.1, 8.2, 8.3, or 8.4

## Install

Install dot-helpers in your application by running the following command:

```shell
composer require dotkernel/dot-helpers
```

Next, register the package's `ConfigProvider` to your application config.

> Make sure to register the package under the `// DK packages` section.
