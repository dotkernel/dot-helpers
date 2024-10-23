# dot-helpers

> dot-helpers is a wrapper on top of [mezzio/mezzio-helpers](https://packagist.org/packages/mezzio/mezzio-helpers)
>
> ![Dynamic JSON Badge](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fapi.github.com%2Frepos%2Fmezzio%2Fmezzio-helpers%2Fproperties%2Fvalues&query=%24%5B%3F(%40.property_name%3D%3D%22maintenance-mode%22)%5D.value&label=Maintenance%20Mode)

## dot-helpers badges

![OSS Lifecycle](https://img.shields.io/osslifecycle.svg?file_url=https%3A%2F%2Fraw.githubusercontent.com%2Fdotkernel%2Fdot-helpers%2FHEAD%2FOSSMETADATA)
![PHP from Packagist (specify version)](https://img.shields.io/packagist/php-v/dotkernel/dot-helpers/3.6.0)

[![GitHub issues](https://img.shields.io/github/issues/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/issues)
[![GitHub forks](https://img.shields.io/github/forks/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/network)
[![GitHub stars](https://img.shields.io/github/stars/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/stargazers)
[![GitHub license](https://img.shields.io/github/license/dotkernel/dot-helpers)](https://github.com/dotkernel/dot-helpers/blob/3.0/LICENSE.md)

[![Build Static](https://github.com/dotkernel/dot-helpers/actions/workflows/continuous-integration.yml/badge.svg?branch=3.0)](https://github.com/dotkernel/dot-helpers/actions/workflows/continuous-integration.yml)
[![codecov](https://codecov.io/gh/dotkernel/dot-helpers/graph/badge.svg?token=LIN5FVL5QP)](https://codecov.io/gh/dotkernel/dot-helpers)

## Requirements

- PHP >= 8.1

## Install

Install dot-helpers in your application by running the following command:

```shell
composer require dotkernel/dot-helpers
```

Next, register the package's `ConfigProvider` to your application config.

Note : Make sure to register the package under the `// DK packages` section.
